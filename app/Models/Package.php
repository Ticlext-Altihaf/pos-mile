<?php

namespace App\Models;

use App\Extensions\RajaOngkir;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;


    protected $fillable = [
        'payment_id',
        'user_id',
        'sender_name',
        'sender_province',
        'sender_city_or_regency',
        'sender_address',
        'sender_phone',
        'sender_postal_code',
        'receiver_name',
        'receiver_address',
        'receiver_phone',
        'receiver_province',
        'receiver_city_or_regency',
        'receiver_district',
        'receiver_village_or_subdistrict',
        'receiver_postal_code',
        'service_level',
        'package_type',
        'cod',
        'reference_number',
        'instructions',
        'airway_bill',
        'actual_weight',
        'volume_weight',
        'chargeable_weight',
        'shipment_cost',

    ];

    protected $casts = [
        'delivery_time' => 'datetime'
    ];

    protected $appends = [
        'sla_days',
        'service_name'
    ];

    public static $serviceLevel = [
        'Q9 - POS SAMEDAY (SLA: 1)'         => 'Q9 - POS SAMEDAY (SLA: 1)',
        'PE – POS NEXT DAY (SLA: 1)'         => 'PE – POS NEXT DAY (SLA: 1)',
        'PKH – POS REGULER (SLA:2)'           => 'PKH – POS REGULER (SLA:2)',
        'PPB – PAKET – PPB PAKET (SLA: 30)' => 'PPB – PAKET – PPB PAKET (SLA: 30)',
        'PPB – MBAG -POS EKONOI MBAG (SLA:0)' => 'PPB – MBAG -POS EKONOI MBAG (SLA:0)',
        'PJB – POS KARGO BARANG (SLA:3)' => 'PJB – POS KARGO BARANG (SLA:3)',
        'PJM – POS CARGO MOTOR (SLA: 14)' => 'PJM – POS CARGO MOTOR (SLA: 14)',
        'DG – DANGEROUS GOODS (SLA:3)' => 'DG – DANGEROUS GOODS (SLA:3)',
        'VG – PAKET VALUABLE GOODS (SLA:3)' => 'VG – PAKET VALUABLE GOODS (SLA:3)',
        'ECH – POS MARKETPLACE REGULER (SLA:2)' => 'ECH – POS MARKETPLACE REGULER (SLA:2)',
    ];
    public static $packageType = [
        "Paket" => "Paket",
        "Dokumen" => "Dokumen",
    ];
    public static mixed $codOptions = [
        "NON-COD" => "NON-COD",
        "COD" => "COD",
        "CCOD" => "CCOD",
    ];
    public function payment(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function kolis(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Koli::class);
    }


    public function getSlaDaysAttribute()
    {
        return match ($this->service_level) {
            'Q9 - POS SAMEDAY (SLA: 1)' => 1,
            'PE – POS NEXT DAY (SLA: 1)' => 1,
            'PKH – POS REGULER (SLA:2)' => 2,
            'PPB – PAKET – PPB PAKET (SLA: 30)' => 30,
            'PJB – POS KARGO BARANG (SLA:3)' => 3,
            'PJM – POS CARGO MOTOR (SLA: 14)' => 14,
            'DG – DANGEROUS GOODS (SLA:3)' => 3,
            'VG – PAKET VALUABLE GOODS (SLA:3)' => 3,
            'ECH – POS MARKETPLACE REGULER (SLA:2)' => 2,
            default => 0,
        };
    }

    public function getServiceNameAttribute()
    {
        return match ($this->service_level) {
            'Q9 - POS SAMEDAY (SLA: 1)' => 'POS SAMEDAY',
            'PE – POS NEXT DAY (SLA: 1)' => 'POS NEXT DAY',
            'PKH – POS REGULER (SLA:2)' => 'POS REGULER',
            'PPB – PAKET – PPB PAKET (SLA: 30)' => 'PAKET – PPB PAKET',
            'PPB – MBAG -POS EKONOI MBAG (SLA:0)' => 'MBAG -POS EKONOI MBAG',
            'PJB – POS KARGO BARANG (SLA:3)' => 'POS KARGO BARANG',
            'PJM – POS CARGO MOTOR (SLA: 14)' => 'POS CARGO MOTOR',
            'DG – DANGEROUS GOODS (SLA:3)' => 'DANGEROUS GOODS',
            'VG – PAKET VALUABLE GOODS (SLA:3)' => 'PAKET VALUABLE GOODS',
            'ECH – POS MARKETPLACE REGULER (SLA:2)' => 'POS MARKETPLACE REGULER',
            default => 'UNKNOWN',
        };
    }

    public function updatePricing()
    {
        $data = $this->toArray();
        $data['kolis'] = $this->kolis()->get()->toArray();
        $this->actual_weight = static::getActualWeight($data, weightOnly: true);
        $this->volume_weight = static::getActualWeight($data, true);
        $this->chargeable_weight = static::getActualWeight($data);
        if(!$this->sender_city_or_regency || !$this->receiver_city_or_regency) {
            throw new \Exception('Sender city or receiver city is required');
        }
        $this->shipment_cost = RajaOngkir::shipment_costs($data['sender_city_or_regency'], $data['receiver_city_or_regency'], $this->chargeable_weight * 1000) ?? 0;
        $this->delivery_time = $this->created_at ? $this->created_at->addDays($this->getSlaDaysAttribute()) : now()->addDays($this->getSlaDaysAttribute());
    }


    public function save(array $options = [])
    {
        $this->updatePricing();
        return parent::save($options);
    }

    protected static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            if(!$model->user_id) {
                $model->user_id = auth()->id();
            }
            if(!$model->airway_bill) {
                $model->airway_bill = 'RR' . time();
                while (static::where('airway_bill', $model->airway_bill)->exists()) {
                    $model->airway_bill = 'RR' . time();
                }
            }
            $model->updatePricing();
        });
    }

    public static function calculateWeightFromVolume(int $length, int $width, int $height): int
    {
        return $length * $width * $height / 6000;
    }



    public static function getActualWeight(array $data, bool $volumeOnly = false, bool $weightOnly = false): float
    {
        $total_weight = 0.0;
        foreach ($data['kolis'] as $koli) {
            $volumeWeight = floatval(($koli['length'] ?? 0.0) * ($koli['width'] ?? 0.0) * ($koli['height'] ?? 0.0) / 6000.0);
            $weight = intval($koli['weight'] ?? 0);
            $amount = intval($koli['amount'] ?? 1);
            if ($volumeOnly) {
                $total_weight += $volumeWeight * $amount;
                continue;
            }
            if ($weightOnly) {
                $total_weight += $weight * $amount;
                continue;
            }
            // get the highest value between volumeWeight and weight
            $total_weight += $volumeWeight > $weight ? $volumeWeight * $amount : $weight * $amount;
        }
        return $total_weight;
    }
}
