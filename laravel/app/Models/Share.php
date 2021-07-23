<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'shara_name',
        'prefecture_name',
        'municipality_name',
        'supplementary_address',
        'share_picture',
        'share_text',
        'exchange_about',
        'build_age',
        'private_room',
        'dormitory_room',
        'access_about',
        'friends_exchange',
        'friend_desc',
        'gender_ratio',
        'jp_ov_ratio',
        'age_ratio',
    ];

    public function user()
    {
        return $this->belongsTo('App\Model\AdminUser');
    }
}
