<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;
use model\Trait\TraitTestString;
use model\Trait\TraitTestInt;
use model\Trait\TraitLaundryRoom;
use Exception;
class CodeMapping extends AbstractMapping
{
    use TraitTestString;
    use TraitTestInt;
    use TraitLaundryRoom;

    protected ?int $snip_code_id;
    protected ?string $snip_code_code;
    protected ?string $snip_code_type;
    protected ?bool $snip_code_link;

    public function getSnipCodeId(): ?int
    {
        return $this->snip_code_id;
    }

    public function setSnipCodeId(?int $snip_code_id): void
    {
        if(!$this->verifyInt($snip_code_id)) throw new Exception('snip_code_id must be integer');
        $snip_code_id = $this->intClean($snip_code_id);
        $this->snip_code_id = $snip_code_id;
    }

    public function getSnipCodeCode(): ?string
    {
        return $this->snip_code_code;
    }

    public function setSnipCodeCode(?string $snip_code_code): void
    {
        if(!$this->verifyString($snip_code_code)) throw new Exception('snip_code_code cannot be empty');
        $snip_code_code = $this->standardClean($snip_code_code);
        $this->snip_code_code = $snip_code_code;
    }

    public function getSnipCodeType(): ?string
    {
        return $this->snip_code_type;
    }

    public function setSnipCodeType(?string $snip_code_type): void
    {
        if(!$this->verifyString($snip_code_type)) throw new Exception('snip_code_type cannot be empty');
        $snip_code_type = $this->standardClean($snip_code_type);
        $this->snip_code_type = $snip_code_type;
    }

    public function getSnipCodeLink(): ?bool
    {
        return $this->snip_code_link;
    }

    public function setSnipCodeLink(?bool $snip_code_link): void
    {
        $this->snip_code_link = $snip_code_link;
    }



}