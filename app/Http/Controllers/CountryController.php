<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        return view('search');
    }

    public function fetch(Request $request)
    {
        if ($request->get('query'))
        {
            $query = $request->get('query');
            $data = Country::where('name','LIKE',"%{$query}%")->get();
            //dd($data);
            $output = '<ul class="dropdown-menu" style="display:block; position:relative;">';
            foreach ($data as $row)
            {
                $output .='<li><a class="dropdown-item" href="#">'.$row->name.'</a></li>';
            }
            $output .='</ul>';
            echo $output;
        }
    }
}
