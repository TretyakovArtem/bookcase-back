<?php
/**
 * Created by PhpStorm.
 * User: treschelet
 * Date: 27.06.17
 * Time: 14:03
 */

namespace App\GraphQL\Types;


use GraphQL\Type\Definition\Type;
use App\GraphQL\Support\InputType;

class UpdateBookInput extends InputType
{
    protected $attributes = [
        'name' => 'UpdateBookInput',
        'description' => 'An input to update book'
    ];

    protected function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::id()),
                'description' => 'The id field',
            ],
            'author' => [
                'type' => Type::string(),
                'description' => 'Book author'
            ],
            'title' => [
                'type' => Type::string(),
                'description' => 'Book title'
            ]
        ];
    }

}