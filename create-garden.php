<?php
include "config.php";
include "db.php";

session_start();
$_status = "";
$_garden_name = "Add Garden Name";
$_description = "Add Garden's Description";
if (!empty($_GET['garden_id'])) {
    $_garden_id = $_GET['garden_id'];
    $query2 = "SELECT * FROM tbl_203_plant where garden_id = '$_garden_id'";
    $result2 = mysqli_query($connection, $query2);
    if ($result2) {
    } else {
        die("DB query failed..");
    }


    $query1 = "SELECT * from tbl_203_gardens where id = '$_garden_id'";
    $result1 = mysqli_query($connection, $query1);
    if ($result1) {
        $row1 = mysqli_fetch_assoc($result1);
        $_garden_name = $row1['garden_name'];
        $_address_id = $row1['address'];
        $_address_string = $row1['address_string'];
        $_description = $row1['description'];
        $_img = $row1['img'];
    } else die("DB query failed.");
}
if (!empty($_POST)) {

    if (!empty($_POST)) {
        if ($_POST['status'] == 'delete') {
            $deleteQuery = "DELETE FROM tbl_203_gardens WHERE id = '$_garden_id'";
            if (mysqli_query($connection, $deleteQuery)) {
            } else echo 'somthing went wrong';
            header('Location: ' . 'http://se.shenkar.ac.il/students/2021-2022/web1/dev_203/');
        } else {
            $_address = $_POST['address'];
            $_address_id = $_address[0];
            $_address_string = substr($_address, 2);
            $_owner_id = $_SESSION["user"];
            $_gardenName = $_POST['gardenName'];
            $_img = $_POST['img'];
            if ($_POST['description']) {
                $_description = $_POST['description'];
            } else $_description = '';
            $query = "UPDATE tbl_203_gardens set `address` = '$_address_id', `owner_id` = '$_owner_id',`garden_name` = '$_gardenName',`description` = '$_description', `address_string`='$_address_string' ,`img` = '$_img' WHERE (`id` = '$_garden_id');";

            if (mysqli_query($connection, $query)) {
            } else echo 'somthing went wrong';
            header('Location: ' . 'http://se.shenkar.ac.il/students/2021-2022/web1/dev_203/garden-item.php?garden_id=' . $garden_id . '');
        }
    }
} else if (!empty($_SESSION["user"])) {

    if (!empty($_POST)) {
        $_address = $_POST['address'];
        $_address_id = $_address[0];
        $_address_string = substr($_address, 2);
        $_owner_id = $_SESSION["user"];
        $_gardenName = $_POST['gardenName'];
        $_img = $_POST['img'];
        if ($_POST['description']) {
            $_description = $_POST['description'];
        } else $_description = '';
        $query = "INSERT INTO tbl_203_gardens (`address`, `owner_id`, `garden_name`, `description`, `address_string`, `img`) VALUES
        ('$_address_id','$_owner_id', '$_gardenName','$_description', '$_address_string', '$_img');";

        if (mysqli_query($connection, $query)) {
            echo 'inserted successfully';
        } else echo 'somthing went wrong';

        $getGardenId = "SELECT id from tbl_203_gardens where garden_name = '$_gardenName'";
        $result = mysqli_query($connection, $getGardenId);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
        } else die("DB query failed.");
        $garden_id = $row['id'];
        $plant_name = $_POST["plant_name"];
        $amount = $_POST["amount"];
        if (!empty($_POST["plant_name"])) {
            foreach ($_POST["plant_name"] as $key => $n) {
                $query1 = "INSERT INTO tbl_203_plant (`plant_name`, `garden_id`, `plant_img`, `amount`) VALUES ('$n', '$garden_id',
        'fsafasfafasdfadasdsa', '$amount[$key]');";
                if (mysqli_query($connection, $query1)) {
                } else echo 'somthing went wrong';
            }
        }
        header('Location: ' . 'http://se.shenkar.ac.il/students/2021-2022/web1/dev_203/garden-item.php?garden_id=' . $garden_id . '');
    }
} else {
    header('Location: ' . 'http://se.shenkar.ac.il/students/2021-2022/web1/dev_203/login.php');
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="includes/style.css" />
    <link rel="icon" href="favicon.ico?v=2" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand" />
    <script src="./includes/script.js"></script>
    <script>
    window.onload = () => loadAddresses;
    </script>
    <title>Giver - CreateGarden</title>
</head>

<body class="p-4">
    <header class="flex justify-between mb-5" id="layout1-header">
        <div class="lg:hidden" id="hamburger">
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
        </nav>
        <div class="top-icons">
            <div class="user-icons">
                <form action="#" method="POST">
                    <button type="submit" class="w-7 mx-1"><img src="includes/images/icons/icon-trash.png"
                            alt="" /></button>
                    <input type="hidden" name="status" value="delete" />
                    <input type="hidden" name="garden_id" value=<?php echo $_garden_id ?> />
                </form>
                <button>
                    <img src="includes/images/icons/bell.png" alt="" />
                </button>
                <button class="hidden lg:inline">
                    <img src="includes/images/icons/user-profile.png" alt="" />
                </button>
            </div>
        </div>
    </header>
    <main>
        <div class="main-wrapper">
            <form action="#" method="POST">
                <section class="input-container" id="unreversal-input">
                    <div class="inputs-form" id="unres-inputs">
                        <div class="input-field" id="line-input">
                            <input type="text" placeholder="<?php echo $_garden_name ?>" minlength="3" name="gardenName"
                                required />
                        </div>
                        <input type="hidden" name="status" value=<?php echo $_status ?> />
                        <div class="input-field" id="selection-field">
                            <label>Select Address
                                <select type="text" placeholder="Enter Garden's Address" id="addresses" name="address"
                                    required>
                                </select>
                            </label>
                        </div>
                        <div class="input-field mb-0" id="text-input">
                            <textarea type="text" placeholder="<?php echo $_description ?>"
                                name="description"></textarea>
                        </div>
                    </div>
                    <div class="garden-image-input" id="upload-garden-img">
                        <img src="./includes/images/items/add-garden-photo.png" alt="" />
                        <input type="text" name="img">
                    </div>
                </section>
                <section class="category-wrapper gap-4" id="plants-category">
                    <h1 class="text-2xl font-semibold mt-3">Grow For The Win</h1>
                    <div class="gardens-container" id="plant-container">
                        <button class="plant-item" type="button" onclick="addPlant()">
                            <div class=" garden-image-edit">
                                <div class="upload-garden-photo">
                                    <img src="./includes/images/items/add-new-plant.png" alt="" />
                                </div>
                            </div>
                        </button>
                        <?php
                        while ($row2 = mysqli_fetch_assoc($result2)) {
                            echo "<section class='plant-item'>";
                            echo "<div class='garden-image-edit'>";
                            echo "<button class='upload-garden-photo' type='button'>";
                            echo "<img src='./includes/images/items/lemon.png' alt='' />";
                            echo "</button>";
                            echo "<button class='upload-garden-x' type='button' onclick='removePlant(this)'>";
                            echo "<img src='./includes/images/icons/circle-x.png' alt='' />";
                            echo "</button>";
                            echo "</div>";
                            echo "<input type='text' min='0' placeholder='Add Plant Name' name='plant_name[] value=" . $row2['plant_name'] . "' required></input>";
                            echo "<input type='hidden' name='owner_id' value=" . $_SESSION['user'] . "</input>";
                            echo "<div class=' plant-amount-editor'><button class='editor-button' type='button' onclick='decreasePlant(this)'>-</button>";
                            echo "<div class='plant-amount'>";
                            echo "<input type='number' required placeholder='0' name='amount[]' value=" . $row2['amount'] . "></input>";
                            echo "</div>";
                            echo "<button class='editor-button' type='button' onclick='increasePlant(this)'>+</button></div>";
                            echo "</section>";
                        } ?>
                    </div>
                    <input type="submit" value="submit">
                </section>
            </form>
        </div>
    </main>
    <script>
    window.onload = () => loadAddresses(<?php echo $_address_id ?>);
    </script>
</body>

</html>
<?php
//close DB connection
mysqli_close($connection);
?>