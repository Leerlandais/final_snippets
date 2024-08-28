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

        $this->snip_unix_id = $snip_unix_id;
    }

    public function getSnipUnixTitle(): ?string
    {
        return $this->snip_unix_title;
    }

    public function setSnipUnixTitle(?string $snip_unix_title): void
    {
        $this->snip_unix_title = $snip_unix_title;
    }

    public function getSnipUnixDesc(): ?string
    {
        return $this->snip_unix_desc;
    }

    public function setSnipUnixDesc(?string $snip_unix_desc): void
    {
        $this->snip_unix_desc = $snip_unix_desc;
    }

    public function getSnipUnixCode(): ?string
    {
        return $this->snip_unix_code;
    }

    public function setSnipUnixCode(?string $snip_unix_code): void
    {
        $this->snip_unix_code = $snip_unix_code;
    }



} // end class