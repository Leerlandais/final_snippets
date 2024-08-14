<?php

namespace model\Manager;

use model\Abstract\AbstractManager;
use model\Mapping\UserMapping;
use model\MyPDO;

class UserManager extends AbstractManager {



    public function attemptUserLogin(string $name, string $pwd): bool {
        $name = htmlspecialchars(strip_tags(trim($name)));

        $sql = 'SELECT * FROM `snippets_users` WHERE `snip_user_login` = :name';
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->execute();

        if ($stmt->rowCount() === 0) {
            return false;
        }

        $row = $stmt->fetch();
        $user = new UserMapping($row);

        if (!password_verify($pwd, $user->getSnipUserPass())) {
            return false;
        }
        $_SESSION["id"] = session_id();

        return true;
    }

    public function userLogout() : void {
        $_SESSION = []; // equivalent of session_unset()

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
    }


} // end class
