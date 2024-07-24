<?php

namespace App\Observers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostObserver
{
    public function __construct(private readonly Request $request)
    {
        //
    }

    /**
     * Handle the BlogPost "created" event.
     */
    public function created(BlogPost $blogPost): void
    {
        //
    }

    /**
     * Handle the BlogPost "saving" event.
     */
    public function creating(BlogPost $blogPost): void
    {
        $blogPost->owner_id = auth()->id();
    }

    /**
     * Handle the BlogPost "saved" event.
     */
    public function saved(BlogPost $blogPost): void
    {
        $blogPost->updateCategories($this->request);
    }

    /**
     * Handle the BlogPost "updated" event.
     */
    public function updated(BlogPost $blogPost): void
    {
        //
    }

    /**
     * Handle the BlogPost "deleting" event.
     */
    public function deleting(BlogPost $blogPost): void
    {
        $blogPost->categories()->detach();
    }

    /**
     * Handle the BlogPost "deleted" event.
     */
    public function deleted(BlogPost $blogPost): void
    {
        //
    }

    /**
     * Handle the BlogPost "restored" event.
     */
    public function restored(BlogPost $blogPost): void
    {
        //
    }

    /**
     * Handle the BlogPost "force deleted" event.
     */
    public function forceDeleted(BlogPost $blogPost): void
    {
        //
    }
}
