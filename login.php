<?php
//create a mySQL DB connection:
include "config.php";
include "db.php";


if (!empty($_POST["loginMail"])) {
    $query  = "SELECT * FROM tbl_203_users WHERE email='" . $_POST['loginMail'] . "' and password='" . $_POST['loginPass'] . "'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);

    if (is_array($row)) {
        session_start();
        $_SESSION["user"] = $row['id'];
        echo $_SESSION["user"];
        header('Location: ' . 'http://se.shenkar.ac.il/students/2021-2022/web1/dev_203/');
    } else {
        $message = "Failed to log in. Bad email or password.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link
        href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"
        rel="stylesheet"
      /> -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="includes/style.css?v=<?php echo time(); ?>" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand" />
    <title>Login</title>
</head>

<body>
    <main>
        <div class="flex w-screen h-screen">
            <div class="login-wrapper">
                <div class="login-container">
                    <div class="login-content">
                        <div class="logo">
                            <a href="#" id="logo"></a>
                        </div>
                        <!-- <h3>Log in to Giver</h3> -->
                        <p>Come smell the flowers</p>
                        <form action="#" method="post" class="login-form">
                            <div class="login-field" id="login-username">
                                <label for="username" class="r-label-text">Username</label>
                                <input type="text" class="r-input-text" placeholder="Enter your email" name="loginMail"
                                    required>
                            </div>
                            <div class="login-field" id="login-pass">
                                <label for="password" class="r-label-text">Password</label>
                                <input type="password" class="r-input-text" placeholder="Enter password"
                                    name="loginPass" required>
                            </div>
                            <div class="helpers-container">
                                <div class="login-helpers">
                                    <label for="remember-me" class="r-label-text">
                                        <input type="checkbox" class="mr-1">
                                        Remember me
                                    </label>
                                    <a href="#" class="r-label-text">Forgot password?</a>
                                </div>
                                <input type="submit" value="Log In">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="login-img"></div>
        </div>
    </main>
</body>

</html>
<?php
//close DB connection
mysqli_close($connection);
?>