var tasks = [];
let obj;
const jsonAddresses = fetch("data.json")
  .then((response) => response.json())
  .then((json) => {
    obj = json;
  });
function loadGardens(e) {
  let Gardens = document.getElementById("gardens");
  console.log(e);
  console.log(123);
}
function loadAddresses() {
  let Addresses = document.getElementById("addresses");
  console.log(obj.addresses);
  obj.addresses.map((data) => {
    let select = document.createElement("option");
    select.setAttribute("value", data.id);
    select.innerHTML = data.street + ", " + data.number;
    Addresses.appendChild(select);
    console.log(data.id);
    console.log(select);
  });
}

function addPlant() {
  console.log(1);
  const plants = document.getElementById("plant-container");
  const section = document.createElement("section");
  section.setAttribute("class", "plant-item");
  section.innerHTML =
    "<div class='garden-image-edit'><button class='upload-garden-photo'><img src='./includes/images/icons/add-photo-garden.png' alt='' /></button><button class='upload-garden-x'><img src='./includes/images/icons/circle-x.png' alt='' /></button></div><input type='text' min='0' placeholder='Add Plant Name' name='plant_name[]' required></input><input type='hidden' name='owner_id' value='<?php echo $_SESSION['user'] ?></input><div class=' plant-amount-editor'><button class='editor-button' type='button' onclick='decreasePlant(this)'>-</button><div class='plant-amount'><input type='number' required placeholder='0' name='amount[]'></input></div><button class='editor-button' type='button' onclick='increasePlant(this)'>+</button></div>";
  plants.insertBefore(section, plants.lastChild);
}
function test(e) {
  console.log(e);
}
function decreasePlant(e) {
  console.log(e);
  const amount = e.nextElementSibling.children[0];
  const number = Number(amount.value);

  console.log(number);
  if (number > 0) {
    amount.value = number - 1;
  }
}

function increasePlant(e) {
  const amount = e.previousElementSibling.children[0];
  const number = Number(amount.value);

  amount.value = number + 1;
}

function addTask() {
  const container = document.getElementById("tasks");
  const div = document.createElement("div");
  const input = document.createElement("input");
  const img = document.createElement("img");
  div.setAttribute("class", "flex gap-2");

  img.setAttribute("src", "includes/images/icons/remove-plant-icon-22.jpeg");

  input.setAttribute("type", "text");
  input.setAttribute("name", "tasks[]");
  input.setAttribute("class", "task");
  input.setAttribute("placeholder", "Insert Task Name");
  div.appendChild(img);
  div.appendChild(input);
  container.appendChild(div);
}
