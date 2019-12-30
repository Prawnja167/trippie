<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wishlist;
use Auth;
class WishlistController extends Controller
{
    public function addWishlist($id){
        Wishlist::create([
            'user_id' => Auth::user()->id,
            'place_id' => $id
        ]);
        return redirect('place/'.$id);
    }
}
