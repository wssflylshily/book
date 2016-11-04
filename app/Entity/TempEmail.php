<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class TempEmail extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'temp_email';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
