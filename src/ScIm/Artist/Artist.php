<?php
namespace ScIm\Artist;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Artist
 * @package ScIm\Artist
 *
 * @property int $id
 * @property string $name
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Artist extends Eloquent
{
	protected $table = 'artists';
}
