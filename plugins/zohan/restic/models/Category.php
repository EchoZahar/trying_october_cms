<?php namespace Zohan\Restic\Models;

use Model;
use October\Rain\Database\Traits\NestedTree;
use October\Rain\Database\Traits\Sluggable;
use October\Rain\Database\Traits\SoftDelete;
use October\Rain\Database\Traits\Sortable;
use October\Rain\Database\Traits\Validation;
use System\Models\File;

/**
 * Category Model
 */
class Category extends Model
{
    use Validation, NestedTree, SoftDelete, Sluggable;

    public $table = 'zohan_restic_categories';

    protected $guarded = ['*'];

    protected $fillable = [];

    public $rules = [];

    protected $casts = [];

    protected $jsonable = [];

    protected $appends = [];

    protected $hidden = [];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $slugs = ['slug' => 'name'];

    public $hasMany = [
        'children'  => [Category ::class, 'key' => 'parent_id'],
        'dishes'    => [Dish::class],
    ];
    public $belongsTo = [
        'parent' => [Category ::class, 'key' => 'parent_id'],
    ];

    public $attachOne = [
        'image' => [File::class],
    ];
}
