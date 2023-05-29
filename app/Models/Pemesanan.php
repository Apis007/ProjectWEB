<?php

namespace App\Models;
use App\Models\DataUnit;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';
    protected $dates = ['tanggal_pemesanan', 'tanggal_pengembalian'];

    protected $fillable = [
        'id_user',
        'id_unit',
        'platnomor',
        'tanggal_pemesanan',
        'tanggal_pengembalian',
        'jumlah_hari',
        'hargatotal',
        'denda',
        'status',
    ];


    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(DataUser::class, 'id_user');
    }

    public function unit()
    {
        return $this->belongsTo(DataUnit::class, 'id_unit');
    }

}
