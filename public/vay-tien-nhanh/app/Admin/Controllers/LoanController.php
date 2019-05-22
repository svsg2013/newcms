<?php
namespace App\Admin\Controllers;

use App\Loan;
use App\Career;
use App\Personal;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class LoanController extends Controller
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
            ->header('Loan')
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
        $grid = new Grid(new Loan);
        $grid->id('ID');
		$grid->column('name');
		$grid->column('interest_rate');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');
		$grid->setResource(admin_url('loan'));
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
        $show = new Show(Loan::findOrFail($id));

        $show->id('ID');
		$show->column('name');
		
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
        $form = new Form(new Loan);
		$form->text('name');
		$form->decimal('interest_rate');
		$form->number('loan_amount_min');
		$form->number('loan_amount_max');
		$form->number('loan_tenure_min');
		$form->number('loan_tenure_max');
		$form->multipleSelect('careers', "Careers")->options(Career::all()->pluck('name', 'id'));
		$form->multipleSelect('personals', "Personals")->options(Personal::all()->pluck('name', 'id'));
        return $form;
    }
}
