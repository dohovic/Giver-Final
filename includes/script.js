var tasks = [];

function addTask(e) {
  console.log(e);

  let container = document.getElementById("tasks");
  let div = document.createElement("div");
  let input = document.createElement("input");
  let img = document.createElement("img");
  div.setAttribute("class", "flex gap-2");
  
  img.setAttribute("src", "includes/images/icons/remove-plant-icon-22.jpeg");

  input.setAttribute("type", "text");
  input.setAttribute("name", "tasks[]");
  input.setAttribute("class", "task");
  input.setAttribute("placeholder", "Insert Task Name");
  div.appendChild(img)
  div.appendChild(input);
  container.appendChild(div);
}
