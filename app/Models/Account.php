<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['customer_name', 'balance'];
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function scopeSearch($query, $term)
    {
        return $term
            ? $query->where('customer_name', 'like', "%{$term}%")
            : $query;
    }
}
