<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 03.08.17
 * Time: 10:27
 */
namespace App\GraphQL\Queries;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
use Illuminate\Database\Eloquent;
use App\Book;
use DB;


class BookQuery extends Query{


    public function type()
    {
        return Type::listOf(GraphQL::type('Book'));
    }


    public function args()
    {
        return [
            'author' => [
                'type' => Type::string(),
                'description' => Type::string()
            ],
            'title'  => [
                'type' => Type::string(),
                'description' => Type::string()
            ],
            'filter' => [
                'type' => GraphQL::type('FilterBookInput'),
                'description' => 'Book filter'
            ],
        ];
    }


    public function resolve($root, array $args = [])
    {
        $books = Book::query();
        if (isset($args['filter'])) {
            foreach ($args['filter'] as $filter => $value) {
                switch ($filter) {
                    case 'author':
                        $books->where('author', 'like', '%' . $value . '%');
                        break;
                }
            }
        }
        return $books->get();
    }


}