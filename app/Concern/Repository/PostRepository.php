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
     * @param int $numberpage The number of articles per page.
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public static function paginatePosts(int $numberpage = 15)
    {
        return self::with('category')
            ->with('user')
            ->where('online', true)
            ->paginate($numberpage);
    }
}