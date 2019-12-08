<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NetIncome extends Model
{
    //Table Name
    protected $table = 'net_incomes';
    // Primary key
    public $primaryKey = 'id';

    public function employees(){
        return $this->belongsTo('App\Employee');
    }
}
