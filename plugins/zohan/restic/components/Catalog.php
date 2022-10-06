<?php namespace Zohan\Restic\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Http\Response;
use Zohan\Restic\Models\Category as CategoryModel;
use Zohan\Restic\Models\Dish;

/**
 * Catalog Component
 */
class Catalog extends ComponentBase
{
    public function componentDetails(): array
    {
        return [
            'name'          => 'Catalog categories',
            'description'   => 'By default need created dishes cat (salads warn and coldZo)...'
        ];
    }

    public function defineProperties(): array
    {
        return [
            'categories' => [
                'title'         => 'All categories show how main catalog.',
                'description'   => 'Some description for this page.',
                'default'       => 10
            ]
        ];
    }

    public function onRun()
    {
        if ($this->page->id === 'catalog') {
            $this->page['categories'] = CategoryModel::with('image')
                ->whereNull('parent_id')
                ->paginate($this->property('categories'));
        } elseif ($this->page->id === 'category') {
            $this->page['category'] = CategoryModel::with('dishes')->where('slug', $this->param('category'))->first();
            if (!$this->page['category']) {
                return Response::make($this->controller->run('404'), 404);
            }
        } elseif ($this->page->id === 'dish') {
            $this->page['dish'] = Dish::where('slug', $this->param('dish'))->first();
            if (!$this->page['dish']) {
                return Response::make($this->controller->run('404'), 404);
            }
        }
    }
}
