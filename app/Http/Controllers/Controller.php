<?php

namespace App\Http\Controllers;

use App\Events\StatusLiked;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public static function AtFormStatus(){
        $data =  [
            (object)['id' => 1, 'name'=> 'Compiled'],
            (object)['id' => 2, 'name'=> 'Not Compiled']
         ];

        return $data;
    }
    public static function level(){
        $data = [
            (object)['id' => 1, 'name'=> '1'],
            (object)['id' => 2, 'name'=> '2'],
            (object)['id' => 3, 'name'=> '3'],
            (object)['id' => 4, 'name'=> '4'],
         ];
        return $data;
    }


}
