<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ThreeDModelStoreRequest;
use App\Http\Requests\ThreeDModelUpdateRequest;
use App\Http\Resources\ThreeDModelCollection;
use App\Http\Resources\ThreeDModelResource;
use App\Models\ThreeDModel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ThreeDModelController extends Controller
{
    public function index()
    {
        return new ThreeDModelCollection(ThreeDModel::paginate(10));
    }

    public function store(ThreeDModelStoreRequest $request)
    {
        if ($request->user()->cannot('create')) {
            return response(['message' => 'not authorized'], 403);
        }

        $validated = $request->validated();
        $validated['user_id'] = $request->user()->id;

        return ThreeDModel::create($validated);
    }

    public function show($id)
    {
        $three_d_model = ThreeDModel::findOrFail($id);
        
        $three_d_model->update(['view' => $three_d_model->view + 1]); // increase 3d model's view 

        return new ThreeDModelResource($three_d_model);
    }

    public function update(ThreeDModelUpdateRequest $request, $id)
    {
        $three_d_model = ThreeDModel::findOrFail($id);

        if ($request->user()->cannot('update', $three_d_model)) {
            return response(['message' => 'not authorized'], 403);
        }

        $validated = $request->validated();

        return $three_d_model->update($validated);
    }

    public function destroy($id)
    {
        $three_d_model = ThreeDModel::findOrFail($id);

        if (auth()->user()->cannot('delete', $three_d_model)) {
            return response(['message' => 'not authorized'], 403);
        }

        return $three_d_model->delete();
    }

    public function add_category(Request $request, $id)
    {
        $three_d_model = ThreeDModel::findOrFail($id);

        $validated = $request->validate([
            'category_id' => ['required', 'integer', 'numeric', 'exists:categories,id']
        ]);

        if ($request->user()->cannot('add_category', $three_d_model)) {
            return response(['message' => 'not authorized'], 403);
        }

        $three_d_model->categories()->attach($validated['category_id']);

        return response(['message' => 'category added to 3d model seccessfully.'], 200);
    }

    public function remove_category(Request $request, $id)
    {
        $three_d_model = ThreeDModel::findOrFail($id);

        $validated = $request->validate([
            'category_id' => ['required', 'integer', 'numeric', 'exists:categories,id']
        ]);

        if (!$three_d_model->categories->contains($validated['category_id'])) {
            return response(['message' => '3d model has not that category'], 403);
        }

        if ($request->user()->cannot('remove_category', $three_d_model)) {
            return response(['message' => 'not authorized'], 403);
        }

        $three_d_model->categories()->detach($validated['category_id']);

        return response(['message' => '3d model category removed seccessfully.'], 200);
    }

    public function add_tag(Request $request, $id)
    {
        $three_d_model = ThreeDModel::findOrFail($id);

        $validated = $request->validate([
            'tag_id' => ['required', 'integer', 'numeric', 'exists:tags,id']
        ]);

        if ($request->user()->cannot('add_tag', $three_d_model)) {
            return response(['message' => 'not authorized'], 403);
        }

        $three_d_model->tags()->attach($validated['tag_id']);

        return response(['message' => 'tag added to 3d model seccessfully.'], 200);
    }

    public function remove_tag(Request $request, $id)
    {
        $three_d_model = ThreeDModel::findOrFail($id);

        $validated = $request->validate([
            'tag_id' => ['required', 'integer', 'numeric', 'exists:tags,id']
        ]);

        if (!$three_d_model->tags->contains($validated['tag_id'])) {
            return response(['message' => '3d model has not that tag'], 403);
        }

        if ($request->user()->cannot('remove_tag', $three_d_model)) {
            return response(['message' => 'not authorized'], 403);
        }

        $three_d_model->tags()->detach($validated['tag_id']);

        return response(['message' => '3d model tag removed seccessfully.'], 200);
    }
}
