<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\AddressRepository;
use App\Models\City;
use App\Models\Address;
use App\Models\AddressCategory;
use App\Validators\AddressValidator;

/**
 * Class AddressRepositoryEloquent
 *
 * @package namespace App\Repositories;
 */
class AddressRepositoryEloquent extends BaseRepository implements AddressRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Address::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
        return AddressValidator::class;
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
        return $this->model->select('*')->orderBy('created_at', 'DESC')->withTranslation();
    }

    public function create(array $input)
    {
        $input['active'] = !empty($input['active']) ? 1 : 0;

        $address = $this->model->create($input);

        if (!empty($input['metadata'])) {
            $address->metaCreateOrUpdate($input['metadata']);
        }

        $address->updateSlugTranslation();

        return $address;
    }

    public function update(array $input, $id)
    {
        $address = $this->model->findOrFail($id);

        $input['active'] = !empty($input['active']) ? 1 : 0;
        
        $address->update($input);

        if (!empty($input['metadata'])) {
            $address->metaCreateOrUpdate($input['metadata']);
        }

        $address->updateSlugTranslation();

        return $address;
    }

    public function delete($id)
    {
        $address = $this->model->findOrFail($id);

        $address->meta()->delete();

        $address->delete();

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

    public function importExcel(array $input)
    {
        // Add category address
        foreach($input as $key => $value) {

            $data = [
                'en' => [
                    'name' => $value['area']
                ],
                'vi' => [
                    'name' => $value['area']
                ]
            ];
            $category_old = AddressCategory::whereTranslation('name', $value['area'])->first();
            if(count($category_old)) {
                $category_old->update($data);
                $category_old->updateSlugTranslation();
            } else {
                $category_new = AddressCategory::create($data);
                $category_new->updateSlugTranslation();
            }
        }
        
        // Add address
        foreach($input as $key => $value) {

            $city_id = !empty($city = City::whereTranslation('name', $value['city'])->first()) ? $city->id : null;
            $address_category_id = AddressCategory::whereTranslation('name', $value['area'])->first()->id;
            $latlng = getLongLatFromAddress($value['address']);

            $data = [
                'address_category_id' => $address_category_id,
                'active'    => 1,
                'city_id'   => $city_id,
                'postal'    => $value['postal'],
                'phone'     => $value['phone'],
                'fax'       => $value['fax'],
                'address'   => $value['address'],
                'lat'       => !empty($latlng['lat']) ? $latlng['lat'] : 0.0,
                'lng'       => !empty($latlng['lng']) ? $latlng['lng'] : 0.0,
                'en' => [
                    'name' => $value['name']
                ],
                'vi' => [
                    'name' => $value['name']
                ]
            ];

            $address_old = $this->model->where('address', $value['address'])->first();

            $this->createOrUpdate($address_old, $data);  
        }

        return true;
    }

    public function createOrUpdate($collection, $data)
    {
        if(count($collection)) {
            $collection->update($data);
            $collection->updateSlugTranslation();
        } else {
            $collection = $this->model->create($data);
            $collection->updateSlugTranslation();
        }
    }
}
