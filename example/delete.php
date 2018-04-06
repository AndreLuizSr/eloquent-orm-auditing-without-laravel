<?php
	
    require __DIR__ . '/../config.php';

    use Model\User;

    $user = User::find(1);
    $user->delete();