<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Follower extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'followers';
    protected $fillable =
    [
        'id',
        'follower_id',
        'followed_id',
        'followflag',
        'deleted_at',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
