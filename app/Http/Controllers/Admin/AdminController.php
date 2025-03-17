<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function __construct() 
    {
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('admin.index')) {
                return redirect()->route('docentes.index');
            }
            return $next($request);
        });
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('admin.index');
    }
}
