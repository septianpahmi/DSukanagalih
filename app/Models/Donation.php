<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'title',
        'image',
        'description',
        'item_name',
        'target_quantity',
        'unit',
        'delivery_address',
        'latitude',
        'longitude',
        'deadline',
        'status',
    ];
    public function registrations()
    {
        return $this->hasMany(DonationRegistration::class);
    }

    public function getCollectedAttribute()
    {
        return $this->registrations()
            ->where('status', 'Verified')
            ->sum('quantity');
    }

    public function getProgressAttribute()
    {
        if ($this->target_quantity == 0) return 0;

        return min(
            100,
            round(($this->collected / $this->target_quantity) * 100)
        );
    }

    protected static function booted()
    {
        static::retrieved(function ($donation) {
            if (
                $donation->deadline &&
                $donation->deadline < now() &&
                $donation->status === true
            ) {

                $donation->update(['status' => false]);
            }
        });
    }
}
