<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Pais extends Model  implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['nombre'];

    protected $table = 'paises';

    public function provincias()
    {
        return $this->hasMany(Provincia::class);
    }
}
