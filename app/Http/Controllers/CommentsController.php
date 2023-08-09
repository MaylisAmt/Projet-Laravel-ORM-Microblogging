<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function show() {
      $comments = Comment::latest()->get();
      return view('/posts', ['comments' => $comments]);
    }

    public function delete(Comment $comment) {
        $idAuthor = $comment->user_id;
        if(Auth::id() === $idAuthor){
            //supprime le commentaire
            $comment ->delete();
            return redirect()->back()->with('succes', 'Commentaire supprimé 🫥');
        }
        else{
            return redirect()->back()->with('error', "Tu n'est pas autorisé à supprimer ce commentaire ⛔️");
        }
    }

    public function store(Request $request){
        // récupération des donnes du formulaire

        $data = $request -> validate([
        //     // ()'post_id' => 'require|exists:posts,id') les 2 arguments vont voir si la table poste et cols id existent
            'post_id' => 'required|exists:posts,id',
            'comment' => 'required|min:1'
        ]);
         
        //insertion dans la base de donnée
         $user_id =  Auth::id();
            //dd($data['comment'],$data['post_id'], $user_id);
         Comment::create([
            'user_id' => $user_id,
            'post_id' => $data['post_id'],
            'content' => $data['comment'],

         ]);

         return redirect()->back()->with('success', 'Commentaire ajouté 🥳');


    }
}
