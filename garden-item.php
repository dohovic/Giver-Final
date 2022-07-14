<?php
include "config.php";
include "db.php";

session_start();
$_garden_name = '';
$_address = '';
$_description = '';

if (!empty($_SESSION["user"]) && !empty($_GET['garden_id'])) {
  $_garden_id = $_GET['garden_id'];
  $_user_id = $_SESSION["user"];
  $query = "SELECT * from tbl_203_test_gardens where id = '$_garden_id'";
  $result = mysqli_query($connection, $query);
  if ($result) {
    $row = mysqli_fetch_assoc($result);
    $_garden_name = $row['garden_name'];
    $_address = $row['address'];
    $_description = $row['description'];
  } else die("DB query failed.");
  print_r($row);
  echo "---------<br>";

  $query2 = "SELECT * FROM tbl_203_test_plat where garden_id = '$_garden_id';";
  $result2 = mysqli_query($connection, $query2);
  if ($result2) {
  }
} else {
  die("DB query failed.");
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <script src="includes/script.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="includes/style.css" />
    <link rel="icon" href="favicon.ico?v=2" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand" />
    <title>Giver - GardenItem</title>
</head>

<body class="p-4">
    <header class="grid justify-items-center" id="layout1-header">
      <div class="lg:hidden" id="hamburger">
        <img src="includes/images/icons/icon-mobile-menu.png" alt="" />
      </div>
      <div class="logo">
        <a href="index.php" id="logo"></a>
      </div>
      <nav
        class="self-center justify-self-center justify-items-center hidden lg:block"
      >
        <ul class="flex col-4 gap-6 mx-1">
          <li>
            <a href="#" class="grid gap-3 p-2 w-40 h-12 items-center">
              <img
                src="includes/images/icons/icon-leaves.png"
                alt=""
                class="nav-icon"
              />
              <div>My Gardens</div>
            </a>
          </li>
          <li>
            <a
              href="./create-garden.php"
              class="grid gap-3 p-2 w-40 h-12 items-center"
            >
              <img
                src="includes/images/icons/icon-leavesNew.png"
                alt=""
                class="nav-icon"
              />
              <div>New Garden</div>
            </a>
          </li>
          <li>
            <a href="#" class="grid gap-3 p-2 w-40 h-12 items-center">
              <img
                src="includes/images/icons/icon-event.png"
                alt=""
                class="nav-icon"
              />
              <div>My Events</div>
            </a>
          </li>
          <li>
            <a href="./create-event.php" class="grid gap-3 p-2 w-40 h-12 items-center">
              <img
                src="includes/images/icons/icon-eventNew.png"
                alt=""
                class="nav-icon"
              />
              <div>New Event</div>
            </a>
          </li>
        </ul>
        <form action="#" method="GET" class="mt-8">
          <div class="search-bar">
            <button id="search-icon" type="submit"></button>
            <input type="text" placeholder="Search" class="search" />
          </div>
        </form>
      </nav>
      <div class="top-icons">
        <div class="user-icons">
          <!-- <div class="edit-icons"> -->
            <button class="w-7 mx-1"><img src="includes/images/icons/icon-star.png" alt="" /></button>
            <button class="w-7 mx-1"><img src="includes/images/icons/icon-event.png" alt="" /></button>
            <button class="w-7 mx-1"><img src="includes/images/icons/icon-edit.png" alt="" /></button>
          <!-- </div> -->
          <button><img src="includes/images/icons/bell.png" alt="" /></button>
          <button class="hidden lg:inline">
            <img src="includes/images/icons/user-profile.png" alt="" />
          </button>

        </div>
        <nav class="self-center justify-self-center justify-items-center hidden lg:block">
            <ul class="flex col-4 gap-6">
                <li>
                    <a href="#" class="grid gap-3 p-2 w-40 h-12 items-center">
                        <img src="includes/images/icons/icon-leaves.png" alt="" class="nav-icon" />
                        <div>My Gardens</div>
                    </a>
                </li>
                <li>
                    <a href="./create-garden.php" class="grid gap-3 p-2 w-40 h-12 items-center">
                        <img src="includes/images/icons/icon-leavesNew.png" alt="" class="nav-icon" />
                        <div>New Garden</div>
                    </a>
                </li>
                <li>
                    <a href="#" class="grid gap-3 p-2 w-40 h-12 items-center">
                        <img src="includes/images/icons/icon-event.png" alt="" class="nav-icon" />
                        <div>My Events</div>
                    </a>
                </li>
                <li>
                    <a href="./create-event.php" class="grid gap-3 p-2 w-40 h-12 items-center">
                        <img src="includes/images/icons/icon-eventNew.png" alt="" class="nav-icon" />
                        <div>New Event</div>
                    </a>
                </li>
            </ul>
            <form action="#" method="GET" class="mt-8">
                <div class="search-bar">
                    <button id="search-icon" type="submit"></button>
                    <input type="text" placeholder="Search" class="search" />
                </div>
            </form>
        </nav>
        <div class="edit-icons flex place-items-center place-self-start">
            <div class="flex mr-10">
                <button class="w-7 mx-1"><img src="includes/images/icons/icon-star.png" alt="" /></button>
                <button class="w-7 mx-1"><img src="includes/images/icons/icon-event.png" alt="" /></button>
                <button class="w-7 mx-1"><img src="includes/images/icons/icon-edit.png" alt="" /></button>
            </div>
            <div>
                <button><img src="includes/images/icons/bell.png" alt="" /></button>
                <button class="hidden lg:inline">
                    <img src="includes/images/icons/user-profile.png" alt="" />
                </button>
            </div>
        </div>
    </header>
    <main class="mt-10">
        <div class="main-wrapper">

            <section class="input-container">
                <div class="inputs-form">
                    <div class="input-field" id="disappear-input">
                        <span class="garden-detail" id="garden-name"><?php echo $_garden_name ?></span>
                    </div>
                    <div class="input-field">
                        <span class="garden-detail" id="garden-address"></span>
                    </div>
                    <div class="input-field" id="text-input">
                        <span class="garden-detail" id="garden-description"><?php echo $_description ?>
                        </span>
                    </div>
                </div>
                <div class="garden-image-input">
                    <img src="./includes/images/gardens/lemon_garden.png" alt="" />
                </div>
            </section>
            <section class="category-wrapper">
                <h1 class="text-2xl font-semibold">Our Giving Plants</h1>
                <div class="gardens-container gap-12">
                    <?php
          while ($row2 = mysqli_fetch_assoc($result2)) {
            echo "<section class='plant-item'>";
            echo "<div class='garden-image'>";
            echo "<img src='./includes/images/items/lemon-no-bottom-rounds.png' alt='' />";
            echo "<div class='amount-display'>";
            echo '<span>' . $row2['amount'] . '</span>';
            echo '<span>' . $row2['plant_name'] . '</span>';
            echo '</div></div></section>';
          }
          ?>

                </div>
            </section>
            <section class="social-container">
                <section class="social-comments" id="comments">
                </section>
                <section class="story-container" id="stories">
                </section>
            </section>
        </div>
    </main>
    <script>
    window.onload = () => {
        loadAddress(<?php echo $_address ?>);
        loadComments();
        loadStories();
    };
    </script>
</body>

</html>