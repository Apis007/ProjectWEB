<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datakendaraan extends Model
{
    use HasFactory;
    protected $table = 'data_unit';
    protected $primaryKey = 'id_unit';
    protected $fillable = ['nama', 'no_polisi','gambar', 'jeniskendaraan', 'hargasewa'];

}
