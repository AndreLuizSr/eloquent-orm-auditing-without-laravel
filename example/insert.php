<?php
	
    require __DIR__ . '/../config.php';

    use Model\User;

    $user = new User;
    $user->username = 'User 2';
    $user->name = 'User Two';
    $user->email = 'user2@example.com';
    $user->save();