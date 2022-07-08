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
      <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Quicksand"
      />
      <title>Login</title>
  </head>
  <body>
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
                <input type="text" class="r-input-text" placeholder="Enter your email" required>
              </div>
              <div class="login-field" id="login-pass">
                <label for="password" class="r-label-text">Password</label>
                <input type="password" class="r-input-text" placeholder="Enter password" required>
              </div>
              <div class="helpers-container">
                <div class="login-helpers">
                  <label for="remember-me" class="r-label-text">
                    <input type="checkbox" class="mr-1">  
                    Remember me
                  </label>
                  <a href="#" class="r-label-text">Forgot password?</a>
                </div>
                <input type="submit" value="Log In" class="login-button">
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="login-img"></div>
    </div>
  </body>
</html>