<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calle extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'ciudad_id',
    ];

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class);
    }
}
