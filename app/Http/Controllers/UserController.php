<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){
        $type = $request->get('type');
        $users = null;
        switch ($type) {
            case 'Supervisor':
                $users = User::all()->where('type','<>','Administrador');
                break;
            case 'Administrador':
                $users = User::all();
            break;
            default:
                # code...
                break;
        }
        return response()->json($users,200);
    }
    public function update(Request $request){
        $user = User::find($request->get('id'));
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        if($user){
            $user->update($input);
        }
        return response()->json($user,200);
    }
    public function delete(Request $request){
        $user = User::find($request->get('id'));
         if($user){
             $user->delete();
         }
         $message = 'Usuario borrado con exito';
        return response()->json($message,200);
    }
}
