<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookmarkStoreRequest;
use App\Http\Requests\BookmarkUpdateRequest;
use App\Http\Resources\CartCollection;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        if (auth()->user()->cannot('viewAny')) {
            return response(['message' => 'not authorized'], 403);
        }

        return new CartCollection(Cart::all());
    }

    public function store(BookmarkStoreRequest $request)
    {
        if ($request->user()->cannot('create')) {
            return response(['message' => 'not authorized'], 403);
        }

        $validated = $request->validated();
        $validated['user_id'] = $request->user()->id;

        return Cart::create($validated);
    }

    public function show($id)
    {
        $cart = Cart::findOrFail($id);

        if (auth()->user()->cannot('view', $cart)) {
            return response(['message' => 'not authorized'], 403);
        }

        return new CartResource($cart);
    }

    public function update(BookmarkUpdateRequest $request, $id)
    {
        if ($request->user()->cannot('update')) {
            return response(['message' => 'not authorized'], 403);
        }

        $validated = $request->validated();
        $cart = Cart::findOrFail($id);

        return $cart->update($validated);
    }

    public function destroy($id)
    {
        if (auth()->user()->cannot('delete')) {
            return response(['message' => 'not authorized'], 403);
        }
        
        $cart = Cart::findOrFail($id);

        return $cart->delete();
    }
}
