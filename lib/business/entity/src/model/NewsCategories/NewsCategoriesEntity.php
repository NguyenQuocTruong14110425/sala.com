<?php namespace Business\Entity\NewsCategories;

use Business\Entity\AbstractEntity;
use Business\Entity\Repository\NewsCategories\NewsCategoriesRepository;
use Business\Entity\EntityInterface;
use Business\Entity\Validation\NewsCategories\NewsCategoriesCreateValidator;
use Business\Entity\Validation\NewsCategories\NewsCategoriesUpdateValidator;

class NewsCategoriesEntity extends AbstractEntity implements EntityInterface {

    /**
     * @var NewsRepository
     */
    protected $repository;

    /**
     * @var NewsCreateValidator
     */
    protected $createValidator;

    /**
     * @var NewsUpdateValidator
     */
    protected $updateValidator;

    /**
     * @var
     */
    protected $errors;

    /**
     * NewsCategoriesEntity constructor.
     * @param NewsCategoriesRepository $repository
     * @param NewsCategoriesCreateValidator $createValidator
     * @param NewsCategoriesUpdateValidator $updateValidator
     */
    public function __construct(NewsCategoriesRepository $repository, NewsCategoriesCreateValidator $createValidator, NewsCategoriesUpdateValidator $updateValidator)
    {
        $this->repository = $repository;
        $this->createValidator = $createValidator;
        $this->updateValidator = $updateValidator;
    }

}