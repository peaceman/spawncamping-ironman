<?php
namespace ScIm\Song;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;
use ScIm\Artist\Artist;
use ScIm\Genre\Genre;
use ScIm\RecordLabel\RecordLabel;

/**
 * Class Song
 * @package ScIm\Song
 *
 * @property int $id
 * @property int $artist_id
 * @property int $genre_id
 * @property int $record_label_id
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

	public function artist()
	{
		return $this->belongsTo(Artist::class);
	}

	public function genre()
	{
		return $this->belongsTo(Genre::class);
	}

	public function recordLabel()
	{
		return $this->belongsTo(RecordLabel::class);
	}
} 
