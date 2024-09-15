<?php

namespace Database\Factories\Decorators\DescriptionAdder;

class PHPDescriptionAdderDecorator extends BaseDescriptionAdderDecorator
{
    public function __construct(DescriptionAdderInterface $wrapper)
    {
        $this->wrapper = $wrapper;
        $this->wrapper->addDescription('php');
    }
}
