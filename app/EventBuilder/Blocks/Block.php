<?php

namespace App\EventBuilder\Blocks;

use Illuminate\Support\Facades\Validator;

abstract class Block
{

    abstract static public function getSchema(): array;

    protected function rules(): array
    {
        $rules = [];

        foreach ($this->getSchema()['fields'] as $type => $field) {
            if (array_key_exists('rules', $field)) {

                $rules[$type] = $field['rules'];

            } else if ($field['type'] == 'replicator') {



            }
        }

        return $rules;
    }

    public function validate(array $data): array
    {
        $validator = Validator::make($data, $this->rules());

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }

        return $validator->validated();
    }



}
