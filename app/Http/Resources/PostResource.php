<?php

namespace App\Http\Resources;

use App\Favorite;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $favorite = Favorite::query()->where('post_id', $this->id)->where('user_id', Auth::id())->get();
        $isFavorite = false;
        if($favorite->count() > 0){
            $isFavorite = true;
        }

        return [
            'id'=> $this->id,
            'author'=> $this->author["name"],
            'title'=>$this->title,
            'image' =>"/storage/" . $this->image,
            'total_comments' => $this->total_comments,
            'total_ratings' => $this->total_ratings,
            'total_views' => $this->total_views,
            'avg_rating' => $this->avg_rating,
            'is_favorite'=> $isFavorite,
            'favorite_count' =>$favorite->count(),
            'current_user' => $this->currentUserId,
            'updated_at'=> $this-> updated_at->getTimestamp(),
            'created_at'=> $this-> created_at->getTimestamp()
        ];
        //return parent::toArray($request);
    }
}
