<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartStoreRequest;
use App\Http\Requests\CartUpdateRequest;
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

        return new CartCollection(Cart::paginate(10));
    }

    public function store(CartStoreRequest $request)
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

    public function update(CartUpdateRequest $request, $id)
    {
        $cart = Cart::findOrFail($id);

        if ($request->user()->cannot('update', $cart)) {
            return response(['message' => 'not authorized'], 403);
        }

        $validated = $request->validated();

        return $cart->update($validated);
    }

    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);

        if (auth()->user()->cannot('delete', $cart)) {
            return response(['message' => 'not authorized'], 403);
        }

        return $cart->delete();
    }
}
