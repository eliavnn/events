<?php

namespace App\Http\Controllers;

use App\EventBuilder\Blocks\TextBlock;
use App\EventBuilder\Services\BlocksRegistry;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EventController extends Controller
{

    public function __construct(protected BlocksRegistry $registry)
    {
        $this->registry = $registry;
    }

    public function create(Request $request)
    {
        $blocks = [];

        foreach ($this->registry->all() as $block) {
            $schema = $block::getSchema();
            $blocks[$schema['type']] = $schema;
        }

        return Inertia::render('Events/Create', [
            'blocks' => $blocks
        ]);
    }
}
