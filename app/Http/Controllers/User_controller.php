<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;
//use Illuminate\Pagination\LengthAwarePaginator;

class User_controller extends Controller
{

    public function index()
    {
        if (isset($_GET['sort']))
        {
            if($_GET['desc']==0)
            {
                $user = User::orderBy($_GET['sort'])->paginate(5);
            }
            else
            {
                $user = User::orderByDesc($_GET['sort'])->paginate(5);
            }
            $user->appends([
                'sort'  =>  $_GET['sort'],
                'desc'  =>  $_GET['desc']
            ]);
        }
        else
        {
            $user = User::paginate(5);
        }
                
        $datos_vista = array(
            'users'     =>  $user
        );
        return view('user.user_list',$datos_vista);
    }
}
