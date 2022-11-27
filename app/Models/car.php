<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    use HasFactory;
    protected $fillable = [
        'vehicletype',
        'vehiclebrand',
        'vehiclemodel',
        'email',
        'rentnoofdays',
        'totalrent'
    ];

    public function cruds()
    {
        return $this->belongsTo(Crud::class);
    }
}
