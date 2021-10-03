<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ThreeDModelStoreRequest;
use App\Http\Requests\ThreeDModelUpdateRequest;
use App\Http\Resources\ThreeDModelCollection;
use App\Http\Resources\ThreeDModelResource;
use App\Models\ThreeDModel;

class ThreeDModelController extends Controller
{
    public function index()
    {
        if (auth()->user()->cannot('viewAny')) {
            return response(['message' => 'not authorized'], 403);
        }

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

        if (auth()->user()->cannot('view', $three_d_model)) {
            return response(['message' => 'not authorized'], 403);
        }

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
}
