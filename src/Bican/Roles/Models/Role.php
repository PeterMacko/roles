<?php

namespace Bican\Roles\Models;

use Bican\Roles\Traits\Slugable;
use Illuminate\Database\Eloquent\Model;
use Bican\Roles\Traits\RoleHasRelations;
use Bican\Roles\Contracts\RoleHasRelations as RoleHasRelationsContract;
use App\BaseModel;
use App\Lib\ModelTraits\CreatorTrait;
use App\Lib\ModelTraits\UpdaterTrait;

class Role extends BaseModel implements RoleHasRelationsContract
{
    use Slugable, RoleHasRelations, CreatorTrait, UpdaterTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'description', 'level'];

    /**
     * Create a new model instance.
     *
     * @param array $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if ($connection = config('roles.connection')) {
            $this->connection = $connection;
        }
    }
}
