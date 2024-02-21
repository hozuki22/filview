<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pre_User extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'pre_users';

    protected $fillable =
    [
        'id',
        'email',
        'hash',
        'deleted_at',
    ];
}
