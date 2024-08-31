<?php
// As with the LaundryRoom functions, it's often necessary to test an Integer
// Complete with optional min/max setting
namespace model\Trait;

trait TraitTestInt
{
    protected function verifyInt ($testThis, $min = 0, $max = PHP_INT_MAX) : bool{
        if ($testThis < $min || $testThis > $max) return false;
            return true;
    }
}