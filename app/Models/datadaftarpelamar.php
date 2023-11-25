<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datadaftarpelamar extends Model
{
    use HasFactory;
    protected $table = 'datadaftarpelamar';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nik',
        'nama',
        'email',
        'alamat',
        'agama',
        'jenisk',
        'status',
        'fotodpelamar',
    ];
    public $timestamps = true;
}
