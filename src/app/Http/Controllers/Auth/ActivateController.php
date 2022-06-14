<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivateController extends Controller
{
    public function activate(Request $request)
    {
        $user = User::where('email', $request->email)->where('activation_token', $request->token)->firstOrFail();

        $user->update ([
            'active' => true,
            'activation_token' => null
        ]);

        Auth::loginUsingId($user->id);

        return redirect()->route('films.content.site')->withSuccess('Вы успешно активировали свой аккаунт!');
    }
}
