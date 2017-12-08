<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex()
    {
    	return view('index');
    }
    public function postIndex(Request $request)
    {
        
    	if($request->hasFile('image'))
    	{
    		foreach($request->file('image') as $file)
            {
                $allowed = array("image/jpg","image/png","image/jpeg");

                $filename = $file->getClientOriginalName();

                $ext = $file->getClientOriginalExtension();

                $renamed = uniqid('_anh',true). "." .$ext;

                if(in_array($file->getClientMimeType(), $allowed)){
                     $file->move('uploaded/',$renamed);
                }
            }

    	}
        return redirect("/");
    }
}
