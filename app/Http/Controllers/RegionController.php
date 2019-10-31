<?php

namespace App\Http\Controllers;

use App\People;
use App\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    protected $region;
    protected $people;

    public function __construct(Region $region,
                                People $people
    )
    {
        $this->people = $people;
        $this->region = $region;
        $this->middleware('auth');
    }

    public function index() {
        $regions = $this->region->all();

        return view("regions.list", compact('regions'));
    }

    public function peoplesInRegion($id) {
        $region = $this->region->findOrFail($id);
        $peoples = $region->peoples;

        return view('regions.peoples', compact('region','peoples'));
    }
}
