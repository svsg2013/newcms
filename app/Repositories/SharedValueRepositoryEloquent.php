<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\NewsRepository;
use App\Models\SharedValue;
use App\Validators\SharedValueValidator;

/**
 * Class SharedValueRepositoryEloquent
 *
 * @package namespace App\Repositories;
 */
class SharedValueRepositoryEloquent extends BaseRepository implements SharedValueRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SharedValue::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
        return SharedValueValidator::class;
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
        $input['active'] = !empty($input['active']) ? 1 : 0;
        $input['is_top'] = !empty($input['is_top']) ? 1 : 0;
        $input['publish_at'] = !empty($input['publish_at']) ? cvDbTime($input['publish_at'], PHP_DATE, DB_DATE) : date("Y-m-d");

        $achievements = $this->model->create($input);

        if (!empty($input['metadata'])) {
            $achievements->metaCreateOrUpdate($input['metadata']);
        }

        $achievements->updateSlugTranslation();

        return $achievements;
    }

    public function update(array $input, $id)
    {
        $achievements = $this->model->findOrFail($id);

        $input['active'] = !empty($input['active']) ? 1 : 0;
        $input['is_top'] = !empty($input['is_top']) ? 1 : 0;
        $input['publish_at'] = !empty($input['publish_at']) ? cvDbTime($input['publish_at'], PHP_DATE, DB_DATE) : date("Y-m-d");

        $achievements->update($input);

        if (!empty($input['metadata'])) {
            $achievements->metaCreateOrUpdate($input['metadata']);
        }

        $achievements->updateSlugTranslation();

        return $achievements;
    }

    public function delete($id)
    {
        $achievements = $this->model->findOrFail($id);

        $achievements->meta()->delete();

        $achievements->delete();

        return true;
    }

    public function findBySlug($slug)
    {
        $locale = \App::getLocale();
        $model = $this->model->active()
            ->requiredTranslation()
            ->whereTranslation('slug', $slug, $locale)
            ->with('translations')
            ->firstOrFail();
        return $model;
    }

    public function topSharedValue($limit = 0, $is_top = false)
    {
        $model = $this->model->select('*')->active()
            ->requiredTranslation()
            ->withTranslation();

        if ($is_top) {
            $model->top();
        }

        if (!empty($limit)) {
            $model->limit($limit);
        }

        return $model->orderBy('publish_at', 'desc')->get();
    }
}
