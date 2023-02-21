<?php

namespace App\Http\Controllers;

use App\Helpers\PaginationHelper;
use App\Models\Answer;
use App\Models\Mapel;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MapelController extends Controller
{
    public function index(Request $request)
    {
        $searchMapel = ucwords(str_replace("-", " ", $request->get("mapel", "matematika")));
        $filter = ucwords(str_replace("-", " ", $request->get("filter", "semua")));
        
        $mapel = Mapel::where('mapel', $searchMapel)->first();

        if ($mapel == null) {
            return redirect()->back()->with("status", "Tidak ditemukan pertanyaan dengan mapel $searchMapel");
        }

        $posts = Mapel::find($mapel->id)->posts()->latest()->simplePaginate(10)->withQueryString();

        if ($filter == "Terjawab") {
            $posts = $posts->reject(function ($post) {
                return $post->answer == null;
            });
            $posts = PaginationHelper::paginate($posts, 10);
        } else if ($filter == "Belum Terjawab") {
            $posts = $posts->reject(function ($post) {
                return $post->answer != null;
            });
            $posts = PaginationHelper::paginate($posts, 10);
        }

        return view("post.mapel", ["posts" => $posts, "topRank" => User::topRank(), "currentMapel" => $mapel->mapel, "allMapel" => Mapel::fetchAll(), "filter" => $filter]);
    }
}
