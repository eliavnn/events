<?php

namespace App\EventBuilder\Blocks;

use App\EventBuilder\Enums\FieldTypes;
use App\EventBuilder\Enums\FieldTypess;

class TextBlock extends Block
{

    public static function getSchema(): array
    {
        return [
            'type' => 'text',
            'fields' => [
                'text' => [
                    'type' => FieldTypes::Text,
                    'label' => 'Text',
                    'rules' => ['required', 'text'],
                ]
            ]

        ];
    }

}
