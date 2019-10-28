<?php

namespace App\Http\Controllers;

use App\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class PeopleManager extends Controller
{
    protected $people;

    public function __construct(People $people)
    {
        $this->people = $people;
        $this->middleware('auth');
    }

    public function index()
    {
        $peoples = $this->people->paginate(5);

        return view('peoples.list', compact('peoples'));
    }

    public function add()
    {
        return view('peoples.add');
    }

    public function create(Request $request)
    {
        $image = $request->image;
        $path = 'public/images';
        $fileName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs($path, $fileName);

        $this->people->name = $request->name;
        $this->people->email = $request->email;
        $this->people->age = $request->age;
        $this->people->country = $request->country;
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

        return view('peoples.edit', compact('people'));
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

        $people->save();
        return redirect()->route('peoples.index');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $dataSearch = DB::table("peoples")->where("name", "like", "%$search%")
            ->paginate(5);

//        return redirect()->route("peoples.index", compact('peoples'));
        return view('peoples.search',compact('dataSearch'));
    }
}
