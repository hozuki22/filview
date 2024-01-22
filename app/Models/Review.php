<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'reviews';

    protected $fillable =
    [
        'id',
        'user_id',
        'review_id',
        'cinema_code',
        'point',
        'review_comment',
        'deleted_at',
    ];


}
