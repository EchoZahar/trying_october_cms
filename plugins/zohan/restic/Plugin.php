<?php namespace Zohan\Restic;

use Backend;
use System\Classes\PluginBase;
use Zohan\Restic\Components\Catalog as Catalog;

/**
 * Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Restic',
            'description' => 'It\'s simple task..',
            'author'      => 'Zohan',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            Catalog::class          => 'catalog',
        ];
    }

    /**
     * Registers any backend permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'zohan.restic.some_permission' => [
                'tab'   => 'Restic',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers backend navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'restic' => [
                'label'       => 'Restic Catalog',
                'url'         => Backend::url('zohan/restic/categories'),
                'icon'        => 'icon-leaf',
                'permissions' => ['zohan.restic.*'],
                'order'       => 500,
                'sideMenu'       => [
                    'categories'    => [
                        'label'         => 'Categories',
                        'icon'          => 'icon-copy',
                        'url'           => Backend::url('zohan/restic/categories'),
                        'permissions'   => ['zohan.restic.*'],
                    ],
                    'dishes'        => [
                        'label'         => 'Dishes',
                        'icon'          => 'icon-pencil',
                        'url'           => Backend::url('zohan/restic/dishes'),
                    ]
                ]
            ],
        ];
    }
}
