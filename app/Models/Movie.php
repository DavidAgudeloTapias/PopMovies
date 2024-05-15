<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Movie extends Model
{
    /**
     * MOVIE ATTRIBUTES
     * $this->attributes['id'] - int - contains the movie primary key (id)
     * $this->attributes['title'] - string - contains the movie title
     * $this->attributes['director'] - string - contains the movie director
     * $this->attributes['genre'] - string - contains the movie genre
     * $this->attributes['price'] - int - contains the movie price
     * $this->attributes['stock'] - int - contains the movie stock
     * $this->attributes['poster'] - string - contains the movie poster
     * $this->attributes['created_at'] - timestamp - contains the movie creation date
     * $this->attributes['updated_at'] - timestamp - contains the movie update date
     * $this->items - Item[] - contains the associated items
    */

    public static function validate(Request $request) : void
    {
        $request->validate([
            "title" => "required|max:255",
            "director" => "required",
            "genre" => "required|max:255",
            "price" => "required|numeric|gt:0",
            "stock" => "required|numeric|gt:0",
            "poster" => "image",
            "plot" => "required",
        ]);
    }

    public static function sumPricesByQuantities(Collection $movies, array $moviesInSession) : int
    {
        $total = 0;
        foreach ($movies as $movie) {
            $total = $total + ($movie->getPrice()*$moviesInSession[$movie->getId()]);
        }

        return $total;
    }

    public function getId() : int
    {
        return $this->attributes['id'];
    }

    public function getTitle() : string
    {
        return $this->attributes['title'];
    }

    public function setTitle(string $title) : void
    {
        $this->attributes['title'] = $title;
    }

    public function getDirector() : string
    {
        return $this->attributes['director'];
    }

    public function setDirector(string $director) : void
    {
        $this->attributes['director'] = $director;
    }

    public function getGenre() : string
    {
        return $this->attributes['genre'];
    }

    public function setGenre(string $genre) : void
    {
        $this->attributes['genre'] = $genre;
    }

    public function getPrice() : int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price) : void
    {
        $this->attributes['price'] = $price;
    }

    public function getStock() : int
    {
        return $this->attributes['stock'];
    }

    public function setStock(int $stock) : void
    {
        $this->attributes['stock'] = $stock;
    }

    public function getPoster() : string
    {
        return $this->attributes['poster'];
    }

    public function setPoster(string $poster) : void
    {
        $this->attributes['poster'] = $poster;
    }

    public function getPlot() : string | null
    {
        return $this->attributes['plot'];
    }

    public function setPlot(string $plot) : void
    {
        $this->attributes['plot'] = $plot;
    }

    public function getRating() : float
    {
        return $this->attributes['rating'];
    }

    public function setRating(float $rating) : void
    {
        $this->attributes['rating'] = $rating;
    }

    public function getCreatedAt() : string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt() : string
    {
        return $this->attributes['updated_at'];
    }

    public function items() : HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function getItems() : Collection
    {
        return $this->items;
    }

    public function setItems(Collection $items) : void
    {
        $this->items = $items;
    }

    public function reviews() : HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function getReviews() : Collection
    {
        return $this->reviews;
    }

    public function setReviews(Collection $reviews) : void
    {
        $this->reviews = $reviews;
    }
}
