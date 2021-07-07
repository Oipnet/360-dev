<?php

namespace App\Favorite;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Model relationship for favories system
 */
trait HasFavorites
{

	/**
	 * @return string[]
	 */
	protected function getKeys(): array
	{
		return ['user_id', 'post_id'];
	}

    /**
     * @return string the model (ex: post_id => App\Model\Post)
     */
	private function relatedPivotKeyToModel(): string
    {
        $pivotKey = $this->getKeys()[1];
        return 'App\\Model\\' . ucfirst(str_replace('_id','', $pivotKey));
    }

	/**
	 * @return BelongsToMany
	 */
	public function favorites(): BelongsToMany
	{
	    list($foreignPivotKey, $relatedPivotKey) = $this->getKeys();
		return $this
			->belongsToMany($this->relatedPivotKeyToModel(), 'favorites', $foreignPivotKey, $relatedPivotKey)
			->withTimeStamps();
	}

}