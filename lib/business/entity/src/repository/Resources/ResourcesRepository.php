<?php namespace Business\Entity\Repository\Resources;

use App\Resources;
use Business\Entity\Lib\BasicEntity;
use Business\Entity\Repository\RepositoryInterface;
use Exception;

class ResourcesRepository extends BasicEntity implements RepositoryInterface {

    protected $table ='resources';

    protected $primaryKey;

    protected $fillable;

    protected $hidden;

    protected $field_lang = 'resources_lang_code';

    /**
     * ResourcesRepository constructor.
     */
    public function __construct()
    {
        $user = new Resources();
        $this->fillable = $user->getFillable();
        $this->hidden = $user->getHidden();
        $this->primaryKey = $user->getKeyName('primaryKey');
        array_push( $this->fillable,$this->primaryKey);
    }

    /**
     * @param null $pagin
     * @param null $lang
     * @return bool|\Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Support\Collection|mixed
     */
    public function all($pagin = null,$lang = null)
    {
        return  $this->findAll($pagin,$lang);
    }

    /**
     * @param $id
     * @return bool|\Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|mixed|null|object
     */
    public function find($id)
    {
        return  $this->findOnebyId($id);
    }

    /**
     * @param $data
     * @return bool|mixed
     */
    public function create($data)
    {
        try
        {
            $model = $this->UploadResource($data,'images');
            if($model)
            {
                return true;
            }
            return false;
        }
        catch (Exception $e)
        {
            $this->error = $e->getMessage();
            return false;
        }
    }

    /**
     * @param $data
     * @return bool|mixed
     */
    public function update($data)
    {
        try
        {
            $this->id = $data[$this->primaryKey];
            $model = $this->CreateOrUpdate($data);
            if($model)
            {
                return true;
            }
            return false;
        }
        catch (Exception $e)
        {
            $this->error = $e->getMessage();
            return false;
        }
    }

    /**
     * @param null $pagin
     * @param null $lang
     * @return bool|\Illuminate\Support\Collection|mixed
     */
    public function allTrash($pagin = null, $lang = null)
    {
        return  $this->findAllTrash($pagin, $lang = null);
    }
    public function trash($id, $trash = true)
    {
        try
        {
            $this->id = $id;
            $model = $this->TrashOrRecover($id , $trash);
            if($model)
            {
                return true;
            }
            return false;
        }
        catch (Exception $e)
        {
            $this->error = $e->getMessage();
            return false;
        }
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function delete($id)
    {
        try
        {
            $this->id = $id;
            $arrID = [$id];
            $model = $this->DeleteMutilRow($arrID);
            if($model)
            {
                return true;
            }
            return false;
        }
        catch (Exception $e)
        {
            $this->error = $e->getMessage();
            return false;
        }
    }

    /**
     * @return mixed
     */
    public function withErrors()
    {
        if( $this->error !=null)
        {
            $path = storage_path('logs/log.txt');
            $totalLine = count(file($path));
            $cotent = "\r\n #". $totalLine . ' \error: '. $this->error .' at time /t:' . now();
            $this->WriteLog($path,$cotent);
        }
        return $this->error;
    }
}