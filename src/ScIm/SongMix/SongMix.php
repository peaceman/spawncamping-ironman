<?php
namespace ScIm\SongMix;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class SongMix
 * @package ScIm\SongMix
 *
 * @property int $id
 * @property int $song_id
 * @property string $title
 * @property int $length_in_seconds
 * @property string $filename
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class SongMix extends Eloquent
{
	protected $table = 'song_mixes';
}
