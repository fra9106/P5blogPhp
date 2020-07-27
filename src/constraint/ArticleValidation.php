<?php

namespace App\src\constraint;
use App\config\Parameter;

class ArticleValidation extends Validation
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
        if($name === 'title') {
            $error = $this->checkTitle($name, $value);
            $this->addError($name, $error);
        }
        elseif ($name === 'mini_content'){
            $error = $this->checkMiniContent($name, $value);
            $this->addError($name, $error);
        }
        elseif ($name === 'content') {
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
     * check title field
     *
     * @param [type] $name
     * @param [type] $value
     * @return void
     */
    private function checkTitle($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('titre', $value);
        }
        if($this->constraint->minLength($name, $value, 5)) {
            return $this->constraint->minLength('titre', $value, 5);
        }
        if($this->constraint->maxLength($name, $value, 30)) {
            return $this->constraint->maxLength('titre', $value, 30);
        }
    }

    /**
     * check miniContent field
     *
     * @param [type] $name
     * @param [type] $value
     * @return void
     */
    private function checkMiniContent($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('mini_content', $value);
        }
        if($this->constraint->minLength($name, $value, 5)) {
            return $this->constraint->minLength('mini_content', $value, 2);
        }
        if($this->constraint->maxLength($name, $value, 75)) {
            return $this->constraint->maxLength('mini_content', $value, 75);
        }
    }

    /**
     * check content field 
     *
     * @param [type] $name
     * @param [type] $value
     * @return void
     */
    private function checkContent($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('content', $value);
        }
        if($this->constraint->minLength($name, $value, 10)) {
            return $this->constraint->minLength('content', $value, 10);
        }
        if($this->constraint->maxLength($name, $value, 500)) {
            return $this->constraint->maxLength('content', $value, 500);
        }
    }  
}
