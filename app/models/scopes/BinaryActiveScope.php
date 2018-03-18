<?php

namespace App\models\scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class BinaryActiveScope implements Scope
{

    public function apply(Builder $builder, Model $model)
    {
        $builder->where('active', 1);
    }
    
}
