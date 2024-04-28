<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuGroup extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'menu_group';

    protected $fillable = [
        'sort_name',
        'menu_name',
        'has_child',
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
