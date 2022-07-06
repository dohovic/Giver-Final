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
        <!-- <form action="#" method="GET">
          <div class="search-bar">
            <button id="search-icon" type="submit"></button>
            <input type="text" placeholder="Search" class="search" />
          </div>
        </form> -->
        <section class="category-wrapper">
          <h1 class="text-2xl font-semibold">Popular Right Now</h1>
          <div class="gardens-container gap-6">
            <a href="#">
              <section class="garden-item">
                <div class="garden-image">
                  <img
                    src="./includes/images/gardens/lemon_garden.png"
                    alt=""
                  />
                </div>
                <span>Lemons garden</span>
                <span class="garden-address">Jabotinsky st. 16</span>
              </section>
            </a>

            <a href="#">
              <section class="garden-item">
                <div class="garden-image">
                  <img
                    src="./includes/images/gardens/herbs-garden.png"
                    alt=""
                  />
                </div>
                <span>Herbs garden</span>
                <span class="garden-address">Hamatmid st. 16 </span>
              </section>
            </a>

            <a href="#">
              <section class="garden-item">
                <div class="garden-image">
                  <img
                    src="./includes/images/gardens/citrus-garden.png"
                    alt=""
                  />
                </div>
                <span>Citrus stop</span>
                <span class="garden-address">Assaf st. 13</span>
              </section>
            </a>

            <a href="#">
              <section class="garden-item">
                <div class="garden-image">
                  <img
                    src="./includes/images/gardens/happy-veggies-garden.png"
                    alt=""
                  />
                </div>
                <span>Happy veggies</span>
                <span class="garden-address">Yokhanan st. 5</span>
              </section>
            </a>
          </div>
        </section>
        <section class="category-wrapper">
          <h2 class="text-2xl font-semibold">New On Giver</h2>
          <div class="gardens-container gap-6">
            <a href="#">
              <section class="garden-item">
                <div class="garden-image">
                  <img src="./includes/images/gardens/mint-garden.png" alt="" />
                </div>
                <span>Mint garden</span>
                <span class="garden-address">Rokach st. 34</span>
              </section>
            </a>

            <a href="#">
              <section class="garden-item">
                <div class="garden-image">
                  <img
                    src="./includes/images/gardens/lemon_garden.png"
                    alt=""
                  />
                </div>
                <span>Wild pansy</span>
                <span class="garden-address">Shkedia st. 31</span>
              </section>
            </a>

            <a href="#">
              <section class="garden-item">
                <div class="garden-image">
                  <img
                    src="./includes/images/gardens/leafy-wonders-garden.png"
                    alt=""
                  />
                </div>
                <span>Leafy wonders</span>
                <span class="garden-address">Herzel st. 75</span>
              </section>
            </a>

            <a href="#">
              <section class="garden-item">
                <div class="garden-image">
                  <img
                    src="./includes/images/gardens/communal-spot-garden.png"
                    alt=""
                  />
                </div>
                <span>The communal spot</span>
                <span class="garden-address">Ami st. 4</span>
              </section>
            </a>
          </div>
        </section>

        <section class="category-wrapper">  
          <h2 class="text-2xl font-semibold">Around The Neighborhood</h2>
          <div class="gardens-container gap-6">
            <a href="#">
              <section class="garden-item">
                <div class="garden-image">
                  <img
                    src="./includes/images/gardens/adventure-garden.png"
                    alt=""
                  />
                </div>
                <span>Adventure garden</span>
                <span class="garden-address">Rokach st. 34 </span>
              </section>
            </a>

            <a href="#">
              <section class="garden-item">
                <div class="garden-image">
                  <img
                    src="./includes/images/gardens/lemon_garden.png"
                    alt=""
                  />
                </div>
                <span>Lemons garden</span>
                <span class="garden-address">Jabotinsy st. 16</span>
              </section>
            </a>

            <a href="#">
              <section class="garden-item">
                <div class="garden-image">
                  <img
                    src="./includes/images/gardens/urban-tomatoes-garden.png"
                    alt=""
                  />
                </div>
                <span>Urban tomatoes</span>
                <span class="garden-address">Pnei Hagiv’a st. 29</span>
              </section>
            </a>

            <a href="#">
              <section class="garden-item">
                <div class="garden-image">
                  <img
                    src="./includes/images/gardens/wild-pansy-garden.png"
                    alt=""
                  />
                </div>
                <span>Wild pansy</span>
                <span class="garden-address">Shkedia st. 31</span>
              </section>
            </a>
          </div>
        </section>
      </div>
    </div>
    </main>
  </body>
</html>
