<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use App\Http\Requests;
use App\User;
use App\ShopOwner;
use App\Role;
use Auth;
use Image;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  User  $user
     *
     * @return Response
     */
    public function show(User $user)
    {
        $role = Role::where('name', 'shop_owner')->firstOrFail();

        if ($role->id == $user->role_id) {
            $shops = ShopOwner::find($user->id)->shops;
            return view('user.profile', compact('user', 'shops'));
        } else {
            return view('user.profile', compact('user'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     *
     * @return Response
     */
    public function edit(User $user)
    {
        return view('user.formEdit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  User  $user
     * @return Response
     */
    public function update(Request $request, User $user)
    {
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->name       = $request->name;
        $user->email      = $request->email;
        $user->save();
        session()->flash('flash_message_success', 'You have successfully updated your profile!');

        return redirect()->route('user.show', [$user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return Response
     */
    public function destroy(User $user)
    {
        //
    }

    /**
     * Update user avatar (profile page)
     *
     * @param  Request $request
     *
     * @return Response
     */
    public function update_avatar(Request $request)
    {
    	if ($request->hasFile('avatar')) {
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/storage/users/' . $filename) );
    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
            session()->flash('flash_message_success', 'You have successfully updated your avatar!');
    	}

    	return redirect()->route('user.show', [$user]);
    }
}
