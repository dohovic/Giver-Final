<?php
include "config.php";
include "db.php";

session_start();
echo $_SESSION["user"] . "startsession<br>";
if (!empty($_SESSION["user"])) {
    echo $_SESSION["user"] . "<br>";
    // Read the JSON file
    $json = file_get_contents('data.json');
    // Decode the JSON file
    $json_data = json_decode($json);

    print_r($json_data->addresses[0]->id);
    echo "<br>";
    foreach ($json_data->addresses as $street) {
        print_r($street->street . " " . $street->number);
        echo "<br>";
    }
    if (!empty($_POST)) {
        $_address = $_POST['address'];
        $_owner_id = $_SESSION["user"];
        $_gardenName = $_POST['gardenName'];
        if ($_POST['description']) {
            $_description = $_POST['description'];
        } else $_description = '';
        $query = "INSERT INTO tbl_203_test_gardens (`address`, `owner_id`, `garden_name`, `description`) VALUES
('$_address','$_owner_id', '$_gardenName','$_description');";

        if (mysqli_query($connection, $query)) {
            echo 'inserted successfully';
        } else echo 'somthing went wrong';

        $getGardenId = "SELECT id from tbl_203_test_gardens where garden_name = '$_gardenName'";
        $result = mysqli_query($connection, $getGardenId);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
        } else die("DB query failed.");
        echo "<br>";
        echo $_gardenName . "<br>";
        echo 'result: ' . $row['id'] . "<br>";
        $garden_id = $row['id'];
        $plant_name = $_POST["plant_name"];
        $amount = $_POST["amount"];
        foreach ($_POST["plant_name"] as $key => $n) {
            $query1 = "INSERT INTO tbl_203_test_plat (`plant_name`, `garden_id`, `plant_img`, `amount`) VALUES ('$n', '$garden_id',
'fsafasfafasdfadasdsa', '$amount[$key]');";
            if (mysqli_query($connection, $query1)) {
                echo 'plant ' . $n . ' inserted successfully <br>';
            } else echo 'somthing went wrong';
            echo "plant item: " . $n . " Amount: " . $amount[$key] . "<br>";
        }
    }
} else {
    header('Location: ' . 'http://localhost/Giver/Giver-Final/login.php');
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
    <script src="includes/script.js"></script>
    <title>Giver - CreateGarden</title>
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
        </nav>
        <div class="edit-icons grid place-items-center">
            <div>
                <button><img src="includes/images/icons/bell.png" alt="" /></button>
                <button class="hidden lg:inline">
                    <img src="includes/images/icons/user-profile.png" alt="" />
                </button>
                <a class="" href="logout.php">
                    logout
                </a>
            </div>
        </div>
    </header>
    <main>
        <div class="main-wrapper">
            <form action="#" method="POST">
                <section class="input-container">
                    <div class="inputs-form">
                        <div class="input-field" id="line-input">
                            <input type="text" placeholder="Add Garden Name" minlength="3" name="gardenName" required />
                        </div>
                        <div class="input-field" id="selection-field">
                            <label>Select Address
                                <select type="text" placeholder="Enter Garden's Address" id="addresses" name="address" required>
                                </select>
                            </label>
                        </div>
                        <div class="input-field" id="text-input">
                            <textarea type="text" placeholder="Add Garden's Description" name="description"></textarea>
                        </div>
                    </div>
                    <div>
                        <a href=" #">
                            <div class="garden-image-input">
                                <div class="upload-garden-photo">
                                    <img src="includes/images/icons/add-image-garden-icon.png" alt="" />
                                </div>
                                <span>Garden Photo</span>
                            </div>
                        </a>
                    </div>
                </section>
                <section class="category-wrapper gap-4" id="plants-category">
                    <h1 class="text-2xl font-semibold mt-3">Grow For The Win</h1>
                    <div class="gardens-container" id="plant-container">
                        <!-- <section class="plant-item">
                            <div class="garden-image-edit">
                                <div class="upload-garden-photo">
                                    <img src="./includes/images/icons/add-photo-garden.png" alt="" />
                                </div>
                            </div>
                            <input type="text" placeholder="Add Plant Name" name="plant_name[]" required></input>
                            <input type="hidden" name="owner_id" value="<?php echo $_SESSION["user"] ?>"></input>
                            <div class=" plant-amount-editor">
                                <button class="editor-button" type="button" onclick="decreasePlant(this)">-</button>
                                <div class="plant-amount">
                                    <input type="number" required placeholder="0" name="amount[]"></input>
                                </div>
                                <button class="editor-button" type="button" onclick="increasePlant(this)">+</button>
                            </div>
                        </section> -->


                        <button class="plant-item" type="button" onclick="addPlant()">
                            <div class=" garden-image-edit">
                                <div class="upload-garden-photo">
                                    <img src="./includes/images/items/add-new-plant.png" alt="" />
                                </div>
                            </div>
                        </button>
                    </div>
                </section>
                <button class="editor-button" type="submit">submit</button>



            </form>
        </div>
    </main>
    <script>
        window.onload = () => loadAddresses();
    </script>
</body>

</html>
<?php
//close DB connection
mysqli_close($connection);
?>