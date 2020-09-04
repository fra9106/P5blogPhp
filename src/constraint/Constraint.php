<?php

namespace App\src\constraint;

class Constraint
{
    /**
     * empty field constraint method
     *
     * @param [type] $name
     * @param [type] $value
     * @return void
     */
    public function notBlank($name, $value)
    {
        if(empty($value)) {
            return '<p>Le champ '.$name.' saisi est vide</p>';
        }
    }

    /**
     * minLength method
     *
     * @param [type] $name
     * @param [type] $value
     * @param [type] $minSize
     * @return void
     */
    public function minLength($name, $value, $minSize)
    {
        if(strlen($value) < $minSize) {
            return '<p>Le champ '.$name.' doit contenir au moins '.$minSize.' caractères</p>';
        }
    }

    /**
     * maxLength method
     *
     * @param [type] $name
     * @param [type] $value
     * @param [type] $maxSize
     * @return void
     */
    public function maxLength($name, $value, $maxSize)
    {
        if(strlen($value) > $maxSize) {
            return '<p>Le champ '.$name.' doit contenir au maximum '.$maxSize.' caractères</p>';
        }
    }
}
   