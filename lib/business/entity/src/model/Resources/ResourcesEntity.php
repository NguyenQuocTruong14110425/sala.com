<?php namespace Business\Entity\Resources;

use Business\Entity\AbstractEntity;
use Business\Entity\Repository\Resources\ResourcesRepository;
use Business\Entity\EntityInterface;
use Business\Entity\Validation\Resources\ResourcesCreateValidator;
use Business\Entity\Validation\Resources\ResourcesUpdateValidator;

class ResourcesEntity extends AbstractEntity implements EntityInterface {

    /**
     * @var ResourcesRepository
     */
    protected $repository;

    /**
     * @var ResourcesCreateValidator
     */
    protected $createValidator;

    /**
     * @var ResourcesUpdateValidator
     */
    protected $updateValidator;

    /**
     * @var
     */
    protected $errors;

    /**
     * ResourcesEntity constructor.
     * @param ResourcesRepository $repository
     * @param ResourcesCreateValidator $createValidator
     * @param ResourcesUpdateValidator $updateValidator
     */
    public function __construct(ResourcesRepository $repository, ResourcesCreateValidator $createValidator, ResourcesUpdateValidator $updateValidator)
    {
        $this->repository = $repository;
        $this->createValidator = $createValidator;
        $this->updateValidator = $updateValidator;
    }

}