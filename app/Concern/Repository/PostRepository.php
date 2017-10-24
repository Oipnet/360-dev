<?php
namespace App\Concern\Repository;

/**
 * Trait PostRepository
 *
 * The trait will contain all interactions with the database.
 */
trait PostRepository
{

    /**
     * Recover only online articles and pages.
     *
     * @return mixed
     */
    public static function onlinePosts()
    {
        return self::with('category', 'user')
            ->where('online', true);
    }
}
