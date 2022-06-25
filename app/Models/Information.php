<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;


class Information extends Model
{

    protected $connection = 'mongodb';

    protected $collection = 'information';

}
