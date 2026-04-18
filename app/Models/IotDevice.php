<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IotDevice extends Model
{
    // Menggunakan Trait HasUlids karena primary key Anda menggunakan ULID
    use HasUlids;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * Atribut yang dapat diisi secara massal.
     */
    protected $fillable = [
        'user_id',
        'is_active',
        'humidity',
        'temperature',
    ];

    /**
     * Mendefinisikan cast atribut.
     * Di Laravel 13, kita menggunakan metode casts() alih-alih properti $casts.
     */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'humidity' => 'double',
            'temperature' => 'double',
        ];
    }

    /**
     * Relasi ke User (Satu device dimiliki oleh satu user)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
        public function iotDevices()
    {
        return $this->hasMany(IotDevice::class);
    }
}