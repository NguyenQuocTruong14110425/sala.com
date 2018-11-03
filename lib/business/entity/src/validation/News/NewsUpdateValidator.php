<?php namespace Business\Entity\Validation\News;

use Business\Entity\Validation\AppValidator;
use Business\Entity\Validation\ValidableInterface;

class NewsUpdateValidator extends AppValidator implements ValidableInterface {

    /**
     * Validation for creating a new User
     *
     * @var array
     */
    protected $rules = array(
        'news_categories_title' => 'required',
        );
    protected $message = array(
        'news_categories_title.required' => 'valid_news_categories_title_required'
    );
}