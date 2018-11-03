<?php namespace Business\Entity;

interface EntityInterface {

    /**
     * @param $pagin
     * @param $lang
     * @return mixed
     */
    public function all($pagin, $lang);

    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * @param array $input
     * @return mixed
     */
    public function create(array $input);

    /**
     * @param array $input
     * @return mixed
     */
    public function update(array $input);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @return mixed
     */
    public function allTrash($pagin, $lang);

    /**
     * @param $id
     * @return mixed
     */

    public function trash($id, $trash);

    /**
     * @return mixed
     */
    public function errors();

}