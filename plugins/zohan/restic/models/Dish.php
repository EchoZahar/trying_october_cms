<?php namespace Zohan\Restic\Models;

use Model;
use October\Rain\Database\Traits\SoftDelete;
use October\Rain\Database\Traits\Validation;
use System\Models\File;

class Dish extends Model
{
    use Validation, SoftDelete;

    public $table = 'zohan_restic_dishes';

    protected $guarded = ['*'];

    protected $fillable = [];

    protected $casts = [
        'is_published' => 'boolean'
    ];

    public $rules = [
        'name'          => ['bail', 'required', 'string', 'min:2', 'max:150'],
        'slug'          => ['bail', 'required', 'string', 'unique:zohan_restic_dishes'],
        'description'   => ['nullable', 'string', 'max:5000'],
        'price'         => ['required', 'numeric', 'between:0,99999999.99'],
        'category'      => ['required', 'integer']
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $belongsTo = [
        'category' => [Category::class, 'key' => 'category_id'],
    ];

    public $attachMany = [
        'dish_images' => [File::class],
    ];
}
