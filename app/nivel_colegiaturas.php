<?php

namespace App;

use App\nivel_interes;
use Illuminate\Database\Eloquent\Model;

class nivel_colegiaturas extends Model
{
    //
    protected $fillable = ['tipo_colegiatura'];

    public function inter(){
        return $this->belongsTo(nivel_interes::class);
    }
}
