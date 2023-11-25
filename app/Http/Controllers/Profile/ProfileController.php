<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    private $user;
    public function __construct(User $user) {
        $this->user = $user;
    }

    public function getProfile()
    {
        $id = Auth::id();
        $user = $this->user->where('id', $id)->first();
        return response()->json($user);
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $params = $request->all();
        $id = Auth::id();
        $this->user->where('id', $id)->update($params);
        return response()->json([
            'message' => 'update profile successfully'
        ]);
    }
}
