<?php
namespace ScIm\Song;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Song
 * @package ScIm\Song
 *
 * @property int $id
 * @property int $artist_id
 * @property int $genre_id
 * @property Carbon $promotion_start
 * @property Carbon $promotion_end
 * @property string $cover_filename
 * @property string $title
 * @property string $description
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Song extends Eloquent
{
	protected $table = 'songs';
} 
