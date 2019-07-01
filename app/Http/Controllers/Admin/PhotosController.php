<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
	public function store(Post $post)
    {

    	$this->validate(request(), [
     		'foto' => 'required|image|max:2048'	
    	]);

    	$photo = request()->file('foto')->store('public');
    	


    	// $photoUrl = Storage::url($photo);

    	Photo::create([
    		'url' => Storage::url($photo),
    		'post_id' => $post->id

    	]);
    }

    public function destroy(Photo $photo)
    {
        $photo->delete(); //Borramos registro de la base de datos
        $photoPath = str_replace('storage', 'public', $photo->url); //Mandamos a llamar la url de la foto y reemplazamos 'storage' por 'public'
        Storage::delete($photo->url); 
        return back()->with('flash', 'Foto eliminada');
    }
}