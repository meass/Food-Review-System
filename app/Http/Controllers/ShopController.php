<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Models\Role;
use App\User;
use App\ShopOwner;
use App\Shop;
use App\ShopCategory;
use App\Province;



class ShopController extends Controller
{
    /**
     * ShopController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => 'required|string|max:255',
            'address'  => 'required|string|max:255',
            'phone'    => 'required|integer|max:15',
            'email'    => 'required|string|email|max:255|unique:users',
            'website'  => 'string|max:100',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = Shop::orderBy('rating', 'desc')->take(3)->get();
        return view('homepage',compact('shops'));
    }

    /**
     * @param User $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
        $shopCategories = ShopCategory::all();
        $provinces = Province::all();

        return view('shop.formCreate', compact('user'))
                ->with([
                    'shopCategories' => $shopCategories,
                    'provinces'      => $provinces
                ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        if ( $shopOwner = ShopOwner::findOrFail($user->id) ) {
            $newShop = new Shop();

            $newShop->name         = $request->name;
            $newShop->category_id  = $request->category;
            $newShop->province_id  = $request->province;
            $newShop->address      = $request->address;
            $newShop->phone        = $request->phone;
            $newShop->email        = $request->email;
            $newShop->website      = $request->website;

            $shopOwner->shops()->save($newShop);
            session()->flash('flash_message_success', 'You have successfully created a new shop!');

            return redirect()->route('shop.show', [$newShop]);
        } else {
            session()->flash('flash_message_error', 'You have failed to create a new shop!');

            return redirect()->route('user.show', [$user]);
        }
    }

    /**
     *
     * @param  Shop $shop
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        return view('shop.home', compact('shop'));
    }

    /**
     * @param Shop $shop
     * @return mixed
     */
    public function edit(Shop $shop)
    {
        $currentCategory = ShopCategory::findOrFail($shop->category_id);
        $shopCategories = ShopCategory::where('id', '!=', $shop->category_id)->get();

        $currentProvince = Province::findOrFail($shop->province_id);
        $provinces = Province::where('id', '!=', $shop->province_id)->get();

        return view('shop.formEdit', compact('shop'))
                ->with([
                    'currentCategory' => $currentCategory,
                    'shopCategories'  => $shopCategories,
                    'currentProvince' => $currentProvince,
                    'provinces'       => $provinces
                ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Shop $shop
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        if ($shopOwner = ShopOwner::findOrFail(Auth::user()->id)) {
            $shop->name        = $request->name;
            $shop->category_id = $request->category;
            $shop->province_id = $request->province;
            $shop->address     = $request->address;
            $shop->phone       = $request->phone;
            $shop->email       = $request->email;
            $shop->website     = $request->website;

            $shop->save();
            session()->flash('flash_message_success', 'You have successfully updated the shop!');
        } else {
            session()->flash('flash_message_success', 'You have failed to update the shop!');
        }

        return redirect()->route('shop.show', [$shop]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
