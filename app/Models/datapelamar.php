<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datapelamar extends Model
{
    use HasFactory;
    protected $table = 'datapelamar';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nik',
        'nama',
        'email',
        'alamat',
        'agama',
        'jenisk',
        'fotopelamar',
    ];
    public $timestamps = true;
}
