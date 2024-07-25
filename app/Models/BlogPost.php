<?php

namespace App\Models;

use App\Observers\BlogPostObserver;
use App\Traits\HasOwner;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

#[ObservedBy([BlogPostObserver::class])]
class BlogPost extends Model
{
    use HasFactory;
    use HasOwner;

    protected $fillable = [
        'title',
        'content',
        'owner_id'
    ];

    //------------------------------------------------------------------------------------------------------------------
    // Relationships
    //------------------------------------------------------------------------------------------------------------------

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    //------------------------------------------------------------------------------------------------------------------
    // Custom functions
    //------------------------------------------------------------------------------------------------------------------

    public function updateCategories(Request $request): void
    {
        $categoryIds = [];

        if ($newCategories = $request->input('new_category')) {
            $newCategories = explode(';', $newCategories);
            $newCategories = array_map(fn($item) => trim($item) ,$newCategories);

            foreach ($newCategories as $name) {
                $category = Category::firstOrCreate([
                    'name' => $name
                ]);

                $categoryIds[] = $category->id;
            }
        }

        $existingCategories = $request->input('categories') ?? [];
        if (count($existingCategories) > 0) {
            $existingCategories = array_map(fn($item) => (int) $item ,$existingCategories);
        }

        $categoryIds = array_merge($categoryIds, $existingCategories);
        $categoryIds = array_unique($categoryIds);

        $this->categories()->sync($categoryIds);
    }

    public function getOrderedPaginatedComments(): LengthAwarePaginator
    {
        return $this->comments()
            ->orderBy('created_at', 'desc')
            ->paginate(5);
    }
}
