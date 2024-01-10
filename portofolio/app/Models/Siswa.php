<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa_tb';
    protected $fillable = ['nama', 'no_telp', 'alamat', 'tanggal_lahir', 'tempat_lahir'];
}
