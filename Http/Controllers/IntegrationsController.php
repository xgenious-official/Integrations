<?php

namespace Modules\Integrations\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Http\File as HttpFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Modules\PluginManage\Http\Helpers\PluginManageHelpers;

class IntegrationsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view("integrations::integrations.index");
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'data_type' => 'required',
        ]);

        match ($request->data_type){
            "google_analytics" => $this->google_analytics()
        };

        return back()->with(['msg' => __('Settings updated'),'type' => 'success']);
    }

    private function google_analytics(){
        $req = \request();
        if (!is_null(tenant())){
            update_static_option_central('google_analytics_gt4_ID',$req->google_analytics_gt4_ID);
            update_static_option_central('google_analytics_gt4_tenant',$req->google_analytics_gt4_tenant ? 'on' : '');
        }else{
            update_static_option('google_analytics_gt4_ID',$req->google_analytics_gt4_ID);
        }
    }

    public function activate(Request $request){
        $request->validate([
            'status' => 'nullable',
            'option_name' => "required"
        ]);
        if (!is_null(tenant())){
            update_static_option_central($request->option_name,$request->status === 'on' ? 'off' : 'on');
        }else{
            update_static_option($request->option_name,$request->status === 'on' ? 'off' : 'on');
        }

        return response()->json(['msg' => __('Settings Updated'),'type' => 'success']);
    }

}
