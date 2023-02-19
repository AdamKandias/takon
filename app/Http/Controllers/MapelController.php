<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MapelController extends Controller
{
    public function index(Request $request)
    {
        $searchMapel = ucwords(str_replace("-", " ", $request->get("mapel", "matematika")));
        $mapel = Mapel::where('mapel', $searchMapel)->first();

        if ($mapel == null) {
            return redirect()->back()->with("status", "Tidak ditemukan pertanyaan dengan mapel $searchMapel");
        }

        // $posts = Post::orderBy("created_at", "desc")->where("mapel_id", $mapel->id)->paginate(5);
        $posts = Mapel::find($mapel->id)->posts()->simplePaginate(5)->withQueryString();

        return view("post.mapel", ["posts" => $posts, "topRank" => User::topRank(), "currentMapel" => $mapel->mapel, "allMapel" => Mapel::fetchAll()]);
    }
}
