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
     * @return Renderable
     */
    public function add_new()
    {
//        $stats = Storage::copy('app/plugins-file/SiteWayPaymentGateway',"Modules/");
        //return view('pluginmanage::plugin-manage.add_new');
    }


}
