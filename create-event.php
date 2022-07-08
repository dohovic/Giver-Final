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
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Quicksand"
    />
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
      <nav
        class="self-center justify-self-center justify-items-center hidden lg:block"
      >
        <ul class="flex col-4 gap-6">
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
            <a href="create-event.php" class="grid gap-3 p-2 w-40 h-12 items-center">
              <img
                src="includes/images/icons/icon-eventNew.png"
                alt=""
                class="nav-icon"
              />
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
        <form action="#" method="GET">
          <section class="input-container">
            <div class="inputs-form">
              <div class="input-field" id="line-input">
                <input type="text" placeholder="Add Event Name" minlength="3" required/>
              </div>
              <div class="input-field" id="selection-field">
                <label for="gardens">Pick a Garden</label>
                <select name="Garden" required></select>
                <!-- <input type="text" placeholder="Choose a Garden" /> -->
              </div>
              <div class="time-inputs">
                <div class="time-input">
                  <div>Date</div>
                  <input type="date" name="date" class="date" />
                </div>
                <div class="time-input">
                  <div>Time</div>
                  <input
                    type="time"
                    step="1"
                    name="time"
                    class="date"
                    value="00:00:00"
                  />
                </div>
              </div>
              <div class="input-field" id="text-input">
                <textarea
                  type="text"
                  placeholder="Add Event Description"
                ></textarea>
              </div>
            </div>
            <div>
              <a href="#">
                <div class="garden-image-input">
                  <div class="upload-garden-photo">
                    <img
                      src="includes/images/icons/add-image-garden-icon.png"
                      alt=""
                    />
                  </div>
                  <span>Garden Photo</span>
                </div>
              </a>
            </div>
          </section>
          <div class="tasks-wrapper">
            <div class="tasks-container">
              <section id="tasks">
                <div class="new-task">
                  <button
                    type="button"
                    onclick="addTask()"
                    class="flex gap-2 place-items-center"
                  >
                    <img
                      src="includes/images/icons/add-plant-icon-22.jpeg"
                      alt="add-task"
                    />
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
    <script></script>
  </body>
</html>
