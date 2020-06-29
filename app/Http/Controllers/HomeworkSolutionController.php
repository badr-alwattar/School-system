<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Homework;
use App\Homework_solution;
use Auth;
use App\User;

class HomeworkSolutionController extends Controller
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
       
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        if(Auth::user()->isAdmin) {
            return redirect('/home');
        }

        $homework = Homework::find($id);
        return view('homeworksol.create')->with('homework', $homework);
    }

    public function myupdate(Request $request)
    {
        if(Auth::user()->isAdmin) {
            return redirect('/home');
        }

        // dd($request->input('homework-id'));
        $homework_sol = new Homework_solution();
        $homework_sol->title = $request->input('title');
        $homework_sol->assignedToName = User::find(Auth::user()->id)->name;
        $homework_sol->attachment = $request->file('attachment')->store('public/');
        $homework_sol->attachment = substr($homework_sol->attachment, 7, strlen($homework_sol->attachment));
        $homework_sol->homework = $request->input('homework-id');
        $homework_sol->save();

        $homework = Homework::find($request->input('homework-id'));
        $homework->solution_uploaded = true;
        $homework->solution = $homework_sol->attachment;
        $homework->save();

        return redirect('/home');
        
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
        if(Auth::user()->isAdmin) {
            return redirect('/home');
        }


        $homework_sol = new Homework_solution();
        $homework_sol->title = $request->input('title');
        $homework_sol->assignedToName = User::find(Auth::user()->id)->name;
        $homework_sol->attachment = $request->file('attachment')->store('public/');
        $homework_sol->attachment = substr($homework->attachment, 7, strlen($homework->attachment));
        $homework_sol->save();

        $homework = Homework::find($id);
        $homework->solution_uploaded = true;
        $homework->save();

        return redirect('/home');
        
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
