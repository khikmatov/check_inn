<?php

namespace App\Http\Controllers;

use App\Models\Inn;
use App\Services\InnService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InnController extends Controller
{
    private $service;

    public function __construct(InnService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return view('inn.form');
    }

    public function result(Request $request)
    {
        $validatedInn = $request->validate([
            'inn' => 'required|inn'
        ]);

        return view('inn.view', [
            'viewModel' => $this->service->checkInn($request->get('inn'), Carbon::now())->getViewModel()
        ]);
    }

    public function all()
    {
        dd(
            Inn::all()->map(function(Inn $inn) {
                return$inn->getAttributes();
            })
        );
    }
}
