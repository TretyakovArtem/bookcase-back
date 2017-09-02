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

class CreateBookInput extends InputType
{
    protected $attributes = [
        'name' => 'CreateBookInput',
        'description' => 'A input to create book'
    ];

    protected function fields()
    {
        return [
            'author' => [
                'type' => Type::string(),
                'description' => 'Book author'
            ],
            'title' => [
                'type' => Type::string(),
                'description' => 'Book title'
            ],
            'description' => [
                'type' => Type::string(),
                'description' => 'Book description'
            ]
        ];
    }

}