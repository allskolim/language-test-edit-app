<?php

session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: main.php");
    exit;
}

$username = $password = "";
$username_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))):
        $username_err = "Please enter username.";
    else:
        $username = trim($_POST["username"]);
    endif;

    if(empty(trim($_POST["password"]))):
        $password_err = "Please enter your password.";
    else:
        $password = trim($_POST["password"]);
    endif;

    // Validation
    if(empty($username_err) && empty($password_err)):
        if ($password === "agrafka" and $username === "admin"):
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username; 
            header("location: main.php");
        else:
            $password_err = "Niepoprawne dane logowania, spróbuj ponownie.";
        endif;
    endif;    
    }
?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="site.webmanifest">
        <link rel="apple-touch-icon" href="icon.png">
        <link rel="stylesheet" href="vendor/bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">

		<script src="vendor/jquery/dist/jquery.js"></script>
        <script src="js/index.js"></script>

    </head>
    <body class="bg-dark">
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="application/x-www-form-urlencoded" class="container login-box__container">
        <div class="row justify-content-center mb-4">
            <div class="col-auto">
                <img src="img/logo.png" alt=""></div>
        </div>
        <div class="row justify-content-center text-light">
        <div class="col-4">
          <div class="form-group">
            <label for="test-user">Nazwa użytkownika:</label>
            <input type="text" class="form-control" id="test-user" placeholder="User name" name="username">
          </div>
          <div class="form-group">
            <label for="test-pass">Hasło:</label>
            <input type="password" class="form-control" id="test-pass" placeholder="Password" name="password">
          </div>
          <button type="submit" class="btn btn-info float-right mt-2">Zaloguj</button>
          </div>
        </div>
        <?php if(!empty($password_err)): ?><div class="alert alert-warning mt-4"><?= $password_err ?></div><?php endif; ?>
        </form>
    </body>
</html>