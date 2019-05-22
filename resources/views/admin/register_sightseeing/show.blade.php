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
                                <div class="font-bold col-green">{{ trans('admin_register_sightseeing.form.name') }}</div>
                                <div class="fake-input">
                                    {{ $booking->name }}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">{{ trans('admin_register_sightseeing.form.phone') }}</div>
                                <div class="fake-input">
                                    {{ $booking->phone }}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">{{ trans('admin_register_sightseeing.form.email') }}</div>
                                <div class="fake-input">
                                    {{ $booking->email }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">{{ trans('admin_register_sightseeing.form.company') }}</div>
                                <div class="fake-input">
                                    {{ $booking->company }}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">{{ trans('admin_register_sightseeing.form.business') }}</div>
                                <div class="fake-input">
                                    {{ $booking->business->name }}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">{{ trans('admin_register_sightseeing.form.country') }}</div>
                                <div class="fake-input">
                                    {{ $booking->country->name }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">{{ trans('admin_register_sightseeing.form.number_people') }}</div>
                                <div class="fake-input">
                                    {{ $booking->number_people }}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">{{ trans('admin_register_sightseeing.form.date') }}</div>
                                <div class="fake-input">
                                    {{ trans('admin_register_sightseeing.form.from') }}: <strong>{{ $booking->from_format }}</strong> {{ trans('admin_register_sightseeing.form.to') }}: <strong>{{ $booking->to_format }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">{{ trans('admin_register_sightseeing.form.target') }}</div>
                                <div class="fake-input">
                                    {{ $booking->target_format }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">{{ trans('admin_register_sightseeing.form.content') }}</div>
                                <div class="fake-input">
                                    {{ $booking->content }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-right m-t-15">
                        <a href="{{ route('admin.register_sightseeing.index') }}" class="btn btn-info">{{ trans('button.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
