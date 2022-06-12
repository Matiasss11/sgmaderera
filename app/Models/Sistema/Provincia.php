<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Provincia extends Model  implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['nombre','pais_id'];

    protected $table = 'provincias';

    public function pais() //esto se va
    {
        return $this->belongsTo(Pais::class);
    }

    public function ciudades()
    {
        return $this->hasMany(Ciudad::class);
    }
}
