<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping,
    model\Trait\TraitLaundryRoom,
    model\Trait\TraitTestString,
    model\Trait\TraitTestInt,
    Exception;

class ExesMapping extends AbstractMapping
{
    use TraitLaundryRoom,
        TraitTestString,
        TraitTestInt;

    protected ?int $snip_exes_id;
    protected ?string $snip_exes_title;
    protected ?string $snip_exes_desc;
    protected ?string $snip_exes_code_loc;

    public function getSnipExesId(): ?int
    {
        return $this->snip_exes_id;
    }

    public function setSnipExesId(?int $snip_exes_id): void
    {
        if(!$this->verifyInt($snip_exes_id)) throw new Exception('Id must be an integer');
        $snip_exes_id = $this->intClean($snip_exes_id);
        $this->snip_exes_id = $snip_exes_id;
    }

    public function getSnipExesTitle(): ?string
    {
        return $this->snip_exes_title;
    }

    public function setSnipExesTitle(?string $snip_exes_title): void
    {
        if(!$this->verifyString($snip_exes_title)) throw new Exception('Title cannot be empty');
        $snip_exes_title = $this->standardClean($snip_exes_title);
        $this->snip_exes_title = $snip_exes_title;
    }

    public function getSnipExesDesc(): ?string
    {
        return $this->snip_exes_desc;
    }

    public function setSnipExesDesc(?string $snip_exes_desc): void
    {
        if(!$this->verifyString($snip_exes_desc)) throw new Exception('Description cannot be empty');
        $snip_exes_desc = $this->standardClean($snip_exes_desc);
        $this->snip_exes_desc = $snip_exes_desc;
    }

    public function getSnipExesCodeLoc(): ?string
    {
        return $this->snip_exes_code_loc;
    }

    public function setSnipExesCodeLoc(?string $snip_exes_code_loc): void
    {
        if(!$this->verifyString($snip_exes_code_loc)) throw new Exception('Code location cannot be empty');
        $snip_exes_code_loc = $this->standardClean($snip_exes_code_loc);
        $this->snip_exes_code_loc = $snip_exes_code_loc;
    }


}