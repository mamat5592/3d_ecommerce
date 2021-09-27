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
        $threeDModel = $request->all();
        $threeDModel['user_id'] = auth()->user()->id;

        return ThreeDModel::insert($threeDModel);;
    }

    public function show($id)
    {
        return new ThreeDModelResource(ThreeDModel::findOrFail($id));
    }

    public function update(ThreeDModelUpdateRequest $request, $id)
    {
        return ThreeDModel::findOrFail($id)->update($request->all());
    }

    public function destroy($id)
    {
        return ThreeDModel::findOrFail($id)->delete();
    }
}
