<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
        return view('new', ['sports' => $sports]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $data = $request->only(['fname', 'lname', 'email', 'tel', 'birth', 'sports']);

        $validator = Validator::make($data, [
            'fname' => 'required|min:3',
            'lname' => 'required|min:3',
            'email' => 'required|unique:App\Models\Person,email',
            'birth' => 'required',
            'tel' => 'required',
            'sports' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $validated = $validator->validated();
            $person = new Person();
            Arr::pull($validated, 'sports');
            $person->fill($validated);

            $person->save();
            if (isset($data['sports'])) {
                $person->sports()->attach($request['sports']);
            }
            $person->save();
            return redirect('/');
        }
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, int $id)
    {
        $data = $request->only(['fname', 'lname', 'email', 'tel', 'birth']);
        $validator = Validator::make($data, [
            'fname' => 'required|min:3',
            'lname' => 'required|min:3',
            'email' => ['required', Rule::unique('people')->ignore($id)],
            'birth' => 'required',
            'tel' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('/edit/' . $id)
                ->withErrors($validator)
                ->withInput();
        } else {
            $validated = $validator->validated();
            $person = Person::find($id);

            $person->fill($validated);
            if (isset($request['sports'])) {
                $person->sports()->detach();
                $person->sports()->attach($request['sports']);
            }
            $person->save();
            return redirect('/');
        }
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
