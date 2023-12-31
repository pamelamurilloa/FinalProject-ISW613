<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'password',
        'email',
        'cellphone',
        'role_id',
        'public',
        'remember_token'
    ];
}
