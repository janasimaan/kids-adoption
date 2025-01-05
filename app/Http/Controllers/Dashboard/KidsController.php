<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Kid;
use Illuminate\Http\Request;

class KidsController extends Controller
{
    public function store(Kid $kid): \Illuminate\Http\RedirectResponse
    {

        $inputs = \request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'id_number' => 'required',
            'status' => 'required',
            'age' => 'required',
            'desc' => '',
        ]);

        $kid->first_name = $inputs['first_name'];
        $kid->last_name = $inputs['last_name'];
        $kid->id_number = $inputs['id_number'];
        $kid->status = $inputs['status'];
        $kid->age = $inputs['age'];
        $kid->desc = $inputs['desc'];
        $kid->save();

        return back();
    }

    public function kid(Kid $id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $donations = Donation::where('kid',$id->id)->get();

        return view('Dashboard.kid', [
            'kid' => $id,
            'donations' => $donations
        ]);
    }

    public function update(Kid $id): \Illuminate\Http\RedirectResponse
    {

        $inputs = \request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'id_number' => 'required',
            'status' => 'required',
            'age' => 'required',
            'desc' => '',
        ]);

        $id->first_name = $inputs['first_name'];
        $id->last_name = $inputs['last_name'];
        $id->id_number = $inputs['id_number'];
        $id->status = $inputs['status'];
        $id->age = $inputs['age'];
        $id->desc = $inputs['desc'];
        $id->update();

        return back();
    }
}
