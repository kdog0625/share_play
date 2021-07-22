<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin_User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'admin_users';
    protected $guard = 'admin';

    protected $fillable = [
        'name',
        'share_user_id',
        'name_kanji1',
        'name_kanji2',
        'name_kana1',
        'name_kana2',
        'birth_day',
        'age',
        'sex',
        'area_country',
        'prefecture_name',
        'tel',
        'profile_image',
        'profile_text',
        'email',
        'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
