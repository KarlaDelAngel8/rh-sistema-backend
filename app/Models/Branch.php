<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    /** @use HasFactory<\Database\Factories\BranchFactory> */
    use HasFactory;

    protected $fillable = [
        'Sucursal',
        'Fechope',
        'Horaope',
        'Estatus',
        'Id_Usuario',
    ];
    public function status()
    {
        return $this->belongsTo(Status::class, 'Estatus');
    }
}
