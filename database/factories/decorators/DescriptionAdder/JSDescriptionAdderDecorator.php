<?php

namespace Database\Factories\Decorators\DescriptionAdder;

class JSDescriptionAdderDecorator extends BaseDescriptionAdderDecorator
{
    public function __construct(DescriptionAdderInterface $wrapper)
    {
        $this->wrapper = $wrapper;
        $this->wrapper->addDescription('js');
    }
}
