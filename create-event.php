<?php
include "config.php";
include "db.php";

session_start();
if (!empty($_SESSION["user"])) {
    $_user_id = $_SESSION["user"];
    $query = "SELECT * from tbl_203_test_gardens where owner_id = '$_user_id'";
    $result1 = mysqli_query($connection, $query);

    if (!empty($_POST)) {
        $_garden_id = $_POST['garden_id'];
        $_date = $_POST['date'];
        $_event_name = $_POST['event_name'];
        $_time = $_POST['time'];
        if ($_POST['description']) {
            $_description = $_POST['description'];
        } else $_description = '';
        $query = "INSERT INTO tbl_203_events_test (`event_name`,`garden_id`, `date`,`time`, `description`) VALUES
('$_event_name','$_garden_id','$_date','$_time','$_description');";

        if (mysqli_query($connection, $query)) {
            echo 'inserted successfully';
        } else echo 'somthing went wrong';

        $_geteventId = "SELECT id from tbl_203_events_test ORDER BY id DESC limit 1";
        $result = mysqli_query($connection, $_geteventId);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
        } else die("DB query failed.");
        $_event_id = $row['id'];

        foreach ($_POST["tasks"] as $key => $n) {
            $query1 = "INSERT INTO tbl_tasks_test (`task_name`, `event_id`) VALUES ('$n', '$_event_id');";
            if (mysqli_query($connection, $query1)) {
            } else echo 'somthing went wrong';
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
    <!-- <link
      href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"
      rel="stylesheet"
    /> -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="includes/style.css" />
    <link rel="icon" href="favicon.ico?v=2" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand" />
    <script src="includes/script.js"></script>
    <title>Giver - CreateEvent</title>
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
            </div>
        </div>
    </header>
    <main>
        <div class="main-wrapper">
            <form action="#" method="POST">
                <section class="input-container" id="unreversal-input">
                    <div class="inputs-form" id="unres-inputs">
                        <div class="input-field" id="line-input">
                            <input type="text" placeholder="Add Event Name" minlength="2" name="event_name" required />
                        </div>
                        <div class="input-field" id="selection-field">
                            <label for="gardens">Pick a Garden</label>
                            <select name="garden_id" required id="gardens">
                                <?php while ($row  = mysqli_fetch_assoc($result1))
                                    echo "<option value=" . $row['id'] . ">" . $row['garden_name'] . "</option>";
                                // echo print_r($row);  

                                ?>
                            </select>
                            <!-- <input type="text" placeholder="Choose a Garden" /> -->
                        </div>
                        <div class="time-inputs">
                            <div class="time-input">
                                <div>Date</div>
                                <input type="date" name="date" class="date" />
                            </div>
                            <div class="time-input">
                                <div>Time</div>
                                <input type="time" step="1" name="time" class="date" value="00:00:00" />
                            </div>
                        </div>
                        <div class="input-field mb-0" id="text-input">
                            <textarea type="text" placeholder="Add Event Description" name="description"></textarea>
                        </div>
                    </div>
                    <!-- <div> -->
                        <!-- <a href="#"> -->
                            <button class="garden-image-input" id="upload-event-img">
                                <!-- <div class="upload-garden-photo"> -->
                                    <img src="includes/images/items/add-event-photo.png" alt="" />
                                <!-- </div> -->
                                <!-- <span>Garden Photo</span> -->
                            </button>
                        <!-- </a> -->
                    <!-- </div> -->
                </section>
                <div class="tasks-wrapper">
                    <div class="tasks-container">
                        <section id="tasks">
                            <div class="new-task">
                                <button type="button" onclick="addTask()" class="flex gap-2 place-items-center">
                                    <img src="includes/images/icons/add-plant-icon-22.jpeg" alt="add-task" />
                                    <p>Add Task</p>
                                </button>
                            </div>
                        </section>
                        <input type="submit" value="submit" id="new-task-submit">
                    </div>
                </div>
            </form>
        </div>
    </main>

</body>

</html>
<?php
//close DB connection
mysqli_close($connection);
?>