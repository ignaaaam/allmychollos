<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Discount
 *
 * @property int $id
 * @property int $user_id
 * @property int $category_id
 * @property string $title
 * @property string $slug
 * @property string|null $thumbnail
 * @property string $body
 * @property string $link
 * @property string $original_price
 * @property string $discounted_price
 * @property int $percentage
 * @property int $premium
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $author
 * @property-read \App\Models\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @method static \Database\Factories\DiscountFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount filter(array $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Discount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Discount query()
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereDiscountedPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereOriginalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount wherePercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount wherePremium($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereUserId($value)
 * @mixin \Eloquent
 */
class Discount extends Model
{
    use HasFactory;

    protected $with = ['category','author'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                        $query->where('title', 'like', '%' . $search . '%')
                            ->orWhere('body', 'like', '%' . $search . '%')
                        )
        );
        $query->when($filters['category'] ?? false, fn($query, $category) =>
            $query->whereHas('category', fn ($query) =>
                $query->where('name', $category)
            )
        );

        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn ($query) =>
                $query->where('username', $author)
            )
        );
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
