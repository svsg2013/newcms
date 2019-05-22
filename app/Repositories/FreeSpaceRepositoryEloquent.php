<?php

namespace App\Repositories;

use App\Models\FreeSpace;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\FreeSpaceRepository;

/**
 * Class Productfree_spaceRepositoryEloquent
 *
 * @package namespace App\Repositories;
 */
class FreeSpaceRepositoryEloquent extends BaseRepository implements FreeSpaceRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return FreeSpace::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
        //
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function byParent($parent_id)
    {
        $model = $this->model->select('*')
            ->where('parent_id', $parent_id)
            ->withTranslation()
            ->orderBy('position', 'asc')
            ->orderBy('id', 'asc')
            ->get();
        return $model;
    }

    public function arrTree($parent_id)
    {
        $result = $this->byParent($parent_id);
        foreach ($result as $rs) {
            $rs->trees = $this->arrTree($rs->id);
        }
        return $result;
    }

    public function create(array $input)
    {
        $input['parent_id'] = $input['free_space_id'];
        unset($input['free_space_id']);

        $input['level'] = 0;
        if (!empty($input['parent_id'])) {
            $parent = $this->model->findOrFail($input['parent_id']);
            $input['level'] = $parent->level + 1;
        }

        $model = $this->model->create($input);

        return $model;
    }

    public function update(array $input, $id)
    {
        $model = $this->model->findOrFail($id);

        $input['parent_id'] = $input['free_space_id'];
        unset($input['free_space_id']);

        $input['level'] = 0;
        if (!empty($input['parent_id'])) {
            $parent = $this->model->findOrFail($input['parent_id']);
            $input['level'] = $parent->level + 1;
        }

        $model->update($input);

        return $model;
    }

    public function delete($id)
    {
        $model = $this->model->findOrFail($id);

        // Remove child categories
        foreach ($model->children as $child) {
            $this->delete($child->id);
        }

        $model->delete();

        return true;
    }

    public function allChildrenIds(&$array, $parent_id)
    {
        $a = $this->model->where('parent_id', $parent_id)->pluck('id')->toArray();
        foreach ($a as $key => $value) {
            $array[] = $value;
            $this->allChildrenIds($array, $value);
        }
    }

    public function sort($positions)
    {
        $arr = explode('&', $positions);
        if ($arr && count($arr)) {
            for ($i = 0; $i < count($arr); $i++) {
                $_arr = explode('=', $arr[$i]);
                $this->model->where('id', $_arr[0])->update(['position' => $_arr[1]]);
            }
        }
    }
}
