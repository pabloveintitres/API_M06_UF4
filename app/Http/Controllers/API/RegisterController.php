<?php


namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;


class RegisterController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $input = $request->all();
        // https://laravel.com/docs/7.x/hashing
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        // https://stackoverflow.com/questions/46771773/laravel-passport-api-createtoken-get-id
        // What is the name parameter for? – Joshua Kissoon Dec 5 '17 at 11:21
        // It's just a descriptive name for the token you are creating. – Paul Hermans Dec 10 '17 at 13:48
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;


        return $this->sendResponse($success, 'User register successfully.');
    }
}
