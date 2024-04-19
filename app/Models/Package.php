<?php

namespace App\Models;

use App\Extensions\RajaOngkir;
use Filament\Forms\Get;
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

    public function updatePricing()
    {
        $data = $this->toArray();
        $data['kolis'] = $this->kolis()->get()->toArray();
        $this->actual_weight = static::getActualWeight($data, weightOnly: true);
        $this->volume_weight = static::getActualWeight($data, true);
        $this->chargeable_weight = static::getActualWeight($data);
        $this->shipment_cost = RajaOngkir::shipment_costs($data['sender_city_or_regency'], $data['receiver_city_or_regency'], $this->chargeable_weight * 1000) ?? 0;
        $this->delivery_time = $this->created_at ? $this->created_at->addDays(3) : now()->addDays(3);
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
