<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoEmpresa extends Model
{
    use HasFactory;
    
    protected $table = 'grupoempresa';
    protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['id','nombreCorto',
    'nombreLargo','fechaCreacion','tipoSociedad','direccion','email','telefono','nombreSocio1','nombreSocio2','nombreSocio3','nombreSocio4','nombreSocio5','logoPath'];
}
