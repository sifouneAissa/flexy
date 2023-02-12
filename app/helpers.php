<?php


use Carbon\CarbonImmutable;
use Illuminate\Support\Carbon;

if (!function_exists('getLocales')) {

    function isRtl($lang)
    {
        return  in_array($lang,config("app.locales.rtl"));
    }
}

if (!function_exists('setIfString')) {

    function setIfString(&$request)
    {

        $header  = $request->header('Content-Type');
        if($header === "application/x-www-form-urlencoded") {
            $values = $request->all();
            $st = '';
            foreach ($values as $key => $v) {
                $st = $st . $key . $v;
            }
            $inputs = json_decode($st, true);
            $request->replace($inputs);
        }
    }
}




if (!function_exists('getSetting')) {

    function getSetting($code)
    {
        return  \App\Models\Setting::query()->where('code',$code)->first();
    }
}

if (!function_exists('getDateWeekSE')) {

    function getDateWeekSE($position) {
        $start = CarbonImmutable::parse("$position Monday of this month");

        return ['s' => $start->format('d-m-Y'), 'e' => $start->next('Sunday, 12:00am')->format('d-m-Y')];
    }
}

if (!function_exists('getDateYearSE')) {

    function getDateYearSE($month,$year=2023) {

        $start = CarbonImmutable::parse("first day of $month $year");
        $end = CarbonImmutable::parse("last day of $month $year");

        return ['s' => $start->format('d-m-Y'), 'e' => $end->format('d-m-Y')];
    }
}

if (!function_exists('getAllMonths')) {

    function getAllMonths() {
        $month = [];

        for ($m=1; $m<=12; $m++) {
            $month[] = date('F', mktime(0,0,0,$m, 1, date('Y')));
        }
        return $month;
  }
}







//if (!function_exists('BestSellers')) {
//
//    function BestSellers($count = 5)
//    {
//
//        $callbackIsA = function ($item){
//            return $item->isA()['isA'];
//        };
//
//        $callback = function ($item){
//            $item['isA'] = $item->isA();
//            $item['quantity'] = 1;
//            $item['category'] = $item->category;
//            return $item;
//        };
//
//        return Product::query()->get()->filter($callbackIsA)->sort(function ($item){
//            return $item->buyersCount();
//        })->take($count)->map($callback);
//    }
//}
//if (!function_exists('populars')) {
//
//    function populars($count = 5)
//    {
//
//        $callbackIsA = function ($item){
//            return $item->isA()['isA'];
//        };
//
//        $callback = function ($item){
//            $item['isA'] = $item->isA();
//            $item['quantity'] = 1;
//            $item['category'] = $item->category;
//            return $item;
//        };
//
//        return Product::query()->get()->filter($callbackIsA)->sort(function ($item){
//            return $item->cartCount();
//        })->take($count)->map($callback);
//    }
//}
//
//
//
//
//if (!function_exists('getSearchable')) {
//
//    /**
//     * get all columns and associate with their values (used in custom searchableAs scout package)
//     * @param $model
//     * @param array $without
//     * @param array $with
//     * @return array
//     */
//    function getSearchable($model, $without = [], $with = [])
//    {
//        $fillable = array_values(array_merge(array_filter($model->getFillable(), fn($item) => !in_array($item, $without)), $with));
//        $keys = [];
//        foreach ($fillable as $item)
//            $keys = array_merge([$item => $model[$item]], $keys);
//        return $keys;
//    }
//}


if (!function_exists('filterRequest')) {


     function filterRequest($inputs,$model){

        $fillable = app($model)->getFillable();

        return array_filter($inputs,function ($item) use ($fillable,$inputs){
            return in_array($item,$fillable) && $inputs[$item]!==null ;
        },ARRAY_FILTER_USE_KEY);
    }
}

if (!function_exists('priceByDollar')) {


    function priceByDollar($price){

        $tExchange = \App\Models\Currency::where('code','dollar')->first()->exchange_rate;
        $value = 0;

        try {
            $value= floor($price/$tExchange);
        } catch (\Exception $e){};

        return $value;
    }
}



if (!function_exists('startTransaction')) {

    function startTransaction($callback)
    {
        return \Illuminate\Support\Facades\DB::transaction($callback);
    }
}


if (!function_exists('getShoppingSession')) {


    function getShoppingSession(){

        $shopping_id = \Illuminate\Support\Facades\Session::get('shopping_id');

        if(!auth()->user() && $shopping_id) {


            return \App\Models\ShoppingSession::where([
                [
                    'id',$shopping_id
                ],
                [
                    'is_current' , true
                ]
            ])->first();
        }


        return  auth()->user()?->shoppingSession;
    }
}



if (!function_exists('mediaPermissions')) {

    function mediaPermissions($modelBuilder, $provider = null)
    {
        $actions = [
            'edit',
            'add',
            'delete',
            'view'
        ];

        if (!$provider)
            $provider = app($modelBuilder)->mediaProvider();

        foreach ($actions as $action) {
            $to_return[] = $action . " " . $provider . " media";
        }

        return $to_return;
    }
}


if(!function_exists('translateDate')) {

    function translateDate($date, $getO = false)
    {
        try {
            if ($date && !str_contains($date, '/')) {
                if (!$getO)
                    $date = Carbon::parse($date)->isoFormat('LLLL');
                else
                    $date = Carbon::parse($date)->toDateString();
            } else if (str_contains($date, '/')) {
                if (!$getO)
                    $date = Carbon::createFromFormat('d/m/Y', $date)->isoFormat('LLLL');
                else
                    $date = Carbon::createFromFormat('d/m/Y', $date)->toDateString();
            }

        } catch (\Exception $e) {
        }
        return $date;
    }
}

if (!function_exists('getValues')) {

        function getValues($value)
        {
            $arr = [' - '];
            $r = $value;
            foreach ($arr as $a)
                if (str_contains($value, $a))
                    $r = explode($a, $value);

            return $r;
        }
    }


if (!function_exists('searchInModel')) {
        /**
         * search in queries using scout package
         * @param $request
         * @param $with_pagination
         * @return mixed
         */
        function searchInModel($request, $builder = 'App\Models\Product',$filterCallback=null)
        {


                $params = is_array($request) ? $request : $request->only(['query']);

                $query = isset($params['query']) ? $params['query'] : null;

                $res = null;

                $data = $builder::get();

                if(is_array($query) && $query){

                    $ids = [];
                    foreach($query as $q) {

                        $res = $builder::search($q);
                        if($ids) $res->whereIn('id', $ids);

                        $ids = array_merge($ids,$res->get()->pluck("id")->toArray());
                    }

                    $ids = array_unique($ids);

                    $data = $res->whereIn('id',$ids)->get();
                }
                else if($query)
                $data =  $builder::search($query)->get();



                return $data->filter($filterCallback);

        }

    }




if (!function_exists('makePaginator')) {

    function makePaginator($values,$perpage,$count,$options=[])
    {
        return  new \Illuminate\Pagination\LengthAwarePaginator($values,$count,$perpage,null,$options);
    }
}


if (!function_exists('getMac')) {

    function getMac()
    {
        $string=exec('getmac');
        return substr($string, 0, 17);
    }
}





//if (!function_exists('getReviews')) {
//
//    function getReviews($id,$builder)
//    {
//        $comments = Comment::query()->with(['commentable','commenter'])->whereHasMorph('commentable',[
//            $builder
//        ],function ($query)  use ($id){
//            $query->where([
//                [
//                    'id',$id
//                ],
//                [
//                    'approved',true
//                ]
//            ]);
//        })->orderBy('created_at','desc')->get();
//
//        foreach ($comments as $comment){
//            $comment['children'] = $comment->children(true);
//        }
//
//        return$comments;
//    }
//}


//if (!function_exists('gSeo')) {
//
//    function gSeo($title,$description,$img=null)
//    {
//        return new \RalphJSmit\Laravel\SEO\Support\SEOData(
//            title : $title,
//            description: $description,
//            image : $img ? $img : env('APP_URL').'/img/oldlogo-1.png'
//        );
//    }
//}
