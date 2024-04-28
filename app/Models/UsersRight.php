<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersRight extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'users_rights';

    protected $fillable = [
        'user_info_id',
        'menu_link_id',
        'entry_by',
        'entry_datetime',
        'last_modify_by',
        'last_modify_datetime',
        'delete_by',
        'delete_datetime',
        'data_status',
    ];
}
