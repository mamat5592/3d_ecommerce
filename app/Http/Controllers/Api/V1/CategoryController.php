<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        if (auth()->user()->cannot('viewAny')) {
            return response(['message' => 'not authorized'], 403);
        }

        return new CategoryCollection(Category::all());
    }

    public function store(CategoryStoreRequest $request)
    {
        if ($request->user()->cannot('create')) {
            return response(['message' => 'not authorized'], 403);
        }

        $validated = $request->validated();

        return Category::create($validated);
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);

        if (auth()->user()->cannot('view', $category)) {
            return response(['message' => 'not authorized'], 403);
        }

        return new CategoryResource($category);
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        if ($request->user()->cannot('update')) {
            return response(['message' => 'not authorized'], 403);
        }

        $validated = $request->validated();
        $category = Category::findOrFail($id);

        return $category->update($validated);
    }

    public function destroy($id)
    {
        if (auth()->user()->cannot('delete')) {
            return response(['message' => 'not authorized'], 403);
        }
        
        $category = Category::findOrFail($id);

        return $category->delete();
    }
}
