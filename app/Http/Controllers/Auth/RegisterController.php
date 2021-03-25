<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\ShopOwner;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use TCG\Voyager\Models\Role;

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
    protected $redirectTo = '/';

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
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'name'       => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users',
            'password'   => 'required|string|min:8|confirmed',
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
        $newUser = new User();

        $newUser->name       = $data['name'];
        $newUser->first_name = $data['first_name'];
        $newUser->last_name  = $data['last_name'];
        $newUser->email      = $data['email'];
        $newUser->password   = bcrypt($data['password']);

        if (isset($data['role_id'])) {
            $newUser->role_id = $data['role_id'];
        }

        if ($newUser->save()) {
            // should make the dynamic role_id
            if ($newUser->role_id == 3) {
                $newShopOwner = new ShopOwner();

                $newShopOwner->id = $newUser->id;

                if (isset($data['phone'])) {
                    $newShopOwner->phone = $data['phone'];
                }
                else {
                    $newShopOwner->phone = '011 012 013 018';
                }
                $newShopOwner->save();
            }

            return $newUser;
        }
    }
}
