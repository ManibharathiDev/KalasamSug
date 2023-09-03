<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KCallRegister extends Model
{
    use HasFactory;
    protected $fillable=[
        'cust_id',
        'Date',
        'phoneno',
        'conperson',
        'work',
        'staff_id',
        'status',
        'remarks',
        'completeperson',
        'completeddate',        
    ];
    public function custname()
    {
        return $this->hasOne(KCallRegister::class,'cust_id','id');
    }
    public function custnames()
    {
        return $this->hasMany(KCallRegister::class, 
        'cust_id',
        'Date',
        'phoneno',
        'conperson',
        'work',
        'staff_id',
        'status',
        'remarks',
        'serialNo',
        'Ncalldate',
        'billtype',
        'completeperson',
        'completeddate',);
    }
}
