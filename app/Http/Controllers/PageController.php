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
                $filename = $file->getClientOriginalName();
                $file->move('uploaded/',$filename);

            }

    	}
        return redirect("/");
    }
}
