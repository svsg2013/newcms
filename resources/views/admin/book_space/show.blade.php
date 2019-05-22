@extends("admin.layouts.master")

@section('style')
    <style>
        .fake-input {
            border: 1px solid #ccc;
            padding: 10px 6px;
            position: relative;
        }

        .fake-input::after {
            content: "";
            position: absolute;
            left: 0;
            width: 100%;
            height: 0;
            bottom: -1px;
            border-bottom: 2px solid #4caf50;
        }
    </style>
@endsection

@section("content")
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>#{{ $booking->id }}</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">{{ trans('admin_book_space.form.name') }}</div>
                                <div class="fake-input">
                                    {{ $booking->name }}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">{{ trans('admin_book_space.form.phone') }}</div>
                                <div class="fake-input">
                                    {{ $booking->phone }}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">{{ trans('admin_book_space.form.email') }}</div>
                                <div class="fake-input">
                                    {{ $booking->email }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">{{ trans('admin_book_space.form.company') }}</div>
                                <div class="fake-input">
                                    {{ $booking->company }}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">{{ trans('admin_book_space.form.business') }}</div>
                                <div class="fake-input">
                                    {{ $booking->business->name }}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">{{ trans('admin_book_space.form.country') }}</div>
                                <div class="fake-input">
                                    {{ $booking->country->name }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">{{ trans('admin_book_space.form.target') }}</div>
                                <div class="fake-input">
                                    {{ $booking->target }}
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">{{ trans('admin_book_space.form.spaces') }}</div>
                                <div class="fake-input">
                                    @foreach($booking->spaces as $space)
                                        <ul style="list-style: none; padding-left: 0;">
                                            <li>{!! $space->level ? '-- '. $space->name : "<strong>{$space->name}</strong>"  !!}</li>
                                        </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">{{ trans('admin_book_space.form.content') }}</div>
                                <div class="fake-input">
                                    {{ $booking->content }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-right m-t-15">
                        <a href="{{ route('admin.book_space.index') }}" class="btn btn-info">{{ trans('button.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
