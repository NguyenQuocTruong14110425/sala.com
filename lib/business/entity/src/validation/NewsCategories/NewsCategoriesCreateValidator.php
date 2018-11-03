<?php namespace Business\Entity\Validation\NewsCategories;

use Business\Entity\Validation\AppValidator;
use Business\Entity\Validation\ValidableInterface;

class NewsCategoriesCreateValidator extends AppValidator implements ValidableInterface {

    /**
     * Validation for creating a new User
     *
     * @var array
     */
    protected $rules = array(
        'news_categories_title' => 'required',
        'news_categories_description' => 'required',
    );
    protected $message = array(
        'news_categories_title.required' => 'valid_news_categories_title_required',
        'news_categories_description.required' => 'valid_news_categories_description_required'
    );

}