<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //Table Name
    protected $table = 'employees';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true; 

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function net_incomes(){
        return $this->hasOne('App\NetIncome');
    }
}
