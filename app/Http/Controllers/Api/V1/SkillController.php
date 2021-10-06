<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SkillStoreRequest;
use App\Http\Requests\SkillUpdateRequest;
use App\Http\Resources\SkillCollection;
use App\Http\Resources\SkillResource;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        return new SkillCollection(Skill::paginate(10));
    }

    public function store(SkillStoreRequest $request)
    {
        if($request->user()->cannot('create')){
            return response(['message' => 'not authorized'], 403);
        }

        $validated = $request->validated();

        return Skill::create($validated);
    }

    public function show($id)
    {
        $skill = Skill::findOrFail($id);
        return new SkillResource($skill);
    }

    public function update(SkillUpdateRequest $request, $id)
    {
        $skill = Skill::findOrFail($id);

        if($request->user()->cannot('update', $skill)){
            return response(['message' => 'not authorized'], 403);
        }

        $validated = $request->validated();

        return $skill->update($validated);
    }

    public function destroy($id)
    {
        $skill = Skill::findOrFail($id);

        if(auth()->user()->cannot('delete', $skill)){
            return response(['message' => 'not authorized'], 403);
        }

        return $skill->delete();
    }
}
