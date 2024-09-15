<?php

namespace Database\Factories\Decorators\DescriptionAdder;

class BaseDescriptionAdderDecorator implements DescriptionAdderInterface
{
    protected DescriptionAdderInterface $wrapper;

    public function __construct(DescriptionAdderInterface $wrapper)
    {
        $this->wrapper = $wrapper;
    }

    public function addDescription(string $description): void
    {
        $this->wrapper->addDescription($description);
    }

    public function getDescription(): array
    {
        return $this->wrapper->getDescription();
    }
}
