<?php

namespace model\Manager;

use model\Abstract\AbstractManager;
use model\Mapping\UserMapping;
use model\Interface\InterfaceManager;

class UserManager extends AbstractManager implements InterfaceManager {



    public function attemptUserLogin(string $name, string $pwd): bool {
        // I could have used the Trait/LaundryRoom but as this is the only user input that needs sanitisation, I didn't think it necessary
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
        // additional parameter to prevent cross-site connection (I have stopped using the same userName for myself on sites but I like having the extra layer)
        $_SESSION["siteName"] = "snippets";
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
