<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class NewPostController extends Controller
{
    //création d'un post
    public function get() {
        //
    }

    public function store(Request $request) {

        $data = $request->validate([
            'title' => 'required|max:100',
            'detail' => 'required|max:500',
            'image' => 'max:4096',
        ]);

    
         // 2. On upload l'image dans "/storage/app/public/posts"
         //$chemin_image = $request->file('picture')->store('public');
         try {
            $chemin_image = $request->image->store('posts', 'public');

        } catch (\Exception $e) {
            // Handle the error
            return back()->withInput()->withErrors(['picture' => 'Failed to upload the picture']);
        }

    // récupération de l'userId
        $user_id = Auth::id();
    // récupération de l'id du wotd
        $arrayLastWotd = DB::table('wotds')->orderBy('id', 'desc')->limit(1)->get('id');
        $linked_wotd_id = $arrayLastWotd[0]->id;

           
    // // Enregistrement dans base de donnée
      Post::create([

        "title" => $data['title'],
        "picture" => $chemin_image,
        "content" => $data['detail'],
        "user_id" => $user_id,
        "linked_wotd_id" => $linked_wotd_id,

     ]);
    
     return redirect()->back()->with('success', 'Post ajouté avec succès.');

    }       

}
