<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 03.08.17
 * Time: 11:54
 */

namespace App\GraphQL\Mutation;

use GraphQL;
use GraphQL\Error\Error;
use GraphQL\Type\Definition\Type;
use App\GraphQL\Support\InputType;
use Folklore\GraphQL\Support\Mutation;
use App\Book;


class UpdateBookMutation extends Mutation {

    protected $attributes = [
        'name' => 'updateBook',
        'description' => 'The mutation to update book'
    ];


    public function type()
    {
        return GraphQL::type('Book');
    }


    public function args()
    {
        return [
            'id' => [
                'type' => Type::id(),
                'description' => Type::id()
            ],
            'author' => [
                'type' => Type::string(),
                'description' => Type::string()
            ],
            'title'  => [
                'type' => Type::string(),
                'description' => Type::string()
            ],
            'input' => [
                'type' => GraphQL::type('UpdateBookInput'),
                'description' => 'Book update'
            ]
        ];

    }


    public function resolve($root, $args)
    {
        $id = $args['input']['id'];
        if ($book = Book::find($id)) {
                $book->title = $args['input']['title'];
                $book->author = $args['input']['author'];
            if (!$book->save()) {
                throw new Error('Can\'t update book');
            }
        }
        else {
            throw new Error('Book not found');
        }
        return $book;
    }

}