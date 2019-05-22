@extends('frontend.layouts.master')

@section('style')
    <style>
        .pagination {
            display: inline-block;
            padding-left: 0;
            margin: 20px 0;
            border-radius: 4px;
        }
        .pagination>li {
            display: inline;
        }
        .pagination>li>a, .pagination>li>span {
            position: relative;
            float: left;
            padding: 6px 12px;
            margin-left: -1px;
            line-height: 1.42857143;
            color: #337ab7;
            text-decoration: none;
            background-color: #fff;
            border: 1px solid #ddd;
            font-weight: bold;
        }
    </style>
@endsection

@section('content')
    @if(!empty($blocks['BROCHURES']) && count($blocks['BROCHURES']))
    <div class="bannerInner" style="background-image:url({{$blocks['BROCHURES'][0]['photo']}});"><img src="{{$blocks['BROCHURES'][0]['photo']}}" alt="">
        <div class="container">
            <div class="bannerInner__inner">
                <div class="bannerInner__info">
                    <h3>{{$blocks['BROCHURES'][0]['name']}}</h3>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="container">
        <div class="row brochureList">
            @foreach($brochures as $index=>$brochure)
            <div class="col-md-4 col-8 brochureItem">
                <div class="brochureItem__img"><a class="image" target="_blank" href="{{$brochure->link_download}}" style="background-image:url({{$brochure->image}});"><img src="{{$brochure->image}}" alt=""></a>
                    <p><a target="_blank" href="{{$brochure->link_download}}">{{$brochure->title}}</a></p><a class="v-more" target="_blank" href="{{$brochure->link_download}}">{{trans('button.download')}}</a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="text-center" style="margin: auto;">{{$brochures->links()}}</div>
        </div>
    </div>
@endsection