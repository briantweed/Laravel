<?php namespace App\Http\Controllers;

use DB;
use Request;
use App\Movies;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FilterController extends Controller
{
   use ImageFunctions, AdminChecks;

   protected $isAdmin;

	public function __construct()
   {
  	  $this->isAdmin = $this->checkUserDetails();
   }

   public function filterMovies()
   {
      if(Request::ajax()){
         $data = Request::all();
         $movies = DB::table('movie_details')
                  ->where('name',  'LIKE', '%'.trim($data['val']).'%')
                  ->orWhere('studio',  'LIKE', '%'.trim($data['val']).'%')
                  ->get();
         foreach($movies as $movie)
   		{
   			$movie->cover = $this->checkImageExists($movie->cover, $movie->sort_name);
   			$movie->cover_count = strlen($movie->cover);
   		}
         $user = $this->isAdmin;
         $quote = count($movies) ? "" : $this->getRandomQuote();
         return (String) view('ajax.movie_filter', compact('movies','quote','user'));
      }
   }

   private function getRandomQuote()
   {
      $quoteCount = DB::table('quotes')->count();
      $selectedQuote = rand(1, $quoteCount);
      $quote = DB::table('quotes')
               ->select('movies.movie_id', 'movies.movie_name', 'movies.movie_release_date as released', 'quotes.quote_text as text')
               ->join('movies', 'movies.movie_id', '=', 'quotes.quote_movie_id')
               ->where('quote_id', $selectedQuote)
               ->first();
      return $quote;
   }

} // end of class
