<div id="modalArea" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{ trans('admin_image_map.form.content') }}</h4>
            </div>
            <div class="modal-body">
                @component('admin.translation.nav_tab', [
                            'object_trans' => null,
                            'default_tab' => $composer_locale,
                            'form_fields' => [
                                ['type' => 'ckeditor', 'name' => 'content']
                            ],
                            'form_plugins' => ['ckeditor'],
                            'translation_file' => 'admin_image_map'
                        ])
                @endcomponent
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-delete-content" class="btn btn-danger pull-left hidden">{{ trans('button.delete') }}</button>
                <button type="button" id="btn-ok-content" class="btn btn-success">{{ trans('button.ok') }}</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('button.close') }}</button>
            </div>
        </div>

    </div>
</div>