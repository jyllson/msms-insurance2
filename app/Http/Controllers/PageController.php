<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function show($id)
    {
    	return view('page-show', compact('id'));
    }

    public function store(Request $request)
    {    	

    	for ($i=1; $i <= 3; $i++) {
    		$page_key = 'page_' . $i;
    		$page = Page::find($i);
    		if($page->name != $request->$page_key){
    			$page->name = $request->$page_key;
    			$page->save();
    		}
    	}
    	
    	return redirect('/home')->with('status', 'Ime je izmenjeno!');
    }

    public function storeData(Request $request)
    {
    	dd($request);
    }
}
