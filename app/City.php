<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class City extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'citys';

}
