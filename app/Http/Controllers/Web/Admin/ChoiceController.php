<?php

namespace App\Http\Controllers\Web\Admin;

use App\Choice;
use App\Question;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChoiceController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($question_id)
    {
        return view('admin.choices.create',['question_id'=>$question_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$question_id)
    {
        $validatedData = $request->validate([
            'title' => 'string|required|max:255',
        ]);
        $validatedData['question_id'] = $question_id;
        $choice = new Choice($validatedData);
        $choice->save();
        return redirect()->route('questions.edit',['question_id'=>$question_id]);
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
    public function edit($question_id,Choice $choice)
    {
        return view('admin.choices.edit',['choice'=>$choice,'question_id'=>$question_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($question_id,Request $request, Choice $choice)
    {
        $validatedData = $request->validate([
            'title' => 'string|required|max:255',
        ]);
        $validatedData['question_id'] = $question_id;
        $choice->update($validatedData);
        return redirect()->route('questions.edit',['question_id'=>$question_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($question_id,Choice $choice)
    {
        $choice->delete();
        return redirect()->route('questions.edit',['question_id'=>$question_id]);
    }
}
