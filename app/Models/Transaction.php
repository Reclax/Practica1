<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $timestamps = false;
    protected $fillable = ['account_id', 'type', 'amount'];
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function scopeDateBetween($query, $start, $end)
    {
        if ($start) $query->whereDate('created_at', '>=', $start);
        if ($end)   $query->whereDate('created_at', '<=', $end);
        return $query;
    }
}
