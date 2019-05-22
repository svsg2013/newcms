<?php

namespace App\Repositories;

use App\Traits\UploadPhotoTrait;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Image360Repository;
use App\Models\Image360;
use App\Validators\Image360Validator;

/**
 * Class Image360RepositoryEloquent
 * @package namespace App\Repositories;
 */
class Image360RepositoryEloquent extends BaseRepository implements Image360Repository
{
    use UploadPhotoTrait;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Image360::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return Image360Validator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function datatable()
    {
        return $this->model->select('*')->where('parent_id', 0)->withTranslation();
    }

    public function store(array $input, $children = false)
    {
        if(empty($input['image360_avatar']) && !empty($input['image360_image'])){
            $input['image360_avatar'] = $input['image360_image'];
        }

        // Save photo
        if (!empty($input['image360_image'])) {
            $config = config('files.image360_image');
            if($children){
                $config['base_64'] = false;
            }
            $info = $this->storePhoto($input['image360_image'], $config);

            $input['image'] = $info['full_path'];
        }

        // Save photo
        if (!empty($input['image360_avatar'])) {
            $config = config('files.image360_avatar');
            if($children){
                $config['base_64'] = false;
            }

            $info = $this->storePhoto($input['image360_avatar'], $config);

            $input['avatar'] = $info['full_path'];
        }

        $model = $this->model->create($input);

        if (!empty($input['image360'])) {
            foreach ($input['image360'] as $key => $children) {
                if (!empty($children['image360_image'])) {
                    $children['parent_id'] = $model->id;
                    $this->store($children, true);
                }
            }
        }

        return $model;
    }

    public function update(array $input, $id)
    {
        $model = $this->model->findOrFail($id);

        if(empty($input['image360_avatar']) && !empty($input['image360_image'])){
            $input['image360_avatar'] = $input['image360_image'];
        }

        if (!empty($input['delete_image'])) {
            $this->destroySinglePhoto($input['delete_image']);
            $input['image'] = null;
        }

        if (!empty($input['delete_avatar'])) {
            $this->destroySinglePhoto($input['delete_avatar']);
            $input['avatar'] = null;
        }

        // Save photo
        if (!empty($input['image360_image'])) {
            $config = config('files.image360_image');

            $info = $this->storePhoto($input['image360_image'], $config);

            $input['image'] = $info['full_path'];
        }

        // Save photo
        if (!empty($input['image360_avatar'])) {
            $config = config('files.image360_avatar');

            $info = $this->storePhoto($input['image360_avatar'], $config);

            $input['avatar'] = $info['full_path'];
        }

        if (!empty($input['image360'])) {
            foreach ($input['image360'] as $key => $children) {
                if (!empty($children['image360_image'])) {
                    $children['parent_id'] = $model->id;
                    $this->store($children, true);
                }
            }
        }

        if (!empty($input['delete_image360'])) {
            foreach ($input['delete_image360'] as $key => $children) {
                $this->destroy($children, false);
            }
        }

        $model->update($input);

        return $model;
    }

    public function destroy($id, $children = true)
    {
        $model = $this->model->findOrFail($id);

        // Remove children
        if($children){
            foreach ($model->children as $rs) {
                $this->destroy($rs->id, false);
            }
        }

        if ($model->image) {
            $this->destroySinglePhoto($model->image);
        }

        if ($model->avatar) {
            $this->destroySinglePhoto($model->avatar);
        }

        //delete
        $model->delete();
    }

    public function image360(){
        return $this->model->select('*')
            ->where('parent_id', 0)
            ->with(['children'])
            ->withTranslation()->get();
    }
}
