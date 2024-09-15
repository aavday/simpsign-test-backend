<?php

namespace Database\Factories\decorators\DescriptionAdder;

class JavaDescriptionAdderDecorator extends BaseDescriptionAdderDecorator
{
    public function __construct(DescriptionAdderInterface $wrapper)
    {
        $this->wrapper = $wrapper;
        $this->wrapper->addDescription('java');
    }
}
