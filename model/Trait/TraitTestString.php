<?php
// JE ME SUIS DIT QU'ON UTILISE CECI SOUVENT ALORS POURQUOI PAS LE METTRE ICI ET APPEL À VOLONTE
namespace model\Trait;

trait TraitTestString
{
    protected function verifyString (?string $testThis) : bool {
        if (empty($testThis)) return false;
            return true;
    }
}