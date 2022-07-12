var modal = document.getElementById("infoModal");
var btn = document.getElementById("infoButton");
var span = document.getElementById("closeButton");
var info = document.getElementById("groupInfo");
var usersInfo = document.getElementById("usersInfo");

var extraInteractions = document.getElementById("modal-extra-interactions");


window.onload = () => {
  window.scrollTo(0, document.body.scrollHeight);
}

btn.onclick = function() {
  modal.style.display = "block";
}

span.onclick = onClose;

window.onclick = function(event) {
  if (event.target == modal) {
    onClose();
  }
}

function onClose() {
  modal.style.display = "none";
  usersInfo.innerHTML = "";
  extraInteractions.innerHTML = "";
}


function getGroupIdInfo(groupId, isAdmin, groupAdminId) {
  info.innerText = "Loading...";
  const Http = new XMLHttpRequest();
  const url=`../controllers/getgroupinfo.php?id=${groupId}`;
  Http.open("GET", url);
  Http.send();
  Http.onreadystatechange = (e) => {
    if(Http.readyState !== XMLHttpRequest.DONE) {
      return;
    }
    let output = Http.responseText;
    let jsonObject = null;

    try {
      jsonObject = JSON.parse(output);
    } catch (e) {
      info.innerText = "Unexpected error, while trying to get the corresponding group information, please try again.";
      return;
    }

    let groupInfo = jsonObject[0][0];
    let groupUsersInfo = jsonObject[1];
    info.innerText = groupInfo.group_name + " - " + groupInfo.group_bio;

    for (let user of groupUsersInfo) {

      let userInfo = document.createElement("li");
      userInfo.classList.add("user_info_page")
      userInfo.innerText = user[0].user_email;
      usersInfo.appendChild(userInfo);
 
      if (!isAdmin) {
        continue;
      }

      if (user[0].user_id == groupAdminId) {
        continue;
      }

      let userDeleteButton = document.createElement("a");
      userDeleteButton.classList.add("user_delete_button");
      userDeleteButton.href = "../controllers/deleteuserfromgroup.php?id=" + user[0].user_id;
      userDeleteButton.innerText = "X";
      userInfo.appendChild(userDeleteButton);
    
    }

    if (isAdmin) {
      let addUserButton = createButton("add_user", "add_user", "Add User");
      let deleteGroup = createButton("delete_group", "delete_group", "Delete Group");
      extraInteractions.appendChild(deleteGroup);
      extraInteractions.appendChild(addUserButton);
    }
    else {
      let leaveGroup = createButton("leave_group", "leave_group", "Leave Group");
      extraInteractions.appendChild(leaveGroup);
    }

  }
}

function createButton(className, id, innerText) {
  let button = document.createElement("button");
  button.classList.add(className, "btn", "modal_interaction");
  button.setAttribute("id", id);
  button.innerText = innerText;
  return button;
}


function myFunction(event) { 
  var x = event.target;
  console.log(x.innerText);
  console.log(x.name);
  console.log(x)
  if(x != edit){
    txt.value = x.innerText
    console.log(true)
  }
}

function update(){
  // form.action = ".../controllers/update.php"
  txt.innerText = "<?= $message?>"
  console.log(1)
}


const edit = document.getElementById("editId")
const txt = document.getElementById("text")
const form = document.getElementById("form")
 
 
function myFunction(event) {
 var x = event.target.name;
 console.log(x)
 const messageCont = document.getElementById(x)
 console.log(messageCont.innerText)

   txt.value = messageCont.innerText
   form.action = "../controllers/update.php"


}

function show(event){
  let dropdownDiv = document.getElementsByClassName("dropdown")
  for (let i = 0; i < dropdownDiv.length; i++) {
    dropdownDiv[i].style.display = "none"
    
  }


  var y = event.target.id
  let id = "dropdown" + y

  const dropdown = document.getElementById(id)
  dropdown.style.display = "inline-block"
  dropdown.style.position = "absolute"
  //dropdown154
}