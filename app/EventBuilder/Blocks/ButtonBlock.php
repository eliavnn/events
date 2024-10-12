<?php

namespace App\EventBuilder\Blocks;

use App\EventBuilder\Enums\FieldTypes;

class ButtonBlock extends Block
{
    public static function getSchema(): array
    {
        return [
            'type' => 'button',
            'fields' => [
                'text' => [
                    'type' => FieldTypes::Text,
                    'label' => 'Text',
                    'rules' => ['required', 'text'],
                ],
                'url' => [
                    'type' => FieldTypes::Text,
                    'label' => 'Link',
                    'rules' => ['required_without:anchor', 'url'],
                ],
                'anchor' => [
                    'type' => FieldTypes::Text,
                    'label' => 'Anchor',
                    'rules' => ['required_without:url', 'text'],
                ]
            ]
        ];
    }
}
