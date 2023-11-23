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
        ::placeholder {
            color: #2BBBAD;
        }
        button {

        }
    </style>
</head>
<body>
<div class="container input-field">
    <div class="row">
        <form class="col s8 push-s2" action="<?php if (isset($inRegister)) {
            echo "registry.php";
        } else {
            echo "logins.php";
        } ?>" method="post">
            <h2 class="center"><?php if (isset($inRegister)) {
                    echo "Register";
                } else {
                    echo "Login";
                } ?></h2>
            <div class="row">
                <div class="input-field col s12">
                    <input name="username" value="<?php
                    if (isset($username)) {
                        echo htmlspecialchars($username);
                    } elseif (isset($userExists)){
                        echo $userExists;
                    } ?>" placeholder = "Username" type="text"/>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input name="password" value="<?php
                    if (isset($luhpass)){
                        echo "<div class='center'>$luhpass</div>";
                    }
                    if (isset($password)) {
                        $pis = "Password is incorrect";
                        // echo $pis;
                       if (isset($cantlogin)) {
                           echo $cantlogin;
                           echo htmlspecialchars($password);
                       }

                    } // else {echo "Error";}
                    ?>" placeholder = "Password"
                           type="<?php // if isset error the type is echo = "";
                    if (isset($cantlogin)) {
                        echo "text";
                    } else {
                        echo "password";
                        $what = "";
                    }
                    ?>"/>
                </div>
            </div>
            <div class="row">
                <div class="center input-field col s12">
                    <?php // if isset($inRegister) name = register
                    if (!isset($inRegister)) {
                        echo "<input type='submit' value='submit' name='submit' class='btn waves-effect waves-light center'/>";
                    }
                    if (isset($inRegister)) {
                        echo "<input type='submit' value='Register' name='register' class='btn waves-effect waves-light center'/>";
                    }
                    // next if isset $_POST["register"] then take the password and username and insert them into the database
                    ?>
                </div>
                <?php if (isset($success)) {
                    echo "<div class='center input-field col s12'> <button type='submit' name='great'><a href='logins.php'>Login</a></button> </div>";
                    if (isset($_POST["great"])) {
                        header("location: logins.php");
                    }
                } ?>
            </div>
            <div class="row">
                <div class="col s12">
                    <p class="center"><?php if (isset($inRegister)) {
                            echo "";
                        } else {
                        function randPass(){
                            $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                            $pass = array(); //remember to declare $pass as an array
                            $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
                            for ($i = 0; $i < 8; $i++) {
                                $n = rand(0, $alphaLength);
                                $pass[] = $alphabet[$n];
                            }
                            echo implode($pass); //turn the array into a string
                        }

                            echo "Don't have an account? <button type='submit' name='register'><strong><a href='registry.php'>Register</a></strong></button></p>  ";
                            echo "<button class='center middle' name='genpass'>   Generate Password    </button>";
                            if (isset($_POST["genpass"])){
                                echo "<p class='center blue container'>" . randPass() . "</p>";
                            }
                        }
                        ?>

                </div>
                <div class='center input-field col s12'><?php if (isset($usernametaken)) {
                        echo "Username taken";
                    }
                    ?></div>
            </div>
        </form>
    </div>
</div>

<?php
// if username and password match a row in (SELECT username and password with the values of (user inputted username and password) from the table,
// if nothing matches then nothing happens and ask to register as new user, else get referred to the next site.

//next

// When clicking on register ask which kind of account to register
// If admin, make user input a admin password
// extrea program wo eine Variable ein passwort ist und sich alle 200 ticks ändert
// Else a regular account
// if password == false no referral to admin account register site
// if password == true get referred
?>
