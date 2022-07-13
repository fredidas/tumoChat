<?php
  session_start();
  $user_id = $_SESSION['user_id'];
  require_once("../models/db.php");
  $sql = "SELECT DISTINCT group_id, group_type, group_name, group_icon, group_bio FROM GROUPCHAT JOIN isInGroup ON isInGroup_group_id = group_id WHERE isInGroup_user_id = ".$user_id;
  $result = mysqli_query($conn, $sql);
  $sendersql = "SELECT notification_sender_id FROM notifications WHERE notification_receiver_id = '$user_id' "
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>TUYU | Communities</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../style/page-accueil.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <style>

        <?php $theme = $_SESSION['user_theme']; ?>
       
        body{
           background-image: url("../assets/images/themes/<?php echo $theme; ?>.jpg");
        }
        
        
        </style>
  </head>
  <body>
    <div class="fixed-top">
      <nav class="navbar navbar-expand-lg" style="background-color: #6c4b93">
        <div class="container">
          <a class="navbar-brand" href="profile.php" style="color :white"
            >Profile</a
          >
          
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarText"
            aria-controls="navbarText"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                
            <a onClick="notification()" id="infoButton" class="notifications_btn nav-link" style="color : white">Notifications</a>
            <li class="nav-item">
              <a class="nav-link active" href="page-accueil.php" style="color :white">Home</a>
            </li>
            <div id="infoModal" class="modal_user">
                    <div class="modal-content">
                      
                        <div class="groupinfo_div">
                            <p id="groupInfo"></p>
                        </div>
                        <div class="usersinfo_div">
                            <div id="usersInfo">
                              
                            </div>
                            <div id = "modal_buttons" class="userinfo_buttons">
                                <div id="modal-extra-interactions"></div>
                                <div id="modal-default-interactions">
                                    <button id="closeButton" class="close btn modal_interaction">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </ul> 
            
            <form class="d-flex" role="search">
          
              <input
                class="form-control me-2 srch-input"
                type="search"
                placeholder="Search group"
                aria-label="Search"
              />
              <button class="btn search">
                <img
                  src="../assets/images/loupe.png"
                  alt="Rechercher"
                  style="width : 20px; height: 30px; margin-top : 3px"
                />
              </button>
            </form>
            <a href ="../controllers/logout.php" class="signout-btn">Sign out</a>
          </div>
        </div>
      </nav>
    </div>
    <br />
    <div class="container mt-5">
      <div class="div-titre mt-4">
        <h1 class="Titre">Communities</h1>
      </div>
      <div class="row">
            <?php
              while($group = mysqli_fetch_assoc($result)){
                  if($group["group_type"]==0){
                ?>
                <div class="col-lg-4 col-sm-12 group-chats">
                  <a href="page-chat.php?id=<?php echo $group["group_id"]; ?>" style="text-decoration :none">
                    <div class="card mt-5">
                      <ul class="list-group list-group-flush" style="list-style-type: none;">
                        
                        <li class="list-group-item group-name"><h3><?php echo $group["group_name"]; ?></h3></li>
                        <li><img style="width:5vw" src="../assets/comm_icons/<?php echo $group["group_icon"];?>.png" alt=""></li>
                        <li class="list-group-item">
                          <?php
                            echo  $group["group_bio"];
                          ?>
                        </li>
                      </ul>
                    </div>
                  </a>
                </div>
              <?php
              }}
              ?>
      </div>
    </div>
    <script src="../scripts/search.js"></script>
    <script src="../scripts/notifications.js"></script>
  </body>
</html>