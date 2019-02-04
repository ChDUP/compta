<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'title', 'amount', 'original_name', 'hash', 'date', 'user_id', 'company_id'
    ];

    protected $dates = ['date'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function company() {
        return $this->belongsTo(Company::class);
    }
}
