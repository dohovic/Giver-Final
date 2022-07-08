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
                <input type="text" placeholder="Add Garden Name" minlength="3" required/>
              </div>
              <div class="input-field" id="selection-field">
                <input type="text" placeholder="Enter Garden's Address" minlength="3" required/>
              </div>
              <div class="input-field" id="text-input">
                <textarea type="text" placeholder="Add Garden's Description"></textarea>
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
          <section class="category-wrapper gap-4">
            <h1 class="text-2xl font-semibold mt-3">Grow For The Win</h1>
            <div class="gardens-container">
              <section class="plant-item">
                <div class="garden-image-edit">
                  <div class="upload-garden-photo">
                    <img src="./includes/images/items/lemon.png" alt="" />
                  </div>
                  <a href="#"
                    ><img
                      src="./includes/images/icons/add-image-invert.png"
                      alt=""
                  /></a>
                </div>
                <span>Lemon Trees</span>
                <div class="plant-amount-editor">
                  <button class="editor-button">-</button>
                  <div class="plant-amount">
                    <span>4</span>
                  </div>
                  <button class="editor-button">+</button>
                </div>
              </section>

              <section class="plant-item">
                <div class="garden-image-edit">
                  <div class="upload-garden-photo">
                    <img src="./includes/images/items/basil.png" alt="" />
                  </div>
                  <a href="#"
                    ><img
                      src="./includes/images/icons/add-image-invert.png"
                      alt=""
                  /></a>
                </div>
                <span>Basil</span>
                <div class="plant-amount-editor">
                  <button class="editor-button">-</button>
                  <div class="plant-amount">
                    <span>60</span>
                  </div>
                  <button class="editor-button">+</button>
                </div>
              </section>
              <!-- test -->
              <section class="plant-item">
                <div class="garden-image-edit">
                  <div class="upload-garden-photo">
                    <img
                      src="./includes/images/icons/add-photo-garden.png"
                      alt=""
                    />
                  </div>
                </div>
                <span>Add Plant Name</span>
                <div class="plant-amount-editor">
                  <button class="editor-button">-</button>
                  <div class="plant-amount">
                    <span>60</span>
                  </div>
                  <button class="editor-button">+</button>
                </div>
              </section>

              <section class="plant-item">
                <div class="garden-image-edit">
                  <div class="upload-garden-photo">
                    <img
                      src="./includes/images/items/add-new-plant.png"
                      alt=""
                    />
                  </div>
                </div>
              </section>
            </div>
            <input type="submit" value="submit">
          </section>
          <input type="submit" class="submit-button" value="Submit">

        </form>
      </div>
    </main>
  </body>
</html>
