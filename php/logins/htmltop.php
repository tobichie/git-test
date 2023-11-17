<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>

    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <form class="col s8 push-s2" action="<?php if (isset($inRegister)){
            echo "registry.php";
        } else {
            echo "logins.php";
        } ?>" method="post">
            <h2 class="center"><?php if (isset($inRegister)){

                }  ?>Login</h2>
            <div class="row">
                <div class="input-field col s12">
                    <label for="username" ">Username</label>
                    <input name="username" value="<?php
                    if (isset($username)) {
                        echo htmlspecialchars($username);
                    }?> "type="text"/>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input name="password" value="<?php
                    if (isset($password)) {
                        if (isset($error)) {
                            echo $error;
                        } else {
                            echo htmlspecialchars($password);
                        }
                    }
                    ?>" type="<?php // if isset error the type is echo = "";
                    if (isset($error)){
                        echo "text";
                    }
                    else {
                        echo "password";
                        $what = "";
                    }
                    ?>"/>
                    <label for="password"><?php if (isset($what)){
                        echo "Password";
                        } else {
                        $what = "";
                        echo $what;
                        }
                        ?></label>
                </div>
            </div>
            <div class="row">
                <div class="center input-field col s12">
                    <?php // if isset($inRegister) name = register
                    if (!isset($inRegister)){
                        echo "<input type='submit' value='submit' name='submit' class='btn waves-effect waves-light center'/>";
                    }if (isset($inRegister)){
                        echo "<input type='submit' value='Register' name='register' class='btn waves-effect waves-light center'/>";
                    }
                    // next if isset $_POST["register"] then take the password and username and insert them into the database
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <p class="center"><?php if (isset($inRegister)) {
                        echo "";
                        } else {
                        echo "Don't have an account? <button type='submit' name='register'><strong><a href='registry.php'>Register</a></strong></button></p>";
                        }?>

                </div>
            </div>
        </form>
    </div>
</div>

<?php
// if username and password match a row in (SELECT username and password with the values of (user inputted username and password) from the table,
// if nothing matches then nothing happens and ask to register as new user, else get referred to the next site.

//next

// When clicking on register ask which kind of account to register
// If admin, make user input a password
// Else a regular account
// if password == false no referral to admin account register site
// if password == true get referred
?>
