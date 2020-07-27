<?php

namespace App\src\constraint;
use App\config\Parameter;

class CommentValidation extends Validation
{
    private $errors = [];
    private $constraint;

    public function __construct()
    {
        $this->constraint = new Constraint();
    }

    /**
     * check method (recover Parameter data, by all method)
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
     * check field method
     *
     * @param [type] $name
     * @param [type] $value
     * @return void
     */
    private function checkField($name, $value)
    {
       
        if ($name === 'content') {
            $error = $this->checkContent($name, $value);
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
     * check content comment field
     *
     * @param [type] $name
     * @param [type] $value
     * @return void
     */
    private function checkContent($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('contenu', $value);
        }
        if($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('contenu', $value, 2);
        }
    }
}
