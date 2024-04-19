<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'code',
        'amount',
        'payment_method',
    ];

    public static $paymentMethods = [
        "Cash" => "Cash"
    ];


    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            if(!$model->user_id) {
                $model->user_id = auth()->id();
            }
            if(!$model->code) {
                $code = 'P' . time();
                while (static::where('code', $code)->exists()) {
                    $code = 'P' . time();
                }
                $model->code = $code;
            }

        });
    }
}
