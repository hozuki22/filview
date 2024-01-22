<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WwantToSeeList extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'want_to see_lists';

    protected $fillable =
    [
        'id',
        'user_id',
        'cinema_code',
        'saw_flag',
        'deleted_at',
    ];

}
