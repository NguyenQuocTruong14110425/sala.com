<?php namespace Business\Entity\News;

use Business\Entity\AbstractEntity;
use Business\Entity\Repository\News\NewsRepository;
use Business\Entity\EntityInterface;
use Business\Entity\Validation\News\NewsCreateValidator;
use Business\Entity\Validation\News\NewsUpdateValidator;

class NewsEntity extends AbstractEntity implements EntityInterface {

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
     * NewsEntity constructor.
     * @param NewsRepository $repository
     * @param NewsCreateValidator $createValidator
     * @param NewsUpdateValidator $updateValidator
     */
    public function __construct(NewsRepository $repository, NewsCreateValidator $createValidator, NewsUpdateValidator $updateValidator)
    {
        $this->repository = $repository;
        $this->createValidator = $createValidator;
        $this->updateValidator = $updateValidator;
    }

}