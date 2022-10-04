<?php namespace Zohan\Restic;

use Backend;
use System\Classes\PluginBase;

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
        return []; // Remove this line to activate

        return [
            'Zohan\Restic\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any backend permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
//        return []; // Remove this line to activate

        return [
            'zohan.restic.some_permission' => [
                'tab' => 'Restic',
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
//        return []; // Remove this line to activate

        return [
            'restic' => [
                'label'       => 'Restic',
                'url'         => Backend::url('zohan/restic/categories'),
                'icon'        => 'icon-leaf',
                'permissions' => ['zohan.restic.*'],
                'order'       => 500,
                'sideMenu'       => [
                    'categories' => [
                        'label' => 'Categories',
                        'icon' => 'icon-copy',
                        'url' => Backend::url('zohan/restic/categories'),
                        'permissions' => ['zohan.restic.*'],
                    ],
                    'dishes' => [
                        'label' => 'Dishes (later was be added)',
                        'icon' => 'icon-copy',
                        'url' => Backend::url('zohan/restic/categories'),
                    ]
                ]
            ],
        ];
    }
}
