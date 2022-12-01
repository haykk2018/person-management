<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = Person::all();
        return view('index', ['people' => $people]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sports = Sport::all();
        return view('new' , ['sports' => $sports]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $person = new Person();
        $arr = $request->only(['fname', 'lname', 'email', 'tel','birth']);
        $person->fill($arr);
        $person->save();
        if (isset($request['sports'])) {
            $person->sports()->attach($request['sports']);
        }
        $person->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Person $person
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $person = Person::findOrFail($id);
        return view('view', ['person' => $person]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $person = Person::findOrFail($id);
        $sports = Sport::all();
        return view('edit', ['person' => $person, 'sports' => $sports]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Person $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $person = Person::find($id);
        $arr = $request->only(['fname', 'lname', 'email', 'tel']);
        $person->fill($arr);
        if (isset($request['sports'])) {
            $person->sports()->detach();
            $person->sports()->attach($request['sports']);
        }
        $person->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Person $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Person::findOrFail($id)->delete();
        return redirect('/');
    }

}
