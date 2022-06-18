<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactpeople extends Model
{
    use HasFactory;
    public function profilcompany(){
        return $this->belongsTo(Profilcompany::class,'tax_num_company','tax_num');
    }
}
