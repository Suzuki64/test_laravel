<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable=[
        'fullname',
        'gender_id',
        'email',
        'postcode',
        'address',
        'building_name',
        'opinion',
    ];

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function scopeJoinGenders($query)
    {
        return $query->join('genders','genders.id','=','contacts.gender_id')
        ->select('contacts.*','genders.gender');
    }
    
    public function scopeWhereFullname($query,$fullname){
        if($fullname != ''){
            return $query->where('fullname','like',"%{$fullname}%");
        }
    }

    public function scopeWhereGender($query,$gender){
        if($gender != ''){
            return $query->where('gender','=',$gender);
        }
    }
    public function scopeWhereCreated_at($query, $created_at_from, $created_at_to)
    {
        if(!empty($created_at_from) && !empty($created_at_to)){
            $query->whereBetween('contacts.created_at',[$created_at_from, $created_at_to]);
        }elseif(!empty($created_at_from)){
            return $query->where('contacts.created_at','>=',$created_at_from);
        }elseif(!empty($created_at_to)){
            return $query->where('contacts.created_at','<=',$created_at_to);
        }
    }

    public function scopeWhereEmail($query,$email){
        if($email != ''){
            return $query->where('email','like',"%{$email}%");
        }
    }
}