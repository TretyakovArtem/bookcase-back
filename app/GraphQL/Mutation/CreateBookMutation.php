<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 03.08.17
 * Time: 11:54
 */

namespace App\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Mutation;
use App\Book;


class CreateBookMutation extends Mutation {

    protected $attributes = [
        'name' => 'createBook'
    ];


    public function args()
    {
        return [
            'input' => [
                'type' => GraphQL::type('CreateBookInput'),
                'description' => 'Book create'
            ]
        ];
    }


    public function type()
    {
        return GraphQL::type('Book');
    }

    public function resolve($root, $args)
    {
        $book = new Book;
        $book->title = $args['input']['title'];
        $book->author = $args['input']['author'];
        $book->description = $args['input']['description'];
        $book->save();

        return $book;
    }

}