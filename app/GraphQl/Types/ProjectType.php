<?php 
namespace App\GraphQL\Types;

use App\Models\Project;
// use App\Project;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ProjectType extends GraphQLType {
    protected $attributes = [
        'name' => 'Project',
        'description' => 'A Project',
        'model' => Project::class
    ];

    public function fields(): array
    {
        # code...
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The Project\'s ID'
            ],
            'title' => [
                'type' => Type::nonNull(Type::string())
            ],
            'description' => [
                'type' => Type::nonNull(Type::string())
            ],
        ];
    }
}