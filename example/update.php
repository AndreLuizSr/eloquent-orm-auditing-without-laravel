<?php
	
    require __DIR__ . '/../config.php';

    use Model\User;

    $user = User::find(1);
    $user->username = 'User 1 Mod';
    $user->name = 'User One Mod';
    $user->save();