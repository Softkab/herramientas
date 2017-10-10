<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;

class QueryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
	{
    // Gets the query string from our form submission 
    $query = $request->search;
    // Returns an array of articles that have the query string located somewhere within 
    // our articles titles. Paginates them so we can break up lots of search results.
    $articles = Productos::where('nombre', 'LIKE', '%' . $query . '%')->paginate(10);

    // returns a view and passes the view the list of articles and the original query.
    return view('search', compact('articles', 'query'));
 	}

    public function store(Request $request)
	{
    // Gets the query string from our form submission 
    $query = $request->search;
    // Returns an array of articles that have the query string located somewhere within 
    // our articles nombres. Paginates them so we can break up lots of search results.
    $productos =  Productos::where('nombre', 'LIKE', '%' . $query . '%')->paginate(10);

    // returns a view and passes the view the list of productos and the original query.
   return view('search', compact('productos', 'query'));
    //return $articles;
 	}

 	

}
