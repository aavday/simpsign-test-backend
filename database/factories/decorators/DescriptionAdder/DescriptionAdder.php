<?php

namespace Database\Factories\Decorators\DescriptionAdder;

class DescriptionAdder implements DescriptionAdderInterface
{
    public array $description = [];

    public function addDescription(string $description): void
    {
        $this->description[] = $description;
    }

    public function getDescription(): array
    {
        return $this->description;
    }
}
