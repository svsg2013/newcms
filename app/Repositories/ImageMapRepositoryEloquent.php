<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ImageMapRepository;
use App\Models\ImageMap;
use App\Validators\ImageMapValidator;

/**
 * Class ImageMapRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ImageMapRepositoryEloquent extends BaseRepository implements ImageMapRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ImageMap::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
        return ImageMapValidator::class;
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
        return $this->model->select('*')->withTranslation();
    }

    public function create(array $input)
    {
        $model = $this->model->create($input);

        foreach ($input['area'] as $value){
            if(!empty($value['shape']) && !empty($value['coords'])){
                $model->areas()->create($value);
            }

        }
        return $model;
    }

    public function update(array $input, $id)
    {
        $model = $this->model->find($id);

        if(!empty($input['map'])){
            $model->update($input['map']);

            if(!empty($input['map']['area'])) {
                foreach ($input['map']['area'] as $value) {
                    if (!empty($value['shape']) && !empty($value['coords'])) {
                        $model->areas()->create($value);
                    }
                }
            }
        }

        if(!empty($input['old_areas'])){
            foreach ($input['old_areas'] as $key => $value){
                $area = $model->areas()->where('image_area.id', $key)->first();
                if($area){
                    $area->update($value);
                }

            }
        }

        if(!empty($input['delete_areas'])){
            $model->areas()->whereIn('image_area.id', $input['delete_areas'])->delete();
        }

        return $model;
    }

}
