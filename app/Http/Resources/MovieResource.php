<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->getId(),
            'title' => $this->getTitle(),
            'price' => $this->getPrice(),
            'stock' => $this->getStock(),
            'plot' => $this->getPlot(),
            'rating' => $this->getRating(),
        ];
    }
}
