<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;
class UserMapping extends AbstractMapping
{
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
        $this->snip_user_id = $snip_user_id;
    }

    public function getSnipUserLogin(): ?string
    {
        return $this->snip_user_login;
    }

    public function setSnipUserLogin(?string $snip_user_login): void
    {
        $this->snip_user_login = $snip_user_login;
    }

    public function getSnipUserPass(): ?string
    {
        return $this->snip_user_pass;
    }

    public function setSnipUserPass(?string $snip_user_pass): void
    {
        $this->snip_user_pass = $snip_user_pass;
    }

    public function getSnipUserSurname(): ?string
    {
        return $this->snip_user_surname;
    }

    public function setSnipUserSurname(?string $snip_user_surname): void
    {
        $this->snip_user_surname = $snip_user_surname;
    }

    public function getSnipUserEmail(): ?string
    {
        return $this->snip_user_email;
    }

    public function setSnipUserEmail(?string $snip_user_email): void
    {
        $this->snip_user_email = $snip_user_email;
    }

    public function getSnipUserRecovery(): ?string
    {
        return $this->snip_user_recovery;
    }

    public function setSnipUserRecovery(?string $snip_user_recovery): void
    {
        $this->snip_user_recovery = $snip_user_recovery;
    }

    public function getSnipUserPermissions(): ?string
    {
        return $this->snip_user_permissions;
    }

    public function setSnipUserPermissions(?string $snip_user_permissions): void
    {
        $this->snip_user_permissions = $snip_user_permissions;
    }

    public function loadFromDbRow($row) {
        $this->setSnipUserId($row['id']);
        $this->setSnipUserLogin($row['snip_user_login']);
        $this->setSnipUserPass($row['snip_user_pass']);
    }

} // end class