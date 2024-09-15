<?php

namespace Database\Factories\decorators\DescriptionAdder;

class GolangDescriptionAdderDecorator extends BaseDescriptionAdderDecorator
{
    public function __construct(DescriptionAdderInterface $wrapper)
    {
        $this->wrapper = $wrapper;
        $this->wrapper->addDescription('golang');
    }
}
