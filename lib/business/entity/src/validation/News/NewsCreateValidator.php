<?php namespace Business\Entity\Validation\News;

use Business\Entity\Validation\AppValidator;
use Business\Entity\Validation\ValidableInterface;

class NewsCreateValidator extends AppValidator implements ValidableInterface {

    /**
     * Validation for creating a new User
     *
     * @var array
     */
    protected $rules = array(
        'news_title' => 'required',
        'news_description' => 'required',
    );
    protected $message = array(
        'news_title.required' => 'valid_news_title_required',
        'news_description.required' => 'valid_news_description_required'
    );

}