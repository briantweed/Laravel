<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model {

	protected $table = 'movies';

	protected $fillable = array(
		'movie_name',
		'movie_sort_name',
		'movie_release_date',
		'movie_image_path',
		'movie_my_rating',
		'movie_running_time',
		'movie_certificate_id',
		'movie_format_id',
		'movie_studio_id',
		'movie_bio',
	);

	public function scopeOfMovie($query,$id)
	{
		return $query->where('movie_id', $id);
	}

} // end of model
