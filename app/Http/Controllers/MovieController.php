<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Http\Requests\CreateMovieRequest;
use App\Http\Requests\UpdateMovieRequest;

class MovieController extends Controller
{
    public function index(Request $request){
        $title = $request->query('title');
        $take = $request->query('take');
        $skip = $request->query('skip');
        $movies = Movie::search($title, $take,$skip);
        return response()->json($movies);
    }
    public function show(Movie $movie){
        return response()->json($movie);
    }
    public function store(CreateMovieRequest $request){
        $data = $request->validated();
        $movie = Movie::create($data);
        return response()->json($movie,201);
    }
    public function update(UpdateMovieRequest $request,Movie $movie){
        $data = $request->validated();
        if(
            $request->get('title') &&
            $request->get('releaseDate') &&
            Movie::where('title',$request->get('title')
            )->where('releaseDate',$request->get('releaseDate'))
            ->where('id', '!=', $movie->id)->exists()
        ){
            return response()->json([
                'message' => "Movie with the same title and release date already exists"
            ],400);
        }
        $movie->update($data);
        return response()->json($movie);
    }
    public function delete(Movie $movie){
        $movie->delete();
        return response()->noContent();
    }

}
