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

//   $query2 = "SELECT * FROM tbl_203_test_plat where garden_id = '$_garden_id';";
//   $result2 = mysqli_query($connection, $query2);
//   if ($result2) {
//   }
// } else {
//   die("DB query failed.");
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <script src="includes/script.js"></script>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link
        href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"
        rel="stylesheet"
      />
    <link rel="stylesheet" href="includes/style.css" />
    <link rel="icon" href="favicon.ico?v=2" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand" />
    <title>Giver - GardenItem</title>
</head>

<body class="p-4">
    <header class="flex justify-between" id="layout1-header">
        <div class="lg:hidden" id="hamburger">
            <img src="includes/images/icons/icon-mobile-menu.png" alt="" />
        </div>
        <div class="logo">
            <a href="index.php" id="garden-logo"></a>
        </div>
        <nav class="self-center justify-self-center justify-items-center hidden lg:block">
            <ul class="flex col-4 gap-6 mx-1">
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
        <div class="top-icons">
            <div class="user-icons">
                <!-- <div class="edit-icons"> -->
                <button class="w-7 mx-1"><img src="includes/images/icons/icon-star.png" alt="" /></button>
                <button class="w-7 mx-1"><img src="includes/images/icons/icon-event.png" alt="" /></button>
                <a class="w-7 mx-1 mr-5"
                    href="/create-garden.php?garden_id=<?php echo $row['id'] ?>"><img
                        src="includes/images/icons/icon-edit.png" alt="" /></a>
                <!-- </div> -->
                <button>
                    <img src="includes/images/icons/bell.png" alt="" />
                </button>
                <button class="hidden lg:inline">
                    <img src="includes/images/icons/user-profile.png" alt="" />
                </button>
            </div>
        </div>
    </header>
    <main class="mt-10">
        <div class="main-wrapper">
            <div class="input-field" id="hidden-input">
                <span class="garden-detail" id="garden-name">Lemons garden</span>
            </div>
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
            <!-- <section class="social-container">
                <section class="social-comments" id="comments">
                </section>
                <section class="story-container" id="stories">
                </section>
            </section> -->
            <section class="social-container">
          <section class="social-comments">
            <div class="comment-container">
              <div class="social-profile">
                <button>
                  <img
                    src="./includes/images/profiles/david.png"
                    alt=""
                    id="comment-profile"
                  />
                </button>
                <span>David</span>
              </div>
              <div class="comments-wrapper">
                <div class="comment">
                  <p>
                    I made lemonade yesterday from the garden on the old
                    basketball court. Great Stu...&nbsp
                  </p>
                  <span>Read more</span>
                </div>
                <div class="comment">
                  <span>3h</span>
                  <span>9 Likes</span>
                  <span>Reply</span>
                  <span>View 14 Replies</span>
                </div>
              </div>
            </div>

            <div class="comment-container">
              <div class="social-profile">
                <button>
                  <img
                    src="./includes/images/profiles/nof.png"
                    alt=""
                    id="comment-profile"
                  />
                </button>
                <span>Nof</span>
              </div>
              <div class="comments-wrapper">
                <div class="comment">
                  <p>I can’t believe I have freshly pickeed lemons!</p>
                </div>
                <div class="comment">
                  <span>4h</span>
                  <span>6 Likes</span>
                  <span>Reply</span>
                  <span>View 9 Replies</span>
                </div>
              </div>
            </div>

            <div class="comment-container">
              <div class="social-profile">
                <button>
                  <img
                    src="./includes/images/profiles/yaron.png"
                    alt=""
                    id="comment-profile"
                  />
                </button>
                <span>Yaron</span>
              </div>
              <div class="comments-wrapper">
                <div class="comment">
                  <p>
                    The cherry tomatoes planting day was great. I can’t wait for
                    the next one.
                  </p>
                </div>
                <div class="comment">
                  <span>1d</span>
                  <span>16 Likes</span>
                  <span>Reply</span>
                  <span>View 12 Replies</span>
                </div>
              </div>
            </div>
          </section>

          <section class="story-container">
            <a href="#">
              <div class="story-desktop">
                <div class="story-profile-container">
                  <button>
                    <img
                      src="./includes/images/stories/eyal-profile.png"
                      alt=""
                      id="story-profile"
                    />
                  </button>
                  <span>Eyal</span>
                </div>
                <div class="story-pic-container">
                  <img
                    src="./includes/images/stories/eyal-story.png"
                    alt=""
                    class="story-pic"
                  />
                </div>
              </div>
            </a>

            <a href="#">
              <div class="story-desktop">
                <div class="story-profile-container">
                  <button>
                    <img
                      src="./includes/images/stories/aliza-profile.png"
                      alt=""
                      id="story-profile"
                    />
                  </button>
                  <span>Aliza</span>
                </div>
                <div class="story-pic-container">
                  <img
                    src="./includes/images/stories/aliza-story.png"
                    alt=""
                    class="story-pic"
                  />
                </div>
              </div>
            </a>

            <a href="#">
              <div class="story-desktop">
                <div class="story-profile-container">
                  <button>
                    <img
                      src="./includes/images/stories/lihi-profile.png"
                      alt=""
                      id="story-profile"
                    />
                  </button>
                  <span>Lihi</span>
                </div>
                <div class="story-pic-container">
                  <img
                    src="./includes/images/stories/lihi-story.png"
                    alt=""
                    class="story-pic"
                  />
                </div>
              </div>
            </a>

            <a href="#">
              <div class="story-desktop">
                <div class="story-profile-container">
                  <button>
                    <img
                      src="./includes/images/stories/roni-profile.png"
                      alt=""
                      id="story-profile"
                    />
                  </button>
                  <span>Roni</span>
                </div>
                <div class="story-pic-container">
                  <img
                    src="./includes/images/stories/roni-story.png"
                    alt=""
                    class="story-pic"
                  />
                </div>
              </div>
            </a>

            <a href="#">
              <div class="story-desktop">
                <div class="story-profile-container">
                  <button>
                    <img
                      src="./includes/images/stories/or-profile.png"
                      alt=""
                      id="story-profile"
                    />
                  </button>
                  <span>Or</span>
                </div>
                <div class="story-pic-container">
                  <img
                    src="./includes/images/stories/or-story.png"
                    alt=""
                    class="story-pic"
                  />
                </div>
              </div>
            </a>

            <a href="#">
              <div class="story-desktop">
                <div class="story-profile-container">
                  <button>
                    <img
                      src="./includes/images/stories/sami-profile.png"
                      alt=""
                      id="story-profile"
                    />
                  </button>
                  <span>Sami</span>
                </div>
                <div class="story-pic-container">
                  <img
                    src="./includes/images/stories/sami-story.png"
                    alt=""
                    class="story-pic"
                  />
                </div>
              </div>
            </a>

            <a href="#">
              <div class="story-desktop">
                <div class="story-profile-container">
                  <button>
                    <img
                      src="./includes/images/stories/david-profile.png"
                      alt=""
                      id="story-profile"
                    />
                  </button>
                  <span>David</span>
                </div>
                <div class="story-pic-container">
                  <img
                    src="./includes/images/stories/david-story.png"
                    alt=""
                    class="story-pic"
                  />
                </div>
              </div>
            </a>

            <a href="#">
              <div class="story-desktop">
                <div class="story-profile-container">
                  <button>
                    <img
                      src="./includes/images/stories/yitzhak-profile.png"
                      alt=""
                      id="story-profile"
                    />
                  </button>
                  <span>Yitzhak</span>
                </div>
                <div class="story-pic-container">
                  <img
                    src="./includes/images/stories/yitzhak-story.png"
                    alt=""
                    class="story-pic"
                  />
                </div>
              </div>
            </a>

            <a href="#">
              <div class="story-desktop">
                <div class="story-profile-container">
                  <button>
                    <img
                      src="./includes/images/stories/alma-profile.png"
                      alt=""
                      id="story-profile"
                    />
                  </button>
                  <span>Alma</span>
                </div>
                <div class="story-pic-container">
                  <img
                    src="./includes/images/stories/alma-story.png"
                    alt=""
                    class="story-pic"
                  />
                </div>
              </div>
            </a>
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