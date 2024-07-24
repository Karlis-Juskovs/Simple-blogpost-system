<?php
namespace App\Traits;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasOwner {

    public function owner(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'owner_id');
    }

    public function isOwner(): bool
    {
        return auth()->id() === $this->owner_id;
    }
}
