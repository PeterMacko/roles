<?php

namespace Bican\Roles\Models;

use Bican\Roles\Traits\Slugable;
use Illuminate\Database\Eloquent\Model;
use Bican\Roles\Traits\PermissionHasRelations;
use Bican\Roles\Contracts\PermissionHasRelations as PermissionHasRelationsContract;
use App\BaseModel;
use App\Lib\ModelTraits\CreatorTrait;
use App\Lib\ModelTraits\UpdaterTrait;


class Permission extends BaseModel implements PermissionHasRelationsContract
{
    use Slugable, PermissionHasRelations, CreatorTrait, UpdaterTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'description', 'model'];

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
