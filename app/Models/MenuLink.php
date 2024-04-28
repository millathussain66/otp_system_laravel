<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuLink extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'menu_link';

    protected $fillable = [
        'menu_group_id',
        'menu_cate_id',
        'menu_sub_cate_id',
        'menu_operation',
        'menu_link_name',
        'url_prefix',
        'sort_order',
        'entry_by',
        'entry_datetime',
        'update_by',
        'update_datetime',
        'delete_by',
        'delete_datetime',
        'data_status',
    ];

}
