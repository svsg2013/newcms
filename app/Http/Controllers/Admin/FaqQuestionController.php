<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\FaqQuestionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Breadcrumb;
use Yajra\DataTables\Facades\DataTables;

class FaqQuestionController extends Controller
{
    protected $faq_question;

    public function __construct(FaqQuestionRepository $faq_question)
    {
        $this->faq_question = $faq_question;
    }

    public function index()
    {
        Breadcrumb::title(trans('admin_faq_question.title'));
        return view('admin.faq_question.index');
    }

    public function datatable()
    {
        $data = $this->faq_question->datatable();

        return DataTables::of($data)
            ->editColumn(
                'created_at',
                function ($data) {
                    return cvDbTime($data->created_at, DB_TIME, PHP_DATE_TIME);
                }
            )
            ->addColumn(
                'action',
                function ($data) {
                    return view('admin.layouts.partials.table_button')->with(
                    [
                        'btn_view_datatable' => true,
                        'link_delete' => route('admin.faq_question.destroy', $data->id),
                        'id_delete' => $data->id
                    ]
                )->render();
                }
            )
            ->escapeColumns(['name', 'email', 'question'])
            ->make(true);
    }

    public function destroy($id)
    {
        $faq_question = $this->faq_question->find($id);

        $faq_question->delete();

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_faq_question.faq_question')]));

        return redirect()->back();
    }
}
