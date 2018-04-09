<?php

    session_start();
    date_default_timezone_set('America/Bahia');

	require __DIR__ . '/vendor/autoload.php';
	
	# Connection database configuration
	$capsule = new \Illuminate\Database\Capsule\Manager;

	$capsule->addConnection([
	    'driver'    => "mysql",
	    'host'      => "localhost",
	    'database'  => "eloquent_orm",
	    'username'  => "root",
	    'password'  => "root",
	    'charset'   => 'utf8',
	    'collation' => 'utf8_unicode_ci'
	]);

	# Configuration to capture event in eloquent ORM
	$capsule->setEventDispatcher(
		new \Illuminate\Events\Dispatcher(new \Illuminate\Container\Container)
	);

	$capsule->setAsGlobal();
	$capsule->bootEloquent();


