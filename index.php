<?php
include "config.php";
include "db.php";

session_start();
echo $_SESSION["user"];
if (empty($_SESSION["user"])) {
    header('Location: ' . 'http://localhost/mac/giver/index.php');
} else {
    $query = "SELECT * from tbl_203_test_gardens order by id DESC";
    $result = mysqli_query($connection, $query);
    if ($result) {
    } else die("DB query failed.");
}
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="includes/style.css" />
    <link rel="icon" href="favicon.ico?v=2" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand" />
    <title>Giver - Home Page</title>
</head>

<body class="p-4">
    <header class="grid justify-items-center" id="layout1-header">
        <div class="lg:hidden">
            <img src="includes/images/icons/icon-mobile-menu.png" alt="" />
        </div>
        <div class="logo">
            <a href="index.php" id="logo"></a>
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
                    <a href="create-event.php" class="grid gap-3 p-2 w-40 h-12 items-center">
                        <img src="includes/images/icons/icon-eventNew.png" alt="" class="nav-icon" />
                        <div>New Event</div>
                    </a>
                </li>
            </ul>
            <form class="mt-8" action="#" method="GET">
                <div class="search-bar">
                    <button id="search-icon" type="submit"></button>
                    <input type="text" placeholder="Search" class="search" />
                </div>
            </form>
        </nav>
        <div class="edit-icons grid place-items-center place-self-start">
            <div>
                <button><img src="includes/images/icons/bell.png" alt="" /></button>
                <button class="hidden lg:inline">
                    <img src="includes/images/icons/user-profile.png" alt="" />
                </button>
            </div>
        </div>
    </header>
    <main class="mt-6">
        <div class="flex">
            <div class="main-wrapper">
                <section class="category-wrapper">
                    <h2 class="text-2xl font-semibold">New On Giver</h2>
                    <div class="gardens-container gap-6">
                        <?php
                        $i = 0;
                        while ($i < 4) {

                            if ($row = mysqli_fetch_assoc($result)) {
                                echo "<a href='http://localhost/mac/giver/garden-item.php?garden_id=" . $row['id'] . "'>";
                                echo "<section class='garden-item'>";
                                echo  "<div class='garden-image'>";
                                echo "<img src='./includes/images/gardens/lemon_garden.png' alt='' />";
                                echo "</div>";
                                echo '<span>' . $row['garden_name'] . '</span>';
                                echo  "<span class='garden-address'>" . $row['address_string'] . "</span>";
                                echo "</section>";
                                echo "</a>";
                            };
                            $i++;
                        }
                        ?>
                    </div>
                </section>
                <section class="category-wrapper">
                    <h1 class="text-2xl font-semibold">Popular Right Now</h1>
                    <div class="gardens-container gap-6">
                        <?php
                        $i = 0;
                        while ($i < 4) {

                            if ($row = mysqli_fetch_assoc($result)) {
                                echo "<a href='http://localhost/mac/giver/garden-item.php?garden_id=" . $row['id'] . "'>";
                                echo "<section class='garden-item'>";
                                echo  "<div class='garden-image'>";
                                echo "<img src='./includes/images/gardens/lemon_garden.png' alt='' />";
                                echo "</div>";
                                echo '<span>' . $row['garden_name'] . '</span>';
                                echo  "<span class='garden-address'>" . $row['address_string'] . "</span>";
                                echo "</section>";
                                echo "</a>";
                            };
                            $i++;
                        }
                        ?>

                    </div>
                </section>

                <section class="category-wrapper">
                    <h2 class="text-2xl font-semibold">Around The Neighborhood</h2>
                    <div class="gardens-container gap-6">
                        <?php
                        $i = 0;
                        while ($i < 4) {

                            if ($row = mysqli_fetch_assoc($result)) {
                                echo "<a href='http://localhost/mac/giver/garden-item.php?garden_id=" . $row['id'] . "'>";
                                echo "<section class='garden-item'>";
                                echo  "<div class='garden-image'>";
                                echo "<img src='./includes/images/gardens/lemon_garden.png' alt='' />";
                                echo "</div>";
                                echo '<span>' . $row['garden_name'] . '</span>';
                                echo  "<span class='garden-address'>" . $row['address_string'] . "</span>";
                                echo "</section>";
                                echo "</a>";
                            };
                            $i++;
                        }
                        ?>
                    </div>
                </section>
            </div>
        </div>
    </main>
</body>

</html>