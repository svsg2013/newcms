<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ElNewsRepository;
use App\Models\ElNews;
use App\Validators\ElNewsValidator;

/**
 * Class ElNewsRepositoryEloquent
 *
 * @package namespace App\Repositories;
 */
class ElNewsRepositoryEloquent extends BaseRepository implements ElNewsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ElNews::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
        return ElNewsValidator::class;
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
        return $this->model->select('*');
    }

    public function create(array $input)
    {
        $input['active'] = !empty($input['active']) ? 1 : 0;
        $input['is_top'] = !empty($input['is_top']) ? 1 : 0;
        $input['publish_at'] = !empty($input['publish_at']) ? cvDbTime($input['publish_at'], PHP_DATE, DB_DATE) : date("Y-m-d");

        $el_news = $this->model->create($input);

        return $el_news;
    }

    public function update(array $input, $id)
    {
        $el_news = $this->model->findOrFail($id);

        $input['active'] = !empty($input['active']) ? 1 : 0;
        $input['is_top'] = !empty($input['is_top']) ? 1 : 0;
        $input['publish_at'] = !empty($input['publish_at']) ? cvDbTime($input['publish_at'], PHP_DATE, DB_DATE) : date("Y-m-d");

        $el_news->update($input);

        return $el_news;
    }

    public function delete($id)
    {
        $el_news = $this->model->findOrFail($id);

        $el_news->delete();

        return true;
    }

    // function show ElNews in pagehome
    public function listElNews($limit = 0, $is_top = false)
    {
        $model = $this->model->active()->get();

        if ($is_top) {
            $model->orderBy('is_top', 'desc');
        }
        $model->orderBy('is_top', 'desc')
            ->orderBy('publish_at', 'desc');

        if ($limit) {
            return $model->limit($limit)
                ->get();
        }
        return $model->paginate(15);
    }

    public function topElNews($limit = 0, $is_top = false)
    {
        $model = $this->model->select('*')->active()->get();

        if ($is_top) {
            $model->orderBy('is_top', 'desc');
        }

        $model->orderBy('is_top', 'desc')
            ->orderBy('publish_at', 'desc')
            ->get();

        return $model->limit($limit)->get();
    }

}
