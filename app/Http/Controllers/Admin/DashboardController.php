<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Event::where('tanggal_mulai', '>', '2020-09-15')->count();
        $user = Auth::user();
        return view('pages.admin.dashboard', ['user' => $user, 'data' => $data]);
    }
}
