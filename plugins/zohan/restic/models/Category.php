<?php namespace Zohan\Restic\Models;

use Model;
use October\Rain\Database\Traits\NestedTree;
use October\Rain\Database\Traits\Sluggable;
use October\Rain\Database\Traits\SoftDelete;
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

    protected $casts = [
        'is_published' => 'boolean'
    ];

    public $rules = [
        'name'          => ['bail', 'required', 'string', 'min:2', 'max:150', 'unique:zohan_restic_categories'],
        'description'   => ['nullable', 'string', 'min:2', 'max:5000'],
        'slug'          => ['bail', 'required', 'string', 'unique:zohan_restic_dishes'],
    ];

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

    public function beforeCreate()
    {
        if (is_null($this->parent_id)) $this->parent_id = 0;
    }
}
