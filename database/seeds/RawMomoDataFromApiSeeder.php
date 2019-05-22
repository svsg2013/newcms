<?php

use Illuminate\Database\Seeder;

class RawMomoDataFromApiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $momo_cat = $this->addMomoCategory();

        $data = $this->getData();
        if(!empty($data) && !empty($data) && !empty($data['addresses'])) {
            foreach($data['addresses'] as $key => $value) {
                $value['ADDRESS']       = !empty($value['ADDRESS']) ? $value['ADDRESS'] : '';
                $value['WARD_NAME']     = !empty($value['WARD_NAME']) ? $value['WARD_NAME'] : '';
                $value['DISTRICT_NAME'] = !empty($value['DISTRICT_NAME']) ? $value['DISTRICT_NAME'] : '';
                $value['CITY_NAME']     = !empty($value['CITY_NAME']) ? $value['CITY_NAME'] : '';
                $value['CITY_ID']       = !empty($value['CITY_ID']) ? $value['CITY_ID'] : null;
                $value['HOME_PHONE']    = !empty($value['HOME_PHONE']) ? $value['HOME_PHONE'] : '';
                $value['LAT']           = !empty($value['LAT']) ? $value['LAT'] : 0.0;
                $value['LON']           = !empty($value['LON']) ? $value['LON'] : 0.0;
                $value['COMPANY_NAME']  = !empty($value['COMPANY_NAME']) ? $value['COMPANY_NAME'] : '';

                $address = $value['ADDRESS'].', '.$value['WARD_NAME'].', '.$value['DISTRICT_NAME'].', '.$value['CITY_NAME'];

                if(empty(\App\Models\Address::where('address', $address)->first())) {
                    $input = [
                        'address_category_id'   => $momo_cat->id,
                        'city_id'               => $value['CITY_ID'],
                        'phone'     => $value['HOME_PHONE'],
                        'address'   => $address,
                        'lat'       => $value['LAT'],
                        'lng'       => $value['LON'],
                        'active' => 1,
                        'vi' => [
                            'name'  => $value['COMPANY_NAME']
                        ]
                    ];

                    \App\Models\Address::create($input);
                }
            }
        }

        $this->command->info('==> Address table seeded!');
    }

    private function getData()
    {
        $data = [
            'msgType' => 'STORE_NEAREST_MSG',
            'currentLatitude' => 10.762622,
            'currentLongitude' => 106.660172,
            'radius'=> 40000,
            'pageSize' => 2000
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://momo.vn:4444/api/store-nearest");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_POST, 1);

        $headers = array();
        $headers[] = "Authorization: Basic Og==";
        $headers[] = "Postman-Token: 813c4308-5781-45c2-9239-636d72c1b1a6";
        $headers[] = "Cache-Control: no-cache";
        $headers[] = "Content-Type: application/x-www-form-urlencoded";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close ($ch);

        return json_decode($result, true);
    }

    private function addMomoCategory()
    {
        $locale = \App::getLocale();
        $momo = \App\Models\AddressCategory::whereTranslation('name', 'Momo', $locale)->first();

        if(empty($momo)) {
            $data = [
                'type' => '["PAYMENT_METHOD"]',
                'vi' => [
                    'name' => 'Momo'
                ]
            ];

            $momo = \App\Models\AddressCategory::create($data);
            $momo->updateSlugTranslation();
        }

        return $momo;
    }
}
