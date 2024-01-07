<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $casts = [
        'date_start' => 'datetime',
        'date_end' => 'datetime',
        'reservation' => 'json',
    ];

    public function scopeOfAdmin(Builder $query, int $admin): void
    {
        $query->where('admin_id', $admin);
    }

    public function scopeStartsAfter(Builder $query, string $date): void
    {
        $query->where('date_start', '>=', $date);
    }

    public function scopeEndsBefore(Builder $query, string $date): void
    {
        $query->where('date_end', '<=', $date);
    }
}
