<?php
namespace ScIm\RecordLabel;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class RecordLabel
 * @package ScIm\RecordLabel
 *
 * @property int $id
 * @property string $name
 * @property string $logo_filename
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class RecordLabel extends Eloquent
{
	protected $table = 'record_labels';
}
