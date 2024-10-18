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
            'label' => 'Hero',
            'fields' => [
                'image' => [
                    'type' => FieldTypes::Image,
                    'label' => 'Image',
                    'rules' => ['required', 'image'],
                    'value' => null
                ],
                'title' => [
                    'type' => FieldTypes::Text,
                    'label' => 'Title',
                    'rules' => ['required', 'text'],
                    'value' => null
                ],
                'description' => [
                    'type' => FieldTypes::Text,
                    'label' => 'Description',
                    'rules' => ['required', 'text'],
                    'value' => null
                ],
                'buttons' => [
                    'type' => FieldTypes::Replicator,
                    'label' => 'Buttons',
                    'block' => ButtonBlock::getSchema(),
                    'value' => null
                ]
            ]
        ];
    }
}
