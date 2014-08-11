<?php
namespace ScIm\Genre;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Genre
 * @package ScIm\Genre
 *
 * @property int $id
 * @property string $name
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Genre extends Eloquent
{
	protected $table = 'genres';
}
