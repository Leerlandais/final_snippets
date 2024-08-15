<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;
use model\Trait\TraitTestString;
use model\Trait\TraitTestInt;
use model\Trait\TraitLaundryRoom;
use Exception;
class UserMapping extends AbstractMapping
{

    use TraitTestString;
    use TraitTestInt;
    use TraitLaundryRoom;

protected ?int $snip_user_id;
protected ?string $snip_user_login;
protected ?string $snip_user_pass;
protected ?string $snip_user_surname;
protected ?string $snip_user_email;
protected ?string $snip_user_recovery;
protected ?string $snip_user_permissions;

    public function getSnipUserId(): ?int
    {
        return $this->snip_user_id;
    }

    public function setSnipUserId(?int $snip_user_id): void
    {
        if(!$this->verifyInt($snip_user_id)) throw new Exception("User id must be a positive integer");
        $snip_user_id = $this->intClean($snip_user_id);
        $this->snip_user_id = $snip_user_id;

    }

    public function getSnipUserLogin(): ?string
    {
        return $this->snip_user_login;
    }

    public function setSnipUserLogin(?string $snip_user_login): void
    {
        if(!$this->verifyString($snip_user_login)) throw new \Exception("User login cannot be empty");
        $snip_user_login = $this->standardClean($snip_user_login);
        $this->snip_user_login = $snip_user_login;
    }

    public function getSnipUserPass(): ?string
    {
        return $this->snip_user_pass;
    }

    public function setSnipUserPass(?string $snip_user_pass): void
    {
        if(!$this->verifyString($snip_user_pass)) throw new \Exception("User pass cannot be empty");
        $snip_user_pass = $this->simpleTrim($snip_user_pass);
        $this->snip_user_pass = $snip_user_pass;
    }

    public function getSnipUserSurname(): ?string
    {
        return $this->snip_user_surname;
    }

    public function setSnipUserSurname(?string $snip_user_surname): void
    {
        if(!$this->verifyString($snip_user_surname)) throw new \Exception("User surname cannot be empty");
        $snip_user_surname = $this->standardClean($snip_user_surname);
            $this->snip_user_surname = $snip_user_surname;
    }

    public function getSnipUserEmail(): ?string
    {
        return $this->snip_user_email;
    }

    public function setSnipUserEmail(?string $snip_user_email): void
    {
        if(!$this->verifyString($snip_user_email)) throw new \Exception("User email cannot be empty");
        $snip_user_email = $this->emailClean($snip_user_email);
        $this->snip_user_email = $snip_user_email;
    }

    public function getSnipUserRecovery(): ?string
    {
        return $this->snip_user_recovery;
    }

    public function setSnipUserRecovery(?string $snip_user_recovery): void
    {
        if(!$this->verifyString($snip_user_recovery)) throw new \Exception("User recovery cannot be empty");
        $snip_user_recovery = $this->simpleTrim($snip_user_recovery);
        $this->snip_user_recovery = $snip_user_recovery;
    }

    public function getSnipUserPermissions(): ?int
    {
        return $this->snip_user_permissions;
    }

    public function setSnipUserPermissions(?int $snip_user_permissions): void
    {
        if(!$this->verifyInt($snip_user_permissions)) throw new \Exception("User permissions must be a positive integer");
        $snip_user_permissions = $this->intClean($snip_user_permissions);
        $this->snip_user_permissions = $snip_user_permissions;
    }

    public function loadFromDbRow($row) {
        $this->setSnipUserId($row['id']);
        $this->setSnipUserLogin($row['snip_user_login']);
        $this->setSnipUserPass($row['snip_user_pass']);
    }

} // end class