<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;

class DataController extends Controller
{
	public function index()
	{
        $id = '';

		return view('data-show', compact('id'));
	}

    public function show($id)
    {
        $datas = Data::where('page_id', '=', $id)->latest()->paginate(5);

        return view('page-show-data', compact('id', 'datas'));
    }

    public function store(Request $request)
    {
    	//dd($request);

    	$data = new Data();
    	$data->page_id = $request->page;
    	$data->title = $request->data_title;
    	$data->text = $request->data_text;
    	$data->save();

    	return redirect('/page/' . $request->page)->with('status', 'Podaci su uspesno snimljeni!');
    }
}
