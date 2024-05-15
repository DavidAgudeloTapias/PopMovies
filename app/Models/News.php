<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class News extends Model
{
    use HasFactory;

    /**
     * NEWS ATTRIBUTES
     * $this->attributes['id'] - int - contains the news primary key (id)
     * $this->attributes['title'] - string - contains the news title
     * $this->attributes['content'] - string - contains the news content
     * $this->attributes['source'] - string - contains the news source
     * $this->attributes['image'] - string - contains the news image
     * $this->attributes['created_at'] - timestamp - contains the movie creation date
     * $this->attributes['updated_at'] - timestamp - contains the movie update date
     */

    public static function validate(Request $request) : void
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'source' => 'required',
            'image' => 'required',
        ]);
    }

    public function getId() : int
    {
        return $this->attributes['id'];
    }

    public function setId(int $id) : void
    {
        $this->attributes['id'] = $id;
    }

    public function getTitle() : string
    {
        return $this->attributes['title'];
    }

    public function setTitle(string $title): void
    {
        $this->attributes['title'] = $title;
    }

    public function getContent() : string
    {
        return $this->attributes['content'];
    }

    public function setContent(string $content): void
    {
        $this->attributes['content'] = $content;
    }

    public function getSource() : string
    {
        return $this->attributes['source'];
    }

    public function setSource(string $source): void
    {
        $this->attributes['source'] = $source;
    }

    public function getImage() : string
    {
        return $this->attributes['image'];
    }

    public function setImage(string $image) : void
    {
        $this->attributes['image'] = $image;
    }

    public function getCreatedAt() : string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt() : string
    {
        return $this->attributes['updated_at'];
    }
}
