<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CareerFormRepository;
use App\Models\CareerForm;
use App\Validators\CareerFormValidator;

/**
 * Class CareerFormRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CareerFormRepositoryEloquent extends BaseRepository implements CareerFormRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CareerForm::class;
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
    
}
