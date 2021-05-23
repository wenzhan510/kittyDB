<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Sheet;
use Illuminate\Http\Request;

class ContentController extends Controller
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
    public function create(Sheet $sheet)
    {
        $sheet->load('columns');
        return view('content.create', compact('sheet'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Sheet $sheet)
    {
        // return $request->all();

        $sheet->load('columns');

        // TODO validation of content by each column

        $new_content = [];

        $new_content['data'] = $request->only($sheet->columns->pluck('name')->toArray());

        $new_content['sheet_id']=$sheet->id;

        $content = Content::create($new_content);

        return redirect('/sheet/'.$sheet->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Sheet $sheet, Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Sheet $sheet, Content $content,)
    {
        $sheet->load('columns');
        return view('content.edit', compact('sheet','content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sheet $sheet, Content $content)
    {
        // return $request->all();

        $sheet->load('columns');

        // TODO validation of content by each column

        $new_content = [];

        $new_content['data'] = $request->only($sheet->columns->pluck('name')->toArray());

        $content->update($new_content);

        return redirect('/sheet/'.$sheet->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sheet $sheet, Content $content)
    {
        //
    }
}
