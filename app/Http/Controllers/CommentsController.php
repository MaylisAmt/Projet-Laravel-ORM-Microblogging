<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function get() {

    }

    public function store(Request $request){
        // récupération des donnes du formulaire
        $data = $request -> validate([
            // ()'post_id' => 'require|exists:posts,id') les 2 arguments vont voir si la table poste et cols id existent
            //'post_id' => '',
            'content' => 'min:1'
        ]);
        dd($data);
        //insertion dans la base de donnée
         $user_id =  Auth::id();
         Comment::create([
            'user_id' -> $user_id,
            'post_id' -> $data['post_id'],
            'content' -> $data['comment'],

         ]);

         return "dump des vars";

    }
}
