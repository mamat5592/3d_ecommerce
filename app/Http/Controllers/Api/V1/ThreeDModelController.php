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
        return new ThreeDModelCollection(ThreeDModel::paginate(4));
    }

    public function store(ThreeDModelStoreRequest $request)
    {
        $threeDModel = $request->validated();
        $threeDModel['user_id'] = auth()->user()->id;

        return ThreeDModel::insert($threeDModel);;
    }

    public function show($id)
    {
        return new ThreeDModelResource(ThreeDModel::findOrFail($id));
    }

    public function update(ThreeDModelUpdateRequest $request, $id)
    {
        $threeDModel = ThreeDModel::findOrFail($id);

        if(auth()->user()->cannot('update', $threeDModel)){
            // abort(403);
            return response(['message' => 'not authorized'], 403);
        }

        return $threeDModel->update($request->validated());
    }

    public function destroy($id)
    {
        $threeDModel = ThreeDModel::findOrFail($id);

        if(auth()->user()->cannot('update', $threeDModel)){
            // abort(403);
            return response(['message' => 'not authorized'], 403);
        }

        return $threeDModel->delete();
    }
}
