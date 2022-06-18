<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profilcompany extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(Profilcompany::class);
    }


    public function contactperson(){
        return $this->hasOne(Contactperson::class);
    }


    public function tasks(){
        return $this->hasMany(Task::class,'tax_num_company','tax_num');
    }


}
