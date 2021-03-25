<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Shop;
use App\Food;

class FoodController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Shop  $shop
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Shop $shop)
    {
    	$foods = Shop::findOrFail($shop->id)->foods;
    
    	return view('shop.menu', compact('foods', 'shop'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  Shop $shop
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Shop $shop)
    {
    	return view('food.formCreate', compact('shop'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Shop $shop
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Shop $shop)
    {
        if ($shop->shop_owner_id === Auth::user()->id) {
            $food = new Food();

            $food->name = $request->name;
            $food->size = $request->size;
            $food->price = $request->price;
            $food->taste = $request->taste;

            $shop->foods()->save($food);
            session()->flash('flash_message_success', 'You have successfully added a new food to the list!');
        } else {
            session()->flash('flash_message_error', 'You have failed to add a new food to the list!');
        }
    	return redirect()->route('food.index', [$shop]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Food $food
     * @param  Shop $shop
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop, Food $food)
    {
        return view('food.formEdit', compact('shop', 'food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Shop $shop
     * @param  Food $food
     *
     * @return Response
     */
    public function update(Request $request, Shop $shop, Food $food)
    {
        if ($shop->shop_owner_id == Auth::user()->id) {
            $food->name = $request->name;
            $food->size = $request->size;
            $food->price = $request->price;
            $food->taste = $request->taste;

            $food->save();
            session()->flash('flash_message_success', 'You have successfully updated a food in the list!');
        } else {
            session()->flash('flash_message_error', 'You have failed to update a food in the list!');
        }
        return redirect()->route('food.index', $shop);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Shop $shop
     * @param  Food $food
     *
     * @return Response
     */
    public function destroy(Shop $shop, Food $food)
    {
        if ($shop->shop_owner_id == Auth::user()->id) {
            $food->delete();
            session()->flash('flash_message_success', 'You have successfully removed a food from the list!');
        } else {
            session()->flash('flash_message_success', 'You have failed to remove a food from the list!');
        }
    	return redirect()->route('food.index', [$shop]);
    }
}
