<?php

namespace model\Mapping;

use model\Abstract\AbstractMapping;

class FormMapping extends AbstractMapping
{
protected ?int $snip_form_id;
protected ?string $snip_form_class;
protected ?string $snip_form_type;
protected ?string $snip_form_title;
protected ?string $snip_form_desc;
protected ?string $snip_form_img;
protected ?string $snip_form_code;
protected ?string $snip_form_call;
protected ?string $snip_form_func;
protected ?string $snip_form_js;


    public function getSnipFormId(): ?int
    {
        return $this->snip_form_id;
    }

    public function setSnipFormId(?int $snip_form_id): void
    {
        $this->snip_form_id = $snip_form_id;
    }

    public function getSnipFormClass(): ?string
    {
        return $this->snip_form_class;
    }

    public function setSnipFormClass(?string $snip_form_class): void
    {
        $this->snip_form_class = $snip_form_class;
    }

    public function getSnipFormType(): ?string
    {
        return $this->snip_form_type;
    }

    public function setSnipFormType(?string $snip_form_type): void
    {
        $this->snip_form_type = $snip_form_type;
    }

    public function getSnipFormTitle(): ?string
    {
        return $this->snip_form_title;
    }

    public function setSnipFormTitle(?string $snip_form_title): void
    {
        $this->snip_form_title = $snip_form_title;
    }

    public function getSnipFormDesc(): ?string
    {
        return $this->snip_form_desc;
    }

    public function setSnipFormDesc(?string $snip_form_desc): void
    {
        $this->snip_form_desc = $snip_form_desc;
    }

    public function getSnipFormImg(): ?string
    {
        return $this->snip_form_img;
    }

    public function setSnipFormImg(?string $snip_form_img): void
    {
        $this->snip_form_img = $snip_form_img;
    }

    public function getSnipFormCode(): ?string
    {
        return $this->snip_form_code;
    }

    public function setSnipFormCode(?string $snip_form_code): void
    {
        $this->snip_form_code = $snip_form_code;
    }
    public function getSnipFormCall(): ?string
    {
        return $this->snip_form_call;
    }

    public function setSnipFormCall(?string $snip_form_call): void
    {
        $this->snip_form_call = $snip_form_call;
    }

    public function getSnipFormFunc(): ?string
    {
        return $this->snip_form_func;
    }

    public function setSnipFormFunc(?string $snip_form_func): void
    {
        $this->snip_form_func = $snip_form_func;
    }

    public function getSnipFormJs(): ?string
    {
        return $this->snip_form_js;
    }

    public function setSnipFormJs(?string $snip_form_js): void
    {
        $this->snip_form_js = $snip_form_js;
    }



} // end Class