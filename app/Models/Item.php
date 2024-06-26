<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class Item extends Model
{
    /**
     * ITEM ATTRIBUTES
     * $this->attributes['id'] - int - contains the item primary key (id)
     * $this->attributes['quantity'] - int - contains the item quantity
     * $this->attributes['price'] - int - contains the item price
     * $this->attributes['order_id'] - int - contains the referenced order id
     * $this->attributes['movie_id'] - int - contains the referenced movie id
     * $this->attributes['created_at'] - timestamp - contains the item creation date
     * $this->attributes['updated_at'] - timestamp - contains the item update date
     * $this->order - Order - contains the associated Order
     * $this->movie - Movie - contains the associated Movie
    */

    public static function validate(Request $request) : void
    {
        $request->validate([
            "price" => "required|numeric|gt:0",
            "quantity" => "required|numeric|gt:0",
            "movie_id" => "required|exists:movies,id",
            "order_id" => "required|exists:orders,id",
        ]);
    }

    public function getId() : int
    {
        return $this->attributes['id'];
    }

    public function getQuantity() : int
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity(int $quantity) : void
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function getPrice() : int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price) : void
    {
        $this->attributes['price'] = $price;
    }

    public function getOrderId() : int
    {
        return $this->attributes['order_id'];
    }

    public function setOrderId(int $orderId) : void
    {
        $this->attributes['order_id'] = $orderId;
    }

    public function getMovieId() : int
    {
        return $this->attributes['movie_id'];
    }

    public function setMovieId(int $movieId) : void
    {
        $this->attributes['movie_id'] = $movieId;
    }

    public function getCreatedAt() : string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt() : string
    {
        return $this->attributes['updated_at'];
    }

    public function order() : BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function getOrder() : Order
    {
        return $this->order;
    }

    public function setOrder(Order $order) : void
    {
        $this->order = $order;
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
}
