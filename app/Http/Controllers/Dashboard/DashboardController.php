<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Kid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        if (Session::get('admin') == null) {
            return redirect()->route('login');
        } else {

            $kids = Kid::all();
            $donations = Donation::all();

            return view('Dashboard.dashboard', [
                'kids' => $kids,
                'donations' => $donations
            ]);
        }
    }
}
