<?php
declare(strict_types=1);

namespace Canva\Content;

interface Content
{
    public function getName(): string;

    public function setName(string $name): self;

    public function getId(): string;

    public function setId(string $id): self;
}
