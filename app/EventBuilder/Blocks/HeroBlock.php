<?php

namespace App\EventBuilder\Blocks;

use App\EventBuilder\Enums\FieldTypes;
use App\EventBuilder\Enums\FieldTypess;

class HeroBlock extends Block
{
    public static function getSchema(): array
    {
        return [
            'type' => 'hero',
            'fields' => [
                'image' => [
                    'type' => FieldTypes::Image,
                    'label' => 'Image',
                    'rules' => ['required', 'image'],
                ],
                'title' => [
                    'type' => FieldTypes::Text,
                    'label' => 'Title',
                    'rules' => ['required', 'text'],
                ],
                'description' => [
                    'type' => FieldTypes::Text,
                    'label' => 'Description',
                    'rules' => ['required', 'text'],
                ],
                'buttons' => [
                    'type' => FieldTypes::Replicator,
                    'label' => 'Buttons',
                    'fields' => ButtonBlock::getSchema(),
                ]
            ]
        ];
    }
}
