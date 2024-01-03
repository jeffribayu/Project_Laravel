<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanamanModel extends Model
{
    protected $table = "tanaman";
    protected $primaryKey = "id_tanaman";
    protected $fillable = ['kode_tanaman', 'jenis_tanaman', 'usia_tanaman', 'luas_lahan'];
}
