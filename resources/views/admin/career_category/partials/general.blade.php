<div class="row">
    <div class="col-md-4 col-sm-4 col-xs-4">
        <div class="form-group">
            <br class="hidden-sm hidden-xs">
            <input type="checkbox" id="is_manager" name="is_manager"
                   value="1" {!! !empty($career_category) && $career_category->is_manager ? 'checked' : null !!}>
            <label for="is_manager">Is manager level</label>
        </div>
    </div>
</div>