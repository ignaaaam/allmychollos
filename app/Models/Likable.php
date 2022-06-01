<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

trait Likable
{

    public function scopeWithLikes(Builder $query){
        $query->leftJoinSub(
            'SELECT discount_id, Sum(liked) likes, Sum(!liked) dislikes FROM likes GROUP BY discount_id',
            'likes',
            'likes.discount_id',
            'discounts.id',
        );
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function isDislikedBy(User $user)
    {
        return (bool)$user->likes
            ->where('discount_id', $this->id)
            ->where('liked', false)
            ->count();
    }

    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate(
            [
                'user_id' => $user ? $user->id : auth()->id(),
            ],
            [
                'liked' => $liked,
            ]);
    }

    public function dislike($user = null)
    {
        return $this->like($user, false);
    }

    public function isLikedBy(User $user)
    {
        return (bool)$user->likes
            ->where('discount_id', $this->id)
            ->where('liked', true)
            ->count();
    }
}
