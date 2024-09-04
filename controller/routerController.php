<?php



// Added the $_SESSION["sitename"] to prevent cross-site user connection (namely me) throughout my various sites
if(isset($_SESSION["id"], $_SESSION["siteName"]) && $_SESSION["id"] === session_id() && $_SESSION["siteName"] === "snippets"){
    require_once PROJECT_DIRECTORY."/controller/privateController.php";
}else {
    require_once PROJECT_DIRECTORY."/controller/publicController.php";
}


