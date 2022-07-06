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
      <div class="flex justify-center items-center w-1/2 h-full">
        <div class="flex justify-center items-center w-3/4 h-full">
          <div class="flex flex-col justify-center w-full h-full">
            <h3 class="text-2xl">Login to Giver</h3>
            <p>Come smell the flowers</p>
            <form action="#" method="post" class="rounded mt-8">
              <div class="flex flex-col p-4 justify-between border-t border-r border-l border-[#F3F0F0] h-1/3">
                <label for="username" class="text-sm">Username</label>
                <input type="text" class="flex border-b-2" placeholder="Your email" required>
              </div>
              <div class="flex flex-col p-4 justify-between border border-[#F3F0F0] h-1/3">
                <label for="password" class="text-sm">Password</label>
                <input type="password" class="flex border-b-2" placeholder="Enter password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" minlength="8" maxlength="28" required>
              </div>
              <div class="flex flex-col justify-between p-4 h-32">
                <div class="flex flex-row flex-wrap justify-between">
                  <label for="remember-me" class="flex flex-row items-center">
                    <input type="checkbox" class="mr-1">  
                    <span class="r-sm-text" class="text-sm">Remember me</span>
                  </label>
                  <span><a href="#" class="r-sm-text" class="text-sm">Forgot password?</a></span>
                </div>
                <input type="submit" value="Log In" class="mt-4 rounded-md bg-[#45A1BD] w-full h-12">
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="bg-cover bg-center bg-right-top bg-[url('assetts/login5.png')] w-1/2 h-full"></div>
    </div>
  </body>
</html>