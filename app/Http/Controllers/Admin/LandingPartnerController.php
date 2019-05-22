<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use App\Models\LandingPartner;
use App\Models\LandingTemplate;
use App\Repositories\LandingPartnerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class LandingPartnerController extends Controller
{
    protected $landingPartnerRepository;

    public function __construct(
        LandingPartnerRepository $landingPartnerRepository
    )
    {
        $this->landingPartnerRepository = $landingPartnerRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd(($this->landingPartnerRepository->test()));
        Breadcrumb::title(trans('admin_landing_partner.title'));

        return view('admin.landing_partner.index');
    }

    public function datatable()
    {
        $data = $this->landingPartnerRepository->datatable();
        $dataTables = datatables($data);
        $dataTables->editColumn(
            'template_name',
            function ($data) {
                return $data->template->name ?? '';
            }
        );
        $dataTables->addColumn(
            'action',
            function ($data) {
                $buttons = [

                ];
                if (!empty($data->template)) {
                    $link_template = route('admin.landing_partner.template', $data->id);
                    $buttons[] = "<a href='{$link_template}' class='btn btn-info'>Edit Template</a>";
                }
                $link_preview = route('landing_partner', $data->campaign_source);
                $text_preview = trans('button.preview');
                $buttons[] = "<a target='_blank' href='{$link_preview}' class='btn btn-info'>{$text_preview}</a>";

                $with = [
                    'link_edit' => route('admin.landing_partner.edit', $data->id),

                ];
                if($data->trashed()) {
                    $with['link_restore'] = route('admin.landing_partner.restore', $data->id);
                } else {
                    $with['link_delete'] = route('admin.landing_partner.destroy', $data->id);
                    $with['id_delete'] = $data->id;
                }

                $buttons[] = view('admin.layouts.partials.table_button')->with($with)->render();
                return implode("\n", $buttons);
            }
        );
        $dataTables->escapeColumns([]);
        return $dataTables->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Breadcrumb::title(trans('admin_landing_partner.create'));

        $templates = LandingTemplate::all();

        return view('admin.landing_partner.create_edit', compact('templates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'campaign_source' => [
                'required',
                'string',
                'regex:/(^([a-zA-Z0-9-_]+)?$)/u',
                Rule::unique((new LandingPartner())->getTable())
            ],
            'email' => [
                'required',
                'string',
                Rule::unique((new LandingPartner())->getTable())
            ],
            'template_code' => [
                'nullable',
                Rule::exists((new LandingTemplate())->getTable(), 'code')
            ],
            'script_key' => [
                'required'
            ],
//            'script_content' => [
//                'required'
//            ]
        ]);
        $input = $request->all();
        $input['password'] = str_random(6);
        if (!array_key_exists('otp_request', $input)) {
            $input['otp_request'] = 0;
        }

        $this->landingPartnerRepository->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_landing_partner.title')]));
        return redirect()->route('admin.landing_partner.index');
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
        Breadcrumb::title(trans('admin_landing_partner.edit'));

        $data = $this->landingPartnerRepository->find($id);

        $templates = LandingTemplate::all();

        return view('admin.landing_partner.create_edit', compact('data', 'templates'));
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
        $request->validate([
            'campaign_source' => [
                'required',
                'string',
                'regex:/(^([a-zA-Z0-9-_]+)?$)/u',
                Rule::unique((new LandingPartner())->getTable())->ignore($id)
            ],
            'email' => [
                'required',
                'string',
                Rule::unique((new LandingPartner())->getTable())->ignore($id)
            ],
            'template_code' => [
                'nullable',
                Rule::exists((new LandingTemplate())->getTable(), 'code')
            ],
            'script_key' => [
                'required'
            ],
//            'script_content' => [
//                'required'
//            ]
        ]);
        $input = $request->all();
        if (!array_key_exists('active', $input)) {
            $input['active'] = 0;
        }

        if (!array_key_exists('otp_request', $input)) {
            $input['otp_request'] = 0;
        }
        $this->landingPartnerRepository->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_landing_partner.title')]));
        return redirect()->back();
    }

    public function template($id)
    {
        Breadcrumb::title(trans('admin_landing_partner.template_data'));

        $data = LandingPartner::where([
            'id' => $id
        ])->whereHas('template')->firstOrFail();
        $templates = LandingTemplate::all();

        return view('admin.landing_partner.template', compact('data', 'templates'));
    }

    public function updateTemplate(Request $request, $id)
    {
        Breadcrumb::title(trans('admin_landing_partner.template'));

        $data = LandingPartner::where([
            'id' => $id
        ])->whereHas('template')->firstOrFail();
        $input = $request->input();
        $extra_data = $input['extra_data'] ?? [];

        array_walk($extra_data, function ($item, $k) use (&$input) {
            if (array_key_exists($k, \LaravelLocalization::getSupportedLocales())) {
                $input[$k]['extra_data'] = $item;
            }
        });
        unset($input['extra_data']);

        $data->templateData()->updateOrCreate([
            'partner_id' => $data->id
        ], $input);
        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_landing_partner.template_data')]));
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
        $this->landingPartnerRepository->delete($id);
        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_landing_partner.title')]));
        return redirect()->back();
    }

    public function restore($id)
    {
        $this->landingPartnerRepository->restore($id);
        session()->flash('success', trans('admin_message.restore', ['attr' => trans('admin_landing_partner.title')]));
        return redirect()->back();
    }
}
