<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 03.08.17
 * Time: 10:01
 */

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use App\GraphQL\Support\Type as GraphQLType;

class BookType extends GraphQLType{

        /**
         * @var array
         */
        protected $attributes = [
            'name' => 'Book',
            'description'  => 'An Book'
        ];


        public function fields()
        {
            return [
                'author' => [
                    'type' => Type::nonNull(Type::string()),
                    'description' => 'Book author'
                ],
                'title'  => [
                    'type' => Type::nonNull(Type::string()),
                    'description' => 'Book title'
                ]
            ];
        }
}