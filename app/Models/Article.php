<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
/** @use HasFactory<\Database\Factories\...Factory> */
class Article extends Model
{
    //ajout
   /**
    * @use HasFactory<\Database\Factories\ArticleFactory>
    */
    use HasFactory;
   protected $fillable = ['title', 'body', 'user_id', 'image'];
   //un article n'a qu'un auteur 
   public function user(){
    return $this->belongsTo(User::class);
   }
   //un article peut avoir plusieurs commentaires
   public function comments(){
    return $this->hasMany(Comment::class);
    }
}
