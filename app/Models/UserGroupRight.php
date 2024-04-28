<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroupRight extends Model
{
    use HasFactory;


    public $timestamps = false;
    protected $table = 'users';

    
    protected $fillable = [
        'user_group_id',
        'menu_link_id',
        'data_status',
        'entry_by',
        'entry_datetime',
        'last_modify_by',
        'last_modify_datetime',
        'delete_by',
        'delete_datetime',
    ];
}
