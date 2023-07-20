<?php

namespace Core\Form;

interface FieldsInterface
{

    /**
     * @return string
     */
    public function __toString(): string;


    /**
     * @return string
     */
    public function getName(): string;


}
