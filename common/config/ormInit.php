<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection(\common\modules\ServiceContainer::config()['db']);


$capsule->setAsGlobal();
$capsule->bootEloquent();