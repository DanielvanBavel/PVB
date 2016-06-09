<?php

namespace SocialApp\Models;

use Auth;
use DB;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuses';

    protected $fillable = [
        'body',
    ];

    public function user() {
        return $this->BelongsTo('SocialApp\Models\User', 'user_id');
    }

    /*
    * With this functions no new status will be posted on a reply.
    */

    public function scopeNotReply($query) {
        return $query->whereNull('parent_id');
    }

    public function replies() {
        return $this->hasMany(new Status, 'parent_id');
    }

    public function likes() {
        return $this->morphMany('SocialApp\Models\Like', 'likeable');
    }
}