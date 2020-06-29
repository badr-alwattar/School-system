<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Homework;
use App\User;
use Auth;

class HomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::user()->isAdmin) {
            return redirect('/home');
        }
        $users = User::all()->except(Auth::id());
        return view('homework.create')->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'title' => 'required',
        //     'attachment' => 'required | file | mimetypes:application/pdf | max:1000',
        // ]);

        // if(!Auth::user()->isAdmin) {
        //     return redirect('/home');
        // }

        $homework = new Homework();
        $homework->title = $request->input('title');
        $homework->assignedTo = $request->input('assignedTo');
        $homework->assignedToName = User::find($homework->assignedTo)->name;
        $homework->attachment = $request->file('attachment')->store('public/');
        $homework->attachment = substr($homework->attachment, 7, strlen($homework->attachment));
        $homework->save();

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
