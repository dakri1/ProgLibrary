<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;

class BookPolicy
{
    /**
     * Create a new policy instance.
     */
    public function update(User $user, Book $book)
    {
        return $book->user->id === $user->id or $user->hasRole('admin');
    }

    public function destroy(User $user, Book $book)
    {
        return $this->update($user, $book);
    }

    public function __construct()
    {
        //
    }
}
