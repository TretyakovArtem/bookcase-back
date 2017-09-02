<?php

namespace App\GraphQL\Support;

use Illuminate\Support\Fluent;

use GraphQL\Type\Definition\InputObjectType;
use App\GraphQL\Support\Type as BaseType;

class InputType extends BaseType
{
    public function toType()
    {
        return new InputObjectType($this->toArray());
    }
}