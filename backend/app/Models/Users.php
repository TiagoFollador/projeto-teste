<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Users extends Model
{


    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'users';

    /**
     * The database connection that should be used by the model.
     *
     * @var string
     */

    protected $connection = 'mysql';

    public function logs(): HasMany
    {
        return $this->HasMany(Logs::class, 'user_id', 'id');
    }
}
