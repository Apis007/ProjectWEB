<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUnit extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'data_unit';
    protected $primaryKey = 'id_unit';

    protected $fillable = ['nama', 'jeniskendaraan', 'hargasewa', 'gambar'];

}
