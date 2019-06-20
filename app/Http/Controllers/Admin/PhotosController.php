<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotosController extends Controller
{
    public function store(Post $post)
    {
    	$this->valida(reques(),{
     		'photo' => 'image'	
    	});
    	$photo = return request()->file('photo');
    }
}
