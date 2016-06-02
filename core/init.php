<?php

    session_start();

    $GLOBALS['config'] = array(

        'mysql' => array(
            'host' => '127.0.0.1', // Change to your db location
            'username' => 'root', // Change to your user
            'password' => '',
            'db' => 'ooplr' // Change to your database
        ),
        'remember' => array(
            'cookie_name' => 'hash',
            'cookie_expiry' => 604800
        ),
        'session' => array(
            'session_name' => 'user',
            'token_name' => 'token'
        ),
        'version' => array(
            'version' => '0.0.1',
        )
    );


    // Autoload Classes
    spl_autoload_register(function($class){
        require_once 'classes/' . $class . '.php';
    });

    // Require non Object Functions
    require_once 'functions/sanitize.php';


    // Check if cookie with user id exist if true Log In
    if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))){
        $hash = Cookie::get(Config::get('remember/cookie_name'));
        $hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));

        if($hashCheck->count()){
            $user = new User($hashCheck->first()->user_id);
            $user->login();
        }
    }