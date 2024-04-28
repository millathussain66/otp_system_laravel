<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuSubCategory extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'menu_sub_category';


    protected $fillable = [
        'menu_group_id',
        'menu_cate_id',
        'menu_sub_cate_name',
        'url_prefix',
        'has_child',
        'sort_order',
        'nums_row',
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
