<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password', 'role_id', 'company_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function invoices() {
        return $this->hasMany(Invoice::class);
    }

    public function company() {
        return $this->belongsTo(Company::class);
    }

    /**
     * Retourne les ID companies parentes de l'utilisateur
     */
    public function companies() {
        $companies = array();
        $company = $this->company;

        while(true) {
            $companies[] = $company->id;
            if(is_null($company->parent))
                break;
            $company = Company::find($company->parent);
        }
        return $companies;
    }

    /**
     * Retourne les X dernières factures de l'utilisateur
     */
    public function getLastInvoices($nb) {
        return($this->invoices->reverse()->take((int)$nb));
    }

    public function isAdmin() {
        return $this->role_id === 1;
    }
}
