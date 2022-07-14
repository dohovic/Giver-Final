var tasks = [];

var obj;
const jsonAddresses = fetch("includes/data.json")
  .then((response) => response.json())
  .then((json) => {
    obj = json;
  });

function loadAddresses(e) {
  let Addresses = document.getElementById("addresses");
  obj.addresses.map((data) => {
    let select = document.createElement("option");
    const addressString = data.street + ", " + data.number;
    select.setAttribute("value", data.id + "," + addressString);
    select.innerHTML = addressString;
    if (e == data.id) {
      console.log("match");
      select.selected = true;
    }
    Addresses.appendChild(select);
  });
}

function addPlant() {
  const plants = document.getElementById("plant-container");
  const section = document.createElement("section");
  section.setAttribute("class", "plant-item");
  section.innerHTML =
    "<div class='garden-image-edit'><button class='upload-garden-photo' type='button'><img src='./includes/images/icons/add-photo-garden.png' alt='' /></button><button class='upload-garden-x' type='button' onclick='removePlant(this)'><img src='./includes/images/icons/circle-x.png' alt='' /></button></div><input type='text' min='0' placeholder='Add Plant Name' name='plant_name[]' required></input><input type='hidden' name='owner_id' value='<?php echo $_SESSION['user'] ?></input><div class=' plant-amount-editor'><button class='editor-button' type='button' onclick='decreasePlant(this)'>-</button><div class='plant-amount'><input type='number' required placeholder='0' name='amount[]'></input></div><button class='editor-button' type='button' onclick='increasePlant(this)'>+</button></div>";
  plants.insertBefore(section, plants.lastChild);
}

function decreasePlant(e) {
  const amount = e.nextElementSibling.children[0];
  const number = Number(amount.value);

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
  const button = document.createElement("button");
  button.setAttribute("type", "button");
  button.setAttribute("onclick", "removeTask(this)");
  div.setAttribute("class", "flex gap-2");

  img.setAttribute("src", "includes/images/icons/remove-plant-icon-22.jpeg");
  button.appendChild(img);

  input.setAttribute("type", "text");
  input.setAttribute("name", "tasks[]");
  input.setAttribute("class", "task");
  input.setAttribute("placeholder", "Insert Task Name");
  div.appendChild(button);
  div.appendChild(input);
  container.appendChild(div);
}

function removePlant(element) {
  element.parentElement.parentElement.remove();
}

function removeTask(e) {
  e.parentElement.remove();
}

function loadAddress(e) {
  if (e > 0) {
    let item = document.getElementById("garden-address");
    const stringAddress = obj.addresses.filter((data) => data.id == e);
    item.innerHTML = stringAddress[0].street + ", " + stringAddress[0].number;
  }
}

function loadComments() {
  const comments = obj.social[0].comments;
  const commnetsItem = document.getElementById("comments");
  comments.map((i) => {
    let commentContainer = document.createElement("div");
    commentContainer.setAttribute("class", "comment-container");
    document.createElement("div");
    let socialProfile = document.createElement("div");
    socialProfile.setAttribute("class", "social-profile");
    let btn = document.createElement("button");
    let span = document.createElement("span");
    let image = document.createElement("img");

    image.setAttribute("src", i.img);
    image.setAttribute("class", "comment-profile");
    btn.setAttribute("type", "button");
    btn.appendChild(image);
    span.innerHTML = i.name;

    socialProfile.appendChild(btn);
    socialProfile.appendChild(span);

    let commentsWrapper = document.createElement("div");
    commentsWrapper.setAttribute("class", "comments-wrapper");
    let comment1 = document.createElement("div");
    comment1.setAttribute("class", "comment");

    let p = document.createElement("p");
    p.innerHTML = i.comment;
    let readMore = document.createElement("span");
    readMore.innerHTML = "Read More";

    comment1.appendChild(p);
    comment1.appendChild(readMore);

    let comment2 = document.createElement("div");
    comment2.setAttribute("class", "comment");
    let dataSpan = document.createElement("span");
    dataSpan.innerHTML = "3h";
    let dataSpan1 = document.createElement("span");
    dataSpan1.innerHTML = i.likes + "Likes";
    let dataSpan2 = document.createElement("span");
    dataSpan2.innerHTML = "Reply";
    let dataSpan3 = document.createElement("span");
    dataSpan3.innerHTML = "View " + i.replies + " Replies";

    comment2.appendChild(dataSpan);
    comment2.appendChild(dataSpan1);
    comment2.appendChild(dataSpan2);
    comment2.appendChild(dataSpan3);

    commentsWrapper.appendChild(comment1);
    commentsWrapper.appendChild(comment2);

    commentContainer.appendChild(socialProfile);
    commentContainer.appendChild(commentsWrapper);

    commnetsItem.appendChild(commentContainer);
  });
}
function loadStories() {
  const stories = obj.social[0].stories;
  const storyItem = document.getElementById("stories");
  stories.map((i) => {
    const storyComponent = document.createElement("a");
    storyComponent.setAttribute("href", "#");
    let storyDesktop = document.createElement("div");
    storyDesktop.setAttribute("class", "story-desktop");
    let storyProfile = document.createElement("div");
    storyProfile.setAttribute("class", "story-profile-container");
    let btn = document.createElement("button");
    btn.setAttribute("type", "button");
    let image = document.createElement("img");

    image.setAttribute("class", "story-profile");
    image.setAttribute("alt", "");
    image.setAttribute("src", i.prfile_img);

    btn.appendChild(image);
    let span = document.createElement("span");
    span.innerHTML = i.name;
    btn.appendChild(image);
    storyProfile.appendChild(btn);
    storyProfile.appendChild(span);

    let storyPic = document.createElement("div");
    storyPic.setAttribute("class", "story-pic-container");
    let image1 = document.createElement("img");

    image1.setAttribute("class", "story-pic");
    image1.setAttribute("alt", "");
    image1.setAttribute("src", i.story_img);

    storyPic.appendChild(image1);
    storyDesktop.appendChild(storyProfile);
    storyDesktop.appendChild(storyPic);
    storyComponent.appendChild(storyDesktop);

    storyItem.appendChild(storyComponent);
  });
}
