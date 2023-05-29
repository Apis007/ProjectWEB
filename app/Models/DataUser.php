<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUser extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'data_user';

    protected $primaryKey = 'id_user';

    protected $fillable = [
        'username', 'password', 'no_hp', 'email', 'alamat', 'role'
    ];
    public static function login($email, $password)
{
    $user = self::where('email', $email)->where('password', $password)->first();

    if ($user) {
        return ['status' => 'OK'];
    } else {
        return ['status' => 'FAILED'];
    }
}

}
