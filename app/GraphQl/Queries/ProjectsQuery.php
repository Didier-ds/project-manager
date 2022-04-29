<?php 
namespace App\GraphQL\Queries;

use App\Models\Project;
use Closure;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class ProjectsQuery extends Query {
    protected $attributes = [
        'name' => 'The Project Query',
        'description' => 'It retrieves projects',
    ];

    public function type() : Type
    {
        # code...
        return Type::listOf(GraphQL::type('Project'));
    }

    public function resolve($root, $args)
    {
        # code...
        return Project::all();
    }
}