<?php

namespace App\EventBuilder\Blocks;

use App\EventBuilder\Enums\FieldTypes;

class ButtonBlock extends Block
{
    public static function getSchema(): array
    {
        return [
            'type' => 'button',
            'label' => 'Button',
            'fields' => [
                'label' => [
                    'type' => FieldTypes::Text,
                    'label' => 'Label',
                    'rules' => ['required', 'text'],
                    'value' => null,
                ],
                'url' => [
                    'type' => FieldTypes::Text,
                    'label' => 'Link',
                    'rules' => ['required_without:anchor', 'url'],
                    'value' => null,
                ],
                'anchor' => [
                    'type' => FieldTypes::Text,
                    'label' => 'Anchor',
                    'rules' => ['required_without:url', 'text'],
                    'value' => null,
                ]
            ]
        ];
    }
}
