<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\User;

class Review extends Model
{
    /**
     * REVIEW ATTRIBUTES
     * $this->attributes['id'] - int - contains the item primary key (id)
     * $this->attributes['comment'] - text - contains the comment content
     * $this->attributes['rating'] - int - contains the movie rating selected by the user
     * $this->attributes['movie_id'] - int - contains the referenced movie id
     * $this->attributes['user_id'] - int - contains the referenced user id
     * $this->attributes['created_at'] - timestamp - contains the item creation date
     * $this->attributes['updated_at'] - timestamp - contains the item update date
     * $this->movie - Movie - contains the associated Movie
     * $this->user - User - contains the associated User
    */

    public static function validate(Request $request) : void
    {
        $request->validate([
            "comment" => "required",
            "rating" => "required|numeric|gt:0",
            "movie_id" => "required|exists:movies,id",
            "user_id" => "required|exists:users,id",
        ]);
    }

    public function getId() : int
    {
        return $this->attributes['id'];
    }

    public function getComment() : string
    {
        return $this->attributes['comment'];
    }

    public function setComment(string $comment) : void
    {
        $this->attributes['comment'] = $comment;
    }

    public function getRating() : float
    {
        return $this->attributes['rating'];
    }

    public function setRating(float $rating) : void
    {
        $this->attributes['rating'] = $rating;
    }

    public function getMovieId() : int
    {
        return $this->attributes['movie_id'];
    }

    public function setMovieId(int $movieId) : void
    {
        $this->attributes['movie_id'] = $movieId;
    }

    public function getUserId() : int
    {
        return $this->attributes['user_id'];
    }

    public function setUserId(int $userId) : void
    {
        $this->attributes['user_id'] = $userId;
    }

    public function getCreatedAt() : string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt() : string
    {
        return $this->attributes['updated_at'];
    }

    public function movie() : BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }

    public function getMovie() : Movie
    {
        return $this->movie;
    }

    public function setMovie(Movie $movie) : void
    {
        $this->movie = $movie;
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUser() : User
    {
        return $this->user;
    }

    public function setUser(User $user) : void
    {
        $this->user = $user;
    }
}
