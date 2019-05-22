<?php
namespace App\Admin\Controllers;

use App\Income;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class IncomeController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Income')
            ->description('Description...')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('Description...')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('Description...')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('Description...')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Income);
        $grid->id('ID');
		$grid->column('name');
		$grid->column('isorder');
		$grid->column('warning');
		$grid->column('selected');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');
		$grid->setResource(admin_url('income'));
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Income::findOrFail($id));

        $show->id('ID');
		$show->column('name');
		$form->number('isorder');
		$form->select('warning', 'Warning')->options([1 => 'Warning', 0 => 'Default']);
		$form->select('selected', 'Selected')->options([1 => 'Selected', 0 => 'Dfault']);
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Income);
		$form->text('name');
		$form->number('isorder');
		$form->select('warning', 'Warning')->options([1 => 'Warning', 0 => 'Default']);
		$form->select('selected', 'Selected')->options([1 => 'Selected', 0 => 'Dfault']);
        return $form;
    }
}
