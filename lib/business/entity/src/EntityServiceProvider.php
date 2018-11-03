<?php

namespace Business\Entity;

use Business\Entity\News\NewsEntity;
use Business\Entity\NewsCategories\NewsCategoriesEntity;
use Business\Entity\Resources\ResourcesEntity;
use Business\Entity\Validation\News\NewsCreateValidator;
use Business\Entity\Validation\News\NewsUpdateValidator;
use Business\Entity\Validation\NewsCategories\NewsCategoriesUpdateValidator;
use Business\Entity\Validation\NewsCategories\NewsCategoriesCreateValidator;
use Business\Entity\Validation\Resources\ResourcesCreateValidator;
use Business\Entity\Validation\Resources\ResourcesUpdateValidator;
use Illuminate\Support\ServiceProvider;

class EntityServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     * @return void
     */
    public function boot()
    {
        //
    }
    /**
     * Register services.
     * @return void
     */
    public function register()
    {
        $this->app->bind('Business\Entity\NewsCategories\NewsCategoriesEntity', function($app)
        {
            return new NewsCategoriesEntity (
                $app->make('Business\Entity\Repository\NewsCategories\NewsCategoriesRepository'),
                new NewsCategoriesCreateValidator( $app['validator'] ),
                new NewsCategoriesUpdateValidator( $app['validator'] )
            );
        });

        //news
        $this->app->bind('Business\Entity\NewsCategories\NewsEntity', function($app)
        {
            return new NewsEntity (
                $app->make('Business\Entity\Repository\News\NewsRepository'),
                new NewsCreateValidator( $app['validator'] ),
                new NewsUpdateValidator( $app['validator'] )
            );
        });

        // resources
        $this->app->bind('Business\Entity\Resources\ResourcesEntity', function($app)
        {
            return new ResourcesEntity (
                $app->make('Business\Entity\Repository\Resources\ResourcesRepository'),
                new ResourcesCreateValidator( $app['validator'] ),
                new ResourcesUpdateValidator( $app['validator'] )
            );
        });
    }
}
