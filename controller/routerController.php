<?php




if(isset($_SESSION["id"]) && $_SESSION["id"] === session_id()){
    require_once PROJECT_DIRECTORY."/controller/privateController.php";
}else {
    require_once PROJECT_DIRECTORY."/controller/publicController.php";
}