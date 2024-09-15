<?php

namespace Database\Factories\Decorators\DescriptionAdder;

interface DescriptionAdderInterface
{
    public function addDescription(string $description): void;
    public function getDescription(): array;
}
