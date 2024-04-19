<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koli extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'weight',
        'length',
        'width',
        'height',
        'description',
        'surcharge',
        'goods_value',
        'amount',
    ];

    protected $appends = [
        'weight_volume',
    ];

    public function package(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    public function getWeightVolumeAttribute(): int
    {
        if(!$this->length || !$this->width || !$this->height) return 0;
        return Package::calculateWeightFromVolume($this->length, $this->width, $this->height);
    }


}
