<?php

    require_once 'core/init.php';

    if(Input::exists()){
        if(Token::check(Input::get('token'))){
            $validate = new Validate;
            $validation = $validate->check($_POST, array(
                'username' => array(
                    'required' => true,
                    'min' => 2,
                    'max' => 20,
                    'unique' => 'users'
                ),
                'password' => array(
                    'required' => true,
                    'min' => 6
                ),
                'password_again' => array(
                    'required' => true,
                    'matches' => 'password'
                ),
                'name' => array(
                    'required' => true,
                    'min' => 2,
                    'max' => 50
                ),
                'email' => array(
                    'required' => true,
                    'email' => true,
                    'unique' => 'users',
                    'min' => 5,
                    'max' => 64
                )
            ));
            if($validate->passed()){
                $user = new User();

                $salt = Hash::salt(32);

                try {

                    $user->create(array(
                        'username' => Input::get('username'),
                        'password' => Hash::make(Input::get('password'), $salt),
                        'salt' => $salt,
                        'name' => Input::get('name'),
                        'joined' => date('Y-m-d H:i:s'),
                        'group' => 1,
                        'email' => Input::get('email')
                    ));

                    Session::flash('home', 'You have been registerd and can now login');
                    Redirect::to('index.php');

                } catch(Exception $e){
                    echo "Something went wrong";
                }
            }else{
                foreach($validate->errors() as $error){
                    echo $error, "<br>";
                }
            }
        }
    }

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
    </head>
    <body>

        <form action="" method="post">
            <div class="field">
                <label for="username">Gebruikersnaam</label>
                <input type="text" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>" autocomplete="off">
            </div>
            <div class="field">
                <label for="password">Wachtwoord</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="field">
                <label for="password_again">Herhaal Wachtwoord</label>
                <input type="password" name="password_again" id="password_again">
            </div>
            <div class="field">
                <label for="name">Volledige naam</label>
                <input type="text" name="name" id="name" value="<?php echo escape(Input::get('name')); ?>">
            </div>
            <div class="field">
                <label for="email">Email</label>
                <input type="text" name="email" id="email">
            </div>
            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
            <input type="submit" value="Register">
        </form>

    </body>
</html>
