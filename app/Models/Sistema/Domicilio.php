<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'piso',
        'departamento',
        'direccion',
        'ciudad_id',
    ];

    protected $table = 'domicilios';

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class);
    }

    public function persona()
    {
        return $this->hasOne(Persona::class);
    }

    public function empresa()
    {
        return $this->hasOne(Empresa::class);
    }
}
