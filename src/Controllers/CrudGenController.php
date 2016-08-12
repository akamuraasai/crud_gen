<?php
namespace AkamuraAsai\CrudGen\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class CrudGenController extends Controller
{
    public function index($timezone)
    {
        $time = Carbon::now($timezone)->toDateTimeString();
        return view('crudgen::index', compact('time'));
    }
}