<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Shop;
use App\Review;
use App\Http\Controllers\DB;
use Carbon\Carbon;



class ReviewController extends Controller
{
    /**
     * @param Shop $shop
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Shop $shop)
    {
        $reviews = Shop::findOrFail($shop->id)->reviews()->with('user')->get();

        return view('review.index', compact('reviews','shop'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * @param Request $request
     * @param Shop $shop
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Shop $shop)
    {
        $user = auth()->user();
        $review = $user->review;  

        if($review instanceof Review) {
            $review->rating = $request->rate;
            $review->description = $request->description;
            $review->user_id = $request->user()->id;
            $review->shop_id = $shop->id;
            $review->updated_at = Carbon::now();

            $review->update();
            session()->flash('flash_message_success', 'You have just reviewed the shop again!');
        } else {
            $review = new Review();
            $review->rating = $request->rate;
            $review->description = $request->description;
            $review->user_id = $request->user()->id;
            $review->shop_id = $shop->id;

            $review->save();
            session()->flash('flash_message_success', 'You have just reviewed the shop!');
        }
        
        $rating = Shop::findOrFail($shop->id)->reviews()->avg('rating');
        $shop->rating = $rating;
        $shop->save();
        return redirect()->route('review.index', [$shop]);
    }

    /**
     * @param Review $review
     */
    public function show(Review $review)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
