<?php

namespace App\http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return new UserCollection(User::paginate(4));
    }

    public function show($id)
    {
        return new UserResource(User::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'min:3|max:15',
            'username' => 'min:3|max:15|unique:users,username',
            'email' => 'email|unique:users,email',
            'avatar' => 'url',
            'bio' => 'string',
            'is_newsletter_on' => 'boolean',
            'is_notification_on' => 'boolean'
        ]);

        return User::findOrFail($id)->update($validated);
    }

    public function destroy($id)
    {
        return User::findOrFail($id)->delete();
    }
}
