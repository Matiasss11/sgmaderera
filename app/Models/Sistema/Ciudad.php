<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Ciudad extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['nombre', 'codigo_postal','provincia_id'];

    protected $table = 'ciudades';

    public function domicilios()
    {
        return $this->hasMany(Domicilio::class);
    }

    public function provincia()
    {
        return $this->belongsTo(Provincia::class);
    }
}
