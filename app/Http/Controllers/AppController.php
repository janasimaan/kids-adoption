<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Kid;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function welcome(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('welcome');
    }

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $kids = Kid::all();

        return view('index', [
            'kids' => $kids
        ]);
    }

    public function donate(Kid $kidId): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {

        return view('donate', [
            'kid' => $kidId
        ]);
    }

    public function send_donation(Donation $donation , $kidId): \Illuminate\Http\RedirectResponse
    {

        $inputs = \request()->validate([
            'type' => 'required',
            'amount' => 'required',
            'name' => '',
            'age' => '',
        ]);


        $donation->kid = $kidId;
        $donation->name = $inputs['name'];
        $donation->type = $inputs['type'];
        $donation->amount = $inputs['amount'];
        $donation->age = $inputs['age'];
        $donation->save();

        return redirect()->route('thank_you');
    }

    public function thank_you(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('thank-you');
    }
}
