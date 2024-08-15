<?php
// JE ME SUIS DIT QU'ON UTILISE CECI SOUVENT ALORS POURQUOI PAS LE METTRE ICI ET APPEL À VOLONTE
namespace model\Trait;

trait TraitTestInt
{
    // UTILISATION DE PHP_UNT_MAX POUR PERMETTRE TOUT INT AU CAS OU DE NON RECEPTION D'UN ARGUMENT POUR MAX
    protected function verifyInt ($testThis, $min = 0, $max = PHP_INT_MAX) : bool{
        if ($testThis < $min || $testThis > $max) return false;
            return true;
    }
}