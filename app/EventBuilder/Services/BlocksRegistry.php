<?php

namespace App\EventBuilder\Services;

use App\EventBuilder\Blocks\Block;

class BlocksRegistry
{

    private array $blocks = [];

    public function register(array $blocks): void
    {
        foreach ($blocks as $type => $block) {
            $this->blocks[$type] = $block;
        }
    }

    public function get(string $type): Block
    {
        return $this->blocks[$type];
    }

    public function all(): array
    {
        return $this->blocks;
    }
}
