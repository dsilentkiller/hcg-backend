<?php
namespace App\Http\Controllers\API;



use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //Register
    public function register(Request $request){
        try{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            $success = true;
            $message = 'User Register Successfully';
        }catch(\Illuminate\Database\QueryException $ex){
            $success = false;
            $message = $ex->getMessage();
        }

        //response
        $response = [
            'success' => $success,
            'message' =>$message,
        ];
        return response()->json($response);
    }

    //login
    public function login(Request $request){
        $credentials =[
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials, true)){
            $success = true;
            $message = 'User Login Successfully';

        }else{
            $success = false;
            $message = 'Unauthorised';
        }
        // response
        $response =[

            'success' => $success,
            'message' =>$message,
        ];
        return response()->json($response);
    }

    // logout

    public function logout(){
        // Session::flush();
        try{
            //Session::flush();
            Auth::guard('web')->logout();
            $success = true;
            $message ='Successfully logged out';
        }catch(\Illuminate\Database\QueryException $ex){
            $success=false;
            $message = $ex->getMessage();
        }
        // response
        $response =[

            'success' => $success,
            'message' =>$message,
        ];
        return response()->json($response);
    }

}
