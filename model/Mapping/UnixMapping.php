<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;
use model\Trait\TraitTestString;
use model\Trait\TraitTestInt;
use model\Trait\TraitLaundryRoom;
use Exception;
class UnixMapping extends AbstractMapping
{
    use TraitTestString, TraitTestInt, TraitLaundryRoom;
    protected ?int $snip_unix_id;
    protected ?string $snip_unix_title;
    protected ?string $snip_unix_desc;
    protected ?string $snip_unix_code;

    public function getSnipUnixId(): ?int
    {
        return $this->snip_unix_id;
    }

    public function setSnipUnixId(?int $snip_unix_id): void
    {
        if(!$this->verifyInt($snip_unix_id)) throw new Exception("ID must be an integer");
        $snip_unix_id = $this->intClean($snip_unix_id);
        $this->snip_unix_id = $snip_unix_id;
    }

    public function getSnipUnixTitle(): ?string
    {
        return $this->snip_unix_title;
    }

    public function setSnipUnixTitle(?string $snip_unix_title): void
    {
        if(!$this->verifyString($snip_unix_title)) throw new Exception("Title cannot be empty");
        $snip_unix_title = $this->standardClean($snip_unix_title);
        $this->snip_unix_title = $snip_unix_title;
    }

    public function getSnipUnixDesc(): ?string
    {
        return $this->snip_unix_desc;
    }

    public function setSnipUnixDesc(?string $snip_unix_desc): void
    {
        if(!$this->verifyString($snip_unix_desc)) throw new Exception("Description cannot be empty");
        $snip_unix_desc = $this->standardClean($snip_unix_desc);
        $this->snip_unix_desc = $snip_unix_desc;
    }

    public function getSnipUnixCode(): ?string
    {
        return $this->snip_unix_code;
    }

    public function setSnipUnixCode(?string $snip_unix_code): void
    {
        if(!$this->verifyString($snip_unix_code)) throw new Exception("Code cannot be empty");
        $snip_unix_code = $this->simpleTrim($snip_unix_code);
        $this->snip_unix_code = $snip_unix_code;
    }



} // end class