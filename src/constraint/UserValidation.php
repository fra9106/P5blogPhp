<?php

namespace App\src\constraint;
use App\config\Parameter;

class UserValidation extends Validation
{
    private $errors = [];
    private $constraint;

    public function __construct()
    {
        $this->constraint = new Constraint();
    }

    /**check method (recover Parameter data, by all method)
     * 
     *
     * @param Parameter $post
     * @return void
     */
    public function check(Parameter $post)
    {
        foreach ($post->all() as $key => $value) {
            $this->checkField($key, $value);
        }
        return $this->errors;
    }

    /**
     *  check register fields method
     *
     * @param [type] $name
     * @param [type] $value
     * @return void
     */
    private function checkField($name, $value)
    {
        if($name === 'pseudo') {
            $error = $this->checkPseudo($name, $value);
            $this->addError($name, $error);
        }
        elseif($name === 'newpseudo') {
            $error = $this->checkPseudo($name, $value);
            $this->addError($name, $error);
        }
        elseif ($name === 'mdp') {
            $error = $this->checkPassword($name, $value);
            $this->addError($name, $error);
        }
        elseif ($name === 'mdp2') {
            $error = $this->checkPassword($name, $value);
            $this->addError($name, $error);
        }
        elseif ($name === 'newpass') {
            $error = $this->checkPassword($name, $value);
            $this->addError($name, $error);
        }
        
    }

    /**
     * error method
     *
     * @param [type] $name
     * @param [type] $error
     * @return void
     */
    private function addError($name, $error) {
        if($error) {
            $this->errors += [
                $name => $error
            ];
        }
    }

    /**
     * check pseudo field
     *
     * @param [type] $name
     * @param [type] $value
     * @return void
     */
    private function checkPseudo($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('pseudo', $value);
        }
        if($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('pseudo', $value, 2);
        }
        if($this->constraint->maxLength($name, $value, 255)) {
            return $this->constraint->maxLength('pseudo', $value, 255);
        }
    }

    /**
     * check password field
     *
     * @param [type] $name
     * @param [type] $value
     * @return void
     */
    private function checkPassword($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('pass', $value);
        }
        if($this->constraint->minLength($name, $value, 4)) {
            return $this->constraint->minLength('pass', $value, 4);
        }
        if($this->constraint->maxLength($name, $value, 255)) {
            return $this->constraint->maxLength('pass', $value, 255);
        }
    }
}
