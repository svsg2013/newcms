<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use App\Models\Career;
use App\Repositories\CareerApplyRepository;
use App\Repositories\CareerCategoryRepository;
use App\Repositories\CareerRepository;
use Illuminate\Http\Request;
use App\Models\Ward;
use App\Models\City;
use App\Models\CityCareer;
use App\Models\CareerLevel;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Excel;
use Carbon\Carbon;

class CareerController extends Controller
{
    protected $career;
    protected $apply;
    protected $category;

    public function __construct(
        CareerRepository $career,
        CareerApplyRepository $apply,
        CareerCategoryRepository $category)
    {
        $this->career = $career;
        $this->apply = $apply;
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Breadcrumb::title(trans('admin_career.title'));

        return view('admin.career.index');
    }

    public function datatable()
    {
        $data = $this->career->datatable();
        return DataTables::of($data)
            ->addColumn(
                'name',
                function ($data) {
                    return $data->name;
                }
            )
            ->editColumn(
                'employer',
                function ($data) {
                    return $data->employer;
                }
            )
            ->editColumn(
                'status',
                function ($data) {
                    return $data->status;
                }
            )
            ->editColumn(
                'is_top',
                function ($data) {
                    return $data->is_top ? '<i class="material-icons col-pink">check</i>' : '<i class="material-icons">more_horiz</i>';
                }
            )
            ->addColumn(
                'num_of_application',
                function ($data) {
                    return $data->applies()->count();
                }
            )
            ->editColumn(
                'expired_date',
                function ($data) {
                    return $data->expired_date_format;
                }
            )
            ->editColumn(
                'published_date',
                function ($data) {
                    return $data->published_date_format;
                }
            )
            ->addColumn(
                'action',
                function ($data) {
                    return view('admin.layouts.partials.table_button')->with(
                        [
                            'link_edit' => route('admin.career.edit', $data->id),
                            'link_delete' => route('admin.career.destroy', $data->id),
                            'id_delete' => $data->id
                        ]
                    )->render();
                }
            )
            ->escapeColumns([])
            ->make(true);
    }

    public function application()
    {
        Breadcrumb::title(trans('admin_career.apply'));

        $categories = $this->category->all();

        return view('admin.career.application', compact('categories'));
    }

    public function applicationDatatable()
    {
        $data = $this->apply->datatable();

        return DataTables::of($data)
            ->addColumn(
                'name', function ($data) {
                return $data->first_name .' '.$data->last_name; //nhatuyendung
            })
            ->addColumn(
                'position', function ($data) {
                return $data->career->name; //career
            })
            ->editColumn(
                'created_at',
                function ($data) {
                    return cvDbTime($data->created_at, DB_TIME, PHP_DATE_TIME);
                }
            )
            ->editColumn(
                'image',
                function ($data) {
                    return (!empty($data->image) && \File::exists('storage/'.$data->image)) ? "<img src='storage/{$data->image}' style='max-width: 300px;max-height: 200px;' />" : '';
                }
            )
            ->editColumn(
                'attach_file',
                function ($data) {
                    return (!empty($data->attach_file) && \File::exists('storage/'.$data->attach_file)) ? "<a href='storage/{$data->attach_file}' class='btn btn-primary' target='_blank'>Detail</a>" : '';
                }
            )
            ->addColumn("action", function ($data) {
                return " <a class='btn btn-success btn-detail'>" . trans('button.view') . "<a>";
            })
            ->escapeColumns(['*'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Breadcrumb::title(trans('admin_career.create_career'));

        $statuses = Career::getStatuses();
        $categories = $this->category->all();
        $employer = Career::getEmployer();
        $working_time = Career::getWorkingTime();
        $locations = CityCareer::all();
        $levels = CareerLevel::all();

        return view(
            'admin.career.create_edit',
            compact(
                'statuses',
                'employer',
                'categories',
                'working_time',
                'locations',
                'levels'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $this->career->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_career.career')]));

        return redirect()->route('admin.career.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $career = $this->career->find($id);

        $statuses = Career::getStatuses();
        $employer = Career::getEmployer();
        $categories = $this->category->all();
        $working_time = Career::getWorkingTime();
        $locations = CityCareer::all();
        $levels = CareerLevel::all();

        return view(
            'admin.career.create_edit',
            compact(
                'career',
                'statuses',
                'categories',
                'employer',
                'working_time',
                'locations',
                'levels'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $this->career->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_career.career')]));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->career->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_career.career')]));

        return redirect()->back();
    }

    public function exportExcel(Request $request)
    {

        $input = $request->all();

        $career_application = $this->apply->getData($input);

        $convertDataExcel = $this->convertDataExcel($career_application);

        if(count($convertDataExcel)) {
            Excel::create('Application_list', function($excel) use ($convertDataExcel) {
                $excel->sheet('Sheet 1', function($sheet) use ($convertDataExcel) {
                    $sheet->fromArray($convertDataExcel);

                    $sheet->cell('B1', function($cell) {
                        $cell->setValue('Tên vị trí ứng tuyển');
                    });
                    
                    $sheet->setStyle(array(
                        'font' => array(
                            'name'      =>  'Arial'
                        )
                    ));
                });
               
            })->download('xls');
        } else {
            session()->flash('error', 'No data');
            return redirect()->back();
        }

        session()->flash('success', 'Export Successfully');
        return redirect()->back();
    }

    private function convertDataExcel($data)
    {
        $convertDataExcel = array();
        if(!empty($data)) {
            $convertDataExcel = $data->map(function ($item, $key) {
                $item->career_id = !empty($item->career) ? $item->career->name : '';
                $item->attach_file = !empty($item->attach_file) ? \Storage::url($item->attach_file) : '';
                $item->birthday = !empty($item->birthday) ? Carbon::createFromFormat('Y-m-d', $item->birthday)->format('d/m/Y') : '';
                $item->gender = $item->gender == 1 ? 'Nam' : 'Nữ';
                $item->ward_id = !empty(Ward::find($item->ward_id)) ? Ward::find($item->ward_id)->name : '';
                $item->image = !empty($item->image) ? \Storage::url($item->image) : '';
                $item->active = $item->seen == 1 ? 'Seen' : 'Not seen';
                return $item;
            });
        }
        return count($convertDataExcel) ? collect($convertDataExcel->all()) : collect($convertDataExcel);
    }
}
