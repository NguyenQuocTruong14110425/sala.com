<?php namespace Business\Entity\Validation\Resources;

use Business\Entity\Validation\AppValidator;
use Business\Entity\Validation\ValidableInterface;

class ResourcesUpdateValidator extends AppValidator implements ValidableInterface {

    /**
     * Validation for creating a new User
     *
     * @var array
     */
    protected $rules = array(
        'resources_title' => 'required',
        );
    protected $message = array(
        'resources_title.required' => 'valid_resources_title_required'
    );
}