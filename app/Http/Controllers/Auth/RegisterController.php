<?php

namespace App\Http\Controllers\Auth;

use App\Staff;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected $fillable=[
        'name','staff_id','email','password'
    ];
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'staff_id' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $id=$data['staff_id'];
        $staff=Staff::find($id);
        if ($staff->pin==$data['pin']){
            $new= new User();
            $new->name=$staff->staff_name;
            $new->email=$data['email'];
            $new->role_id=$staff->staff_rank;
            $new->staff_id=$id;
            $new->password=Hash::make($data['password']);

            $new->save();
            return $new;
        }

        return redirect()->back();

    }
}
