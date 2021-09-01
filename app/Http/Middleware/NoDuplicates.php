<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Movie;


class NoDuplicates
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $alreadyExists = Movie::where('title', $request->get('title', ''))
             ->where('releaseDate', $request->get('releaseDate', ''))
             ->exists();
        if($alreadyExists){
            return response()->json([
                'message' => 'Movie with the same title and release date already exists'
            ],400);
        }
        return $next($request);
    }
}
