<?php
namespace App\Admin\Controllers;

use App\PersonalLoan;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class PersonalLoanController extends Controller
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
            ->header('PersonalLoan')
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
        $grid = new Grid(new PersonalLoan);
        $grid->id('ID');
		$grid->column('fullname');
		$grid->column('phonenumber');
		$grid->column('nationalid');
		$grid->column('status');
		$grid->column('lead_id');
        $grid->created_at('Created at');
		$grid->setResource(admin_url('personalloan'));
		$grid->filter(function ($filter) {
			$filter->between('created_at', 'Created Time')->datetime();
			$filter->where(function ($query) {
				if($this->input == "ECD"){
					$query->whereNotNull('lead_id');
				}elseif($this->input == "failed"){
					$query->whereNull('lead_id');
				}
				
			}, 'Lead Id')->select(['ECD' => 'Success','failed' => 'Failed','all' => 'All']);
		});
		
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
        $show = new Show(PersonalLoan::findOrFail($id));

        $show->id('ID');
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
        $form = new Form(new PersonalLoan);
		$form->text('fullname');
        return $form;
    }
}
