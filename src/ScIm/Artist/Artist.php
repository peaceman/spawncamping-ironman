<?php
namespace ScIm\Artist;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;
use ScIm\Song\Song;

/**
 * Class Artist
 * @package ScIm\Artist
 *
 * @property int $id
 * @property string $name
 *
 * @property Song[] $songs
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Artist extends Eloquent
{
	protected $table = 'artists';

	public function songs()
	{
		return $this->hasMany(Song::class);
	}
}
