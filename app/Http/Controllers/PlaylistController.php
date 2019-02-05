<?php

namespace App\Http\Controllers;

use App\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
    public function index()
    {
    	$playlists = Playlist::where('user_id' , Auth::id())->orederBy('name','asc')->get();
    	return response()->json($playlists);

    }
    public function store(Request $request)
    {
        $this->validate([
            'name' => 'required|min:3',
            'is_private' => 'required',
        ]);
        $playlist = Playlist::create([
            'name' => $request->name,
            'user_id' => Auth::id(),
            'is_private' => $request->is_private,
        ]);
        return response()->json($playlist, 201);
    }
}
