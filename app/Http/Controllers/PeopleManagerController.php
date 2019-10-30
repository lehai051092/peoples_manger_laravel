<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPeopleRequest;
use App\People;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class PeopleManagerController extends Controller
{
    protected $people;
    protected $region;

    public function __construct(People $people, Region $region)
    {
        $this->region = $region;
        $this->people = $people;
        $this->middleware('auth');
    }

    public function index()
    {
        $peoples = $this->people->paginate(5);
        $regions = $this->region->all();

        return view('peoples.list', compact('peoples', 'regions'));
    }

    public function add()
    {
        $peoples = $this->people->all();
        $regions = $this->region->all();
        return view('peoples.add', compact('regions', 'peoples'));
    }

    public function create(AddPeopleRequest $request)
    {
        $image = $request->image;
        $path = 'public/images';
        $fileName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs($path, $fileName);

        $this->people->name = $request->name;
        $this->people->email = $request->email;
        $this->people->age = $request->age;
        $this->people->country = $request->country;
        $this->people->region_id = $request->region;
        $this->people->image = $fileName;
        $this->people->save();

        return redirect()->route('peoples.index');
    }

    public function delete($id)
    {
        $people = $this->people->findOrFail($id);
        File::delete(storage_path('app\public\images\\' . $people->image));
        $people->delete();

        return redirect()->route('peoples.index');
    }

    public function edit($id)
    {
        $people = $this->people->findOrFail($id);
        $regions = $this->region->all();

        return view('peoples.edit', compact('people', 'regions'));
    }

    public function update(Request $request, $id)
    {
        $people = $this->people->findOrFail($id);

        if (($request->image)) {
            $image = $request->image;
            $path = 'public/images';
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            File::delete(storage_path('app\public\images\\' . $people->image));
            $image->storeAs($path, $fileName);
            $people->image = $fileName;
        }
        $people->name = $request->name;
        $people->email = $request->email;
        $people->age = $request->age;
        $people->country = $request->country;
        $people->region_id = $request->region;

        $people->save();
        return redirect()->route('peoples.index');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $dataSearch = DB::table("peoples")->where("name", "like", "%$search%")
            ->paginate(5);

        return view('peoples.search',compact('dataSearch'));
    }
}
