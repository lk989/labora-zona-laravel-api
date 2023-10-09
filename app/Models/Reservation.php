<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'package_id', 'date', 'time'];

    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }
}
