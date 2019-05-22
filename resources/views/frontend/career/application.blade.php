<div class="recruit__form_result">
    <div class="text-center">
        <a class="btn btn-lh apply_link" data-toggle="collapse" href="#applyForm">{{ trans('f_career.application') }}
            <i class="arrow_right"></i>
        </a>
    </div>
    <div id="applyForm" class="collapse toggle__panel fade">
        <a class="apply__expand__close" href="#">
            <i class="icon_close"></i>
        </a>
        <div class="recruit__heading recruit__heading_form">
            {{ trans('f_career.apply_online') }}
        </div>
       
        <form action="/careers/apply" class="form" method="POST" enctype="multipart/form-data" name="form_validate">
            {{ csrf_field() }}
            <input type="hidden" name="career_id" value="{{ $careers->id }}">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{ trans('f_career.position') }}*</label>
                        <input type="text" name="position" class="form-control" value="{{ $careers->name }}" required readonly="true">
                    </div>
                    <div class="form-group">
                        <label>{{ trans('f_career.name') }}*</label>
                        <input type="text" value="{{ old('name') }}" name="name" placeholder="{!! trans('f_career.name') !!}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>{{ trans('f_career.phone') }} *</label>
                        <input type="text" value="{{ old('phone') }}" name="phone" placeholder="{!! trans('f_career.phone') !!}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>{{ trans('f_career.email') }}*</label>
                        <input type="text" value="{{ old('email') }}" name="email" placeholder="example@gmail.com" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{ trans('f_career.message') }}*</label>
                        <textarea name="content" id="message" rows="5" placeholder="{{ trans('f_career.content') }}" class="form-control">
                            {{ old('content') }}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <strong>{{ trans('f_career.attach') }} *</strong>
                        <em>(pdf,doc,docx, rar, zip)</em>
                        <input type="file" name="attach_file" data-buttonBefore="true" class="inputfile-1" accept=".pdf,.doc,.docx,.rar,.zip">
                    </div>
                    <div class="form-group">
                        {!! app('captcha')->display($attributes = [], $lang = $composer_locale) !!}
                        <input type="hidden" name="re_captcha">
                    </div>
                </div>
            </div>
            <div class="form-group submit text-center">
                <button class="btn btn-lh" type="submit">{{ trans('button.send') }}
                    <i class="arrow_right"></i>
                </button>
            </div>
        </form>
    </div>
</div>