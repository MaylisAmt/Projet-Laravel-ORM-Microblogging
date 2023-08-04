<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


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
            $chemin_image = $request->image->store(config('images.path'), 'public');
            //$chemin_image = $request->file('picture')->store('public');
        } catch (\Exception $e) {
            // Handle the error
            return back()->withInput()->withErrors(['picture' => 'Failed to upload the picture']);
        }

    //     // récupération de l'userId
             $user_id = Auth::id();
           
    // // Enregistrement dans base de donnée
      Post::create([
          "title" => $data['title'],
    //      //"picture" => $chemin_image,
         "content" => $data['detail'],
         "user_id" => $user_id,
     ]);
    
     return "Post envoyé";
    }       

}
