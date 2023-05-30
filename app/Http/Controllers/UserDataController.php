<?php

namespace App\Http\Controllers;

use App\Models\Cookie as ModelsCookie;
use App\Models\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class UserDataController extends Controller
{
    public function index(Request $request)
    {
        $user_id = auth()->id();
        if($request->hasCookie('user')) {
            // $user_cookie = json_decode(request()->cookie('user'), true);
                $user_data = UserData::where('user_id', $user_id)->get()->first();
                if($user_data) {
                } //should be checked whether user has these data or not if not return error not found
                return response($user_data, Response::HTTP_OK);
        } else {
            $cookie = cookie('user', json_encode(['user_id' => $user_id]), 60*24*7);
            ModelsCookie::create(['user_id' => $user_id]);
            return response('Cookie created!', Response::HTTP_OK)->cookie($cookie);
        }
    }

    public function updateOrCreate(Request $request)
    {
        $user = Auth::user();
        $newData = $request->all();
        $newData['user_id'] = $user->id;
        $user_data = UserData::where('user_id', $user->id)->get()->first();
        if($user_data) {
            $user_data->update($newData);
        } else {
            UserData::create($newData);
        }
        
        return response('saved', Response::HTTP_CREATED);
    }
}
