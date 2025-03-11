<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Logs extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'logs';

    /**
     * The database connection that should be used by the model.
     *
     * @var string
     */

    protected $connection = 'mysql';

    public function users(): BelongsTo
    {
         return $this->belongsTo(Users::class, 'user_id');
    }
}
