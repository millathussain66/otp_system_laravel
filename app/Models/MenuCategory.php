<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'menu_category';

    protected $fillable = [
        'menu_group_id',
        'menu_cate_name',
        'url_prefix',
        'has_child',
        'sort_order',
        'entry_by',
        'entry_datetime',
        'update_by',
        'update_datetime',
        'delete_by',
        'delete_datetime',
        'data_status',
        'grid_nav_sts',
    ];
}
