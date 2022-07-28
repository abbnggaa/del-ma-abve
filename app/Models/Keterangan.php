<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keterangan extends Model
{
    protected $table = "keterangan";
    protected $primaryKey = "id";
    protected $fillable = ['id', 'tanggal', 'waktu', 'lokasi', 'suhu_tubuh'];
}
