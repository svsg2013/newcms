<?php
function restSuccess($message = "Success", $result = [], $code = 200)
{
    $arr = [
        "status" => true,
        "status_code" => $code,
        "message" => $message,
    ];
    if (!empty($result)) {
        $arr["result"] = $result;
    }
    return response()->json($arr, $code);
}

function restFail($message = "Error", $code = 422, $errors = [])
{
    $arr = [
        "status" => false,
        "status_code" => $code,
        "message" => $message
    ];
    if (!empty($errors)) {
        $arr["errors"] = $errors;
    }
    return response()->json($arr, $code);
}

function randStrGen($len = 7)
{
    $result = "";
    $chars = "1QAZXSW23EDCVFR45TGBNHY67UJMKI89OLP0";
    $charArray = str_split($chars);
    for ($i = 0; $i < $len; $i++) {
        $randItem = array_rand($charArray);
        $result .= "" . $charArray[$randItem];
    }
    return $result;
}

function assetStorage($path, $type = "full", $multi = false, $key = "medium")
{
    if (empty($path)) {
        return null;
    }
    if ($type === "storage" || $type === "full") {
        $path = "/storage/{$path}";
    }
    if ($type === "full") {
        $path = asset($path);
    }
    if ($multi) {
        $arr = explode("/", $path);

        $file_name = $arr[count($arr) - 1];
        unset($arr[count($arr) - 1]);

        $new_path = implode("/", $arr);

        $arr_path = [
            "small" => $new_path . "/small/" . $file_name,
            "medium" => $new_path . "/medium/" . $file_name,
            "large" => $new_path . "/large/" . $file_name,
            "full" => $new_path . "/" . $file_name,
        ];

        if ($key && !empty($arr_path[$key])) {
            return $arr_path[$key];
        }
        return $arr_path;
    }

    return $path;
}

function currentPageMenu($url, $class = "active")
{
    if (!is_array($url)) {
        $check = request()->is($url);
        return $check ? $class : "";
    } else {
        foreach ($url as $key => $value) {
            if (request()->is($value)) {
                return $class;
            }
        }
    }
    return "";
}

function currentRouteMenu($route, $class = "active")
{
    if (!is_array($route)) {
        $check = request()->routeIs($route);
        return $check ? $class : "";
    } else {
        foreach ($route as $key => $value) {
            if (request()->routeIs($route)) {
                return $class;
            }
        }
    }
    return "";
}

//---------add class curent-communication-------
function isCurrentPageComunicate($url, $class = "current")
{
    $url = array(
        'communication',
        'communication/*',
        'truyen-thong/*'
    );

    if (!is_array($url)) {
        $check = request()->is($url);
        return $check ? $class : "";
    } else {
        foreach ($url as $key => $value) {
            if (request()->is($value)) {
                return $class;
            }
        }
    }
    return "";
}

//---------add class curent-about-------
function isCurrentPageAbout($url, $class = "current")
{
    $url = array(
        'gioi-thieu-chung',
        'cac-co-dong',
        'cac-giai-doan-phat-trien',
        'co-cau-to-chuc',
        'giai-thuong-va-danh-hieu',
        'achievements',
        'organizational-structure',
        'history-and-development',
        'shareholders',
        'overview'
    );
    if (!is_array($url)) {
        $check = request()->is($url);
        return $check ? $class : "";
    } else {
        foreach ($url as $key => $value) {
            if (request()->is($value)) {
                return $class;
            }
        }
    }
    return "";
}

//---------add class current products-------
function isCurrentPageProuduct($url, $class = "current")
{
    $url = array(
        'san-pham', 'san-pham/*',
        'products', 'products/*'
    );

    if (!is_array($url)) {
        $check = request()->is($url);
        return $check ? $class : "";
    } else {
        foreach ($url as $key => $value) {
            if (request()->is($value)) {
                return $class;
            }
        }
    }
    return "";
}

//---------add class curent-tu-van-dau-tu-------
function isCurrentPageCounsulting($url, $class = "current")
{
    $url = array(
        'tu-van-dau-tu', 'consulting',
        'uu-dai-dau-tu', 'investment-incentives',
        'dich-vu-mot-cua', 'service-one-gate',
        'thu-tuc-truoc-dau-tu', 'before-investment',
        'thu-tuc-sau-dau-tu', 'after-investment',
        'tai-lieu-tu-van', 'consultancy-materials',
        'quy-dinh-quy-che', 'regulations',
        'cap-nhat-tai-lieu-phap-ly', 'legal-documents',
        'phat-trien-ben-vung', 'sustainable-development',
        'ha-tang-ky-thuat', 'technical-infrastructure',
        'ha-tang-xa-hoi', 'social-infrastructure',
        'dat-giu-cho', 'reservation-register',
        'dang-ky-tham-quan', 'visit-registration',
        'cau-hoi-thuong-gap', 'faqs'
    );

    if (!is_array($url)) {
        $check = request()->is($url);
        return $check ? $class : "";
    } else {
        foreach ($url as $key => $value) {
            if (request()->is($value)) {
                return $class;
            }
        }
    }
    return "";
}

function cvDbTime($date, $from = DB_DATE, $to = PHP_DATE)
{
    return $date ? \Carbon\Carbon::createFromFormat($from, $date)->format($to) : null;
}

function resourceAdmin($prefix, $controller, $name, $permission = null, array $except = ['show'])
{
    if ($permission === null) {
        $permission = $name;
    }
    Route::group(['prefix' => $prefix], function () use ($controller, $name, $permission, $except) {
        if (!in_array('index', $except)) {
            Route::get('/', "{$controller}@index")->name("admin.{$name}.index")->middleware("permission:admin.{$permission}.index");
        }

        if (!in_array('datatable', $except)) {
            Route::get('datatable', "{$controller}@datatable")->name("admin.{$name}.datatable")->middleware("permission:admin.{$permission}.index");
        }

        if (!in_array('show', $except)) {
            Route::get('{id}', "{$controller}@show")->name("admin.{$name}.show")->middleware("permission:admin.{$permission}.show");
        }

        if (!in_array('create', $except)) {
            Route::get('create', "{$controller}@create")->name("admin.{$name}.create")->middleware("permission:admin.{$permission}.create");
            Route::post('/', "{$controller}@store")->name("admin.{$name}.store")->middleware("permission:admin.{$permission}.create");
        }

        if (!in_array('edit', $except)) {
            Route::get('{id}/edit', "{$controller}@edit")->name("admin.{$name}.edit")->middleware("permission:admin.{$permission}.edit");
            Route::put('{id}', "{$controller}@update")->name("admin.{$name}.update")->middleware("permission:admin.{$permission}.edit");
        }

        if (!in_array('destroy', $except)) {
            Route::delete('{id}', "{$controller}@destroy")->name("admin.{$name}.destroy")->middleware("permission:admin.{$permission}.destroy");
        }
    });
}

function resourceElink($prefix, $controller, $name, array $except = ['show'])
{
    Route::group(['prefix' => $prefix], function () use ($controller, $name, $except) {
        if (!in_array('index', $except)) {
            Route::get('/', "{$controller}@index")->name("elink.{$name}.index");
        }

        if (!in_array('datatable', $except)) {
            Route::get('datatable', "{$controller}@datatable")->name("elink.{$name}.datatable");
        }

        if (!in_array('show', $except)) {
            Route::get('{id}', "{$controller}@show")->name("elink.{$name}.show");
        }

        if (!in_array('create', $except)) {
            Route::get('create', "{$controller}@create")->name("elink.{$name}.create");
            Route::post('/', "{$controller}@store")->name("elink.{$name}.store");
        }

        if (!in_array('edit', $except)) {
            Route::get('{id}/edit', "{$controller}@edit")->name("elink.{$name}.edit");
            Route::put('{id}', "{$controller}@update")->name("elink.{$name}.update");
        }

        if (!in_array('destroy', $except)) {
            Route::delete('{id}', "{$controller}@destroy")->name("elink.{$name}.destroy");
        }
    });
}

function cutString($str, $length = 15, $end = '...')
{
    $minword = 3;
    $sub = '';
    $len = 0;
    foreach (explode(' ', $str) as $word) {
        $part = (($sub != '') ? ' ' : '') . $word;
        $sub .= $part;
        $len += strlen($part);
        if (strlen($word) > $minword && strlen($sub) >= $length) {
            break;
        }
    }
    return $sub . (($len < strlen($str)) ? $end : '');
}

function getIndexSearch()
{
    $locale = \App::getLocale();
    $segment = request()->segment(1);
    if ($segment === $locale) {
        $segment = request()->segment(2);
    }

    $arr = [
        'products',
        'san-pham',
        'news',
        'tin-tuc',
        'vacancy-list',
        'danh-sach-tuyen-dung'
    ];
    if (in_array($segment, $arr)) {
        return $segment;
    }
    return null;
}

function removeAllConfig()
{
    \Artisan::call('view:clear');
    \Artisan::call('cache:clear');
    \Artisan::call('config:clear');
}

function fileNameFromPath($path, $name = true)
{
    if (!$path) {
        return null;
    }
    $string = str_replace('.blade.php', '', $path);

    if (!$name) {
        return $string;
    }

    $string = str_replace('-', ' ', $string);

    return ucwords($string);
}

function getThumbnail($img_path, $width, $height, $type = "fit")
{
    return app('App\Http\Controllers\ImageController')->getImageThumbnail($img_path, $width, $height, $type);
}


function jsonContent($string)
{
    if (is_numeric($string)) {
        return $string;
    }
    $data = @json_decode($string);
    return (json_last_error() === JSON_ERROR_NONE) ? ((array)$data) : $string;
}

function get_youtube_id($url)
{
    $matches = null;
    preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $matches);
    return count($matches) == 2 ? $matches[1] : null;
}

function is_home_page()
{
    $route_name = Illuminate\Support\Facades\Route::currentRouteName();
    return $route_name == 'page.home';
}

function check_checked_input($array, $value)
{
    if (!is_array($array)) return '';
    return in_array($value, $array) ? 'checked' : '';
}

function summary($source_string, $max_len=30)
{
    $source_string =  strip_tags($source_string);
    if(strlen($source_string)<$max_len) return $source_string;
    $html = substr($source_string,0,$max_len);
    $html = substr($html,0,strrpos($html,' '));
    return $html.'...';
}

function format_show_time($input_date, $output_date = 'd F Y')
{
    $date = \Carbon\Carbon::parse($input_date);
    $month = $date->month;
    $month = trans("calendar_month.$month");
    return "{$date->day} {$month} {$date->year}";
}

function transLang($url, $locale, $is_sub_page)
{
    $params = \Illuminate\Support\Facades\Request::query();
    if($is_sub_page)
        $url = \App\Helper\TranslateUrl::getLink($locale);

    $http_query = http_build_query($params);
    if($http_query)
        return url($url).'?'.$http_query;
    return url($url);
}

function sendMail(\App\Mail\EMail $email)
{
    $host = env('MAIL_HOST','smtp.gmail.com');
    $port = env('MAIL_PORT',587);
    $username = env('MAIL_USERNAME','hiennv@3forcom.com');

    $password = env('MAIL_PASSWORD','');

    $encryption = env('MAIL_ENCRYPTION','tls');

    $mail_from = [
        env('MAIL_FROM_ADDRESS','hiennv@3forcom.com') => env('MAIL_FROM_NAME','Demo')
    ];

    $html = View::make($email->body['view'], $email->body['content'])->render();

    $transport = (new Swift_SmtpTransport($host, $port, $encryption))
        ->setUsername($username)
        ->setPassword($password);

    $mailer = new Swift_Mailer($transport);

    $message = (new Swift_Message('Subscribe notification'))
        ->setFrom($mail_from)
        ->setTo([$email->receiver_address  => $email->receiver_name])
        ->setBody($html, 'text/html');

    try{
        return $mailer->send($message);
    }catch (\Swift_SwiftException $ex){
        dd($ex->getMessage());
    }
    return false;
}

function replacement($string, array $placeholders)
{
    $resultString = $string;
    foreach($placeholders as $key => $value) {
        $resultString = str_replace('[' . $key . ']' , trim($value), $resultString, $i);
    }
    return $resultString;
}

function htrans($array_lang = [])
{
    $locale = \App::getLocale();
    if(is_array($array_lang) && isset($array_lang[$locale]))
        return $array_lang[$locale];
    return '';
}

function getAssetResourceVersion($url)
{
    return asset($url).'?v='.env('RESOURCE_VERSION',1.0);
}

function getPageUrlByCode($code, $query = [])
{
    $locale = \App::getLocale();
    $lang = ($locale == 'en') ? '' : $locale;
    $page = \App\Models\Page::where('code', $code)->first();
    if ($page)
    {
        $qb = '';
        if(count($query)) $qb = '?'.http_build_query($query);
        return "$lang/$page->slug$qb";
    }
    return null;
}


function getPageUrlByPageBlockCode($code)
{
    $locale = \App::getLocale();
    $lang = ($locale == 'en') ? '' : $locale;
    $page = \App\Models\PageBlock::where('code', $code)->first();
    if ($page)
        return "$lang/".$page->page->slug;
    return null;
}

function Date2String($inputDate, $formatOut = 'd/m/Y')
{
    return \Carbon\Carbon::parse($inputDate)->format($formatOut);
}

////////PARTNER
function getTypePartner($string){
    return array_search($string, config('constants.partner'));
}

function words($value, $words = 100, $end = '...')
{
    return \Illuminate\Support\Str::words($value, $words, $end);
}

function convertStringToNumber($string)
{
    $number = str_replace(',', '', $string);
    return (int)$number;
}

function convertStringPointToNumber($string)
{
    $number = str_replace('.', '', $string);
    return (int)$number;
}

function getLongLatFromAddress($address)
{
    $address = str_slug($address, '+');
    $geocode = file_get_contents('https://maps.google.com/maps/api/geocode/json?key='. config('services.google.map_key') .'&address='.$address.'&sensor=false');
    $output= json_decode($geocode);

    $result = [
        'lat' => '',
        'lng' => ''
    ];
    if(!empty($output)
        && !empty($output->results[0]) 
        && !empty($output->results[0]->geometry) 
        && !empty($output->results[0]->geometry->location)
    ) {
        $result['lat'] = $output->results[0]->geometry->location->lat;
        $result['lng'] = $output->results[0]->geometry->location->lng;
    }

    return $result;
}

function getDataApiAddress($url, $pageSize)
{
    // Make Post Fields Array
    $data = [
        'msgType' => 'STORE_NEAREST_MSG',
        'pageSize' => $pageSize
    ];

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30000,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_HTTPHEADER => array(
            // Set here requred headers
            "accept: */*",
            "accept-language: en-US,en;q=0.8",
            "content-type: application/json",
        ),
    ));

    $response = curl_exec($curl);

    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        return json_decode($response, true);
    }
}

/* 
    Công thức tính khoản tiền trả hàng tháng
    
    $c: Tổng số tiền vay
    $r: Lãi suất hàng tháng
    $duration: Số tháng vay
    $x: Hệ số công thức
*/
function calculatorLoan($c, $r, $duration, $x) {
    $mauso = 1 - 1 / (pow((1 + ($r / 12) * 0.01), $duration));
    $result = $x * $c * ((($r / 12) * 0.01) / $mauso);
    $result = (int)round($result,-3);
    
    return $result;
}

// Get Url Menu Item
function getUrlHtmlItem($type, $menu_item_id)
{
    $menu_item = \App\Models\MenuItem::find($menu_item_id);

    switch ($type) {
        case 'custom_link':
            $url = $menu_item->url;
            break;
        case 'page':
            $data = \App\Models\Page::find($menu_item->referencer_id);
            $url = route('page.show', $data->slug);
            break;
        default:
            $data = \DB::table($type)->where('id', $menu_item->referencer_id)->first();
            // Do something
            $url = '';
    }

    return $url;
}

// Get header html from menu item
function getHeaderHtml() {
    $tree = \App\Models\MenuItem::tree();
    return \App\Models\MenuItem::getHeaderMenuHtml($tree);
}

// Get footer html from menu item
function getFooterHtml() {
    $tree = \App\Models\MenuItem::tree(0, 'footer');
    return \App\Models\MenuItem::getFooterMenuHtml($tree);
}

// Get token api
function getAPi() {
    
    $ch = curl_init();

    $domain_name = 'https://api.easycredit.vn/api/uaa/oauth/token';

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_URL, $domain_name);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
    curl_setopt($ch, CURLOPT_POST, 1);

    $headers = array();
    $headers[] = "Authorization: Basic dGZvcmNvbV9jbGllbnQ6ZlBxM015SmdoTTNrNm9xcjEyYWs=";
    $headers[] = "Cache-Control: no-cache";
    $headers[] = "Content-Type: application/x-www-form-urlencoded";
    $headers[] = "Postman-Token: 80fa0c46-024e-7d6b-28f3-873d211641c4";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);

    return json_decode($result, true);
}

// Post check lead
function checkLead($token, $inputCheckLead)
{

    $ch = curl_init();

    $post_fields = json_encode($inputCheckLead);
    $domain_name = 'https://api.easycredit.vn/api/leadServices/v1/leadEligibilityChecking';

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_URL, $domain_name);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
    curl_setopt($ch, CURLOPT_POST, 1);

    $headers = array();
    $headers[] = "Authorization: ". $token['token_type'] ." ". $token['access_token'] ."";
    $headers[] = "Content-Type: application/json";
    $headers[] = "Accept: application/json";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close ($ch);

    return json_decode($result, true);
}

function sendFullLead($token, $inputApi)
{

    $ch = curl_init();

    $post_fields = json_encode($inputApi);
    $domain_name = 'https://api.easycredit.vn/api/leadServices/v1/eligibleLeadInfo';

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_URL, $domain_name);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
    curl_setopt($ch, CURLOPT_POST, 1);

    $headers = array();
    $headers[] = "Authorization: ". $token['token_type'] ." ". $token['access_token'] ."";
    $headers[] = "Content-Type: application/json";
    $headers[] = "Accept: application/json";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close ($ch);

    return json_decode($result, true);
}

function selectFastData($table_name)
{
    $locale = \App::getLocale();

    $sql = "SELECT {$table_name}.id as id, {$table_name}_translation.name as name
            FROM {$table_name}
            INNER JOIN {$table_name}_translation
            ON {$table_name}.id = {$table_name}_translation.{$table_name}_id
            AND {$table_name}_translation.locale = '{$locale}'
            GROUP BY {$table_name}.id
            ";

    return \DB::select($sql);
}

// $contents .= 'Thời gian hiện tại: ' . rebuild_date('H:i d/m/Y' ) . '<br />';
// $contents .= 'Thứ hiện tại: ' . rebuild_date('l' ) . '<br />';
// $contents .= 'Tháng hiện tại: ' . rebuild_date('F' ) . '<br />';
// $time = 1444954852;
// $contents .= '<br /><br />Timestamp: ' . $time . '<br />';
// $contents .= 'Thời gian: ' . rebuild_date('H:i d/m/Y', $time ) . '<br />';
// $contents .= 'Thứ: ' . rebuild_date('l', $time ) . '<br />';
// $contents .= 'Tháng: ' . rebuild_date('F', $time ) . '<br />';
// echo $contents;
function rebuild_date( $format, $time = 0 )
{
    if ( ! $time ) $time = time();

	$lang = array();
	$lang['sun'] = 'CN';
	$lang['mon'] = 'T2';
	$lang['tue'] = 'T3';
	$lang['wed'] = 'T4';
	$lang['thu'] = 'T5';
	$lang['fri'] = 'T6';
	$lang['sat'] = 'T7';
	$lang['sunday'] = 'Chủ nhật';
	$lang['monday'] = 'Thứ hai';
	$lang['tuesday'] = 'Thứ ba';
	$lang['wednesday'] = 'Thứ tư';
	$lang['thursday'] = 'Thứ năm';
	$lang['friday'] = 'Thứ sáu';
	$lang['saturday'] = 'Thứ bảy';
	$lang['january'] = 'Tháng Một';
	$lang['february'] = 'Tháng Hai';
	$lang['march'] = 'Tháng Ba';
	$lang['april'] = 'Tháng Tư';
	$lang['may'] = 'Tháng Năm';
	$lang['june'] = 'Tháng Sáu';
	$lang['july'] = 'Tháng Bảy';
	$lang['august'] = 'Tháng Tám';
	$lang['september'] = 'Tháng Chín';
	$lang['october'] = 'Tháng Mười';
	$lang['november'] = 'Tháng mười một';
	$lang['december'] = 'Tháng mười hai';
	$lang['jan'] = 'T01';
	$lang['feb'] = 'T02';
	$lang['mar'] = 'T03';
	$lang['apr'] = 'T04';
	$lang['may2'] = 'T05';
	$lang['jun'] = 'T06';
	$lang['jul'] = 'T07';
	$lang['aug'] = 'T08';
	$lang['sep'] = 'T09';
	$lang['oct'] = 'T10';
	$lang['nov'] = 'T11';
	$lang['dec'] = 'T12';

    $format = str_replace( "r", "D, d M Y H:i:s O", $format );
    $format = str_replace( array( "D", "M" ), array( "[D]", "[M]" ), $format );
    $return = date( $format, $time );

    $replaces = array(
        '/\[Sun\](\W|$)/' => $lang['sun'] . "$1",
        '/\[Mon\](\W|$)/' => $lang['mon'] . "$1",
        '/\[Tue\](\W|$)/' => $lang['tue'] . "$1",
        '/\[Wed\](\W|$)/' => $lang['wed'] . "$1",
        '/\[Thu\](\W|$)/' => $lang['thu'] . "$1",
        '/\[Fri\](\W|$)/' => $lang['fri'] . "$1",
        '/\[Sat\](\W|$)/' => $lang['sat'] . "$1",
        '/\[Jan\](\W|$)/' => $lang['jan'] . "$1",
        '/\[Feb\](\W|$)/' => $lang['feb'] . "$1",
        '/\[Mar\](\W|$)/' => $lang['mar'] . "$1",
        '/\[Apr\](\W|$)/' => $lang['apr'] . "$1",
        '/\[May\](\W|$)/' => $lang['may2'] . "$1",
        '/\[Jun\](\W|$)/' => $lang['jun'] . "$1",
        '/\[Jul\](\W|$)/' => $lang['jul'] . "$1",
        '/\[Aug\](\W|$)/' => $lang['aug'] . "$1",
        '/\[Sep\](\W|$)/' => $lang['sep'] . "$1",
        '/\[Oct\](\W|$)/' => $lang['oct'] . "$1",
        '/\[Nov\](\W|$)/' => $lang['nov'] . "$1",
        '/\[Dec\](\W|$)/' => $lang['dec'] . "$1",
        '/Sunday(\W|$)/' => $lang['sunday'] . "$1",
        '/Monday(\W|$)/' => $lang['monday'] . "$1",
        '/Tuesday(\W|$)/' => $lang['tuesday'] . "$1",
        '/Wednesday(\W|$)/' => $lang['wednesday'] . "$1",
        '/Thursday(\W|$)/' => $lang['thursday'] . "$1",
        '/Friday(\W|$)/' => $lang['friday'] . "$1",
        '/Saturday(\W|$)/' => $lang['saturday'] . "$1",
        '/January(\W|$)/' => $lang['january'] . "$1",
        '/February(\W|$)/' => $lang['february'] . "$1",
        '/March(\W|$)/' => $lang['march'] . "$1",
        '/April(\W|$)/' => $lang['april'] . "$1",
        '/May(\W|$)/' => $lang['may'] . "$1",
        '/June(\W|$)/' => $lang['june'] . "$1",
        '/July(\W|$)/' => $lang['july'] . "$1",
        '/August(\W|$)/' => $lang['august'] . "$1",
        '/September(\W|$)/' => $lang['september'] . "$1",
        '/October(\W|$)/' => $lang['october'] . "$1",
        '/November(\W|$)/' => $lang['november'] . "$1",
        '/December(\W|$)/' => $lang['december'] . "$1" );

    return preg_replace( array_keys( $replaces ), array_values( $replaces ), $return );
}

function strip_block_tags($string, $force = '')
{
    $string = (string)$string;
    $list = '<strong><span><a><small><em><br><b><i><u>';
    $list = str_replace($force, '', $list);
    return strip_tags($string, $list);
}