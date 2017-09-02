<?php
/**
 * Created by PhpStorm.
 * User: treschelet
 * Date: 29.06.17
 * Time: 14:01
 */

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use App\GraphQL\Support\InputType;
use App\Book;

class FilterBookInput extends InputType
{
    protected $attributes = [
        'name' => 'FilterBookInput',
        'description' => 'An input to filter Book'
    ];

    protected function fields()
    {
        return [
            'author' => [
                'type' => Type::string(),
                'description' => 'Book author',
            ]
        ];
    }
}