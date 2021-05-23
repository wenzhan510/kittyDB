<?php

namespace App\Http\Controllers;

use App\Models\Column;
use App\Models\Sheet;
use Illuminate\Http\Request;

class ColumnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Sheet $sheet)
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
        return view('column.create', compact('sheet'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Sheet $sheet, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|min:1|max:190',
            'type' => 'required|string|min:1|max:190',
            'explanation' => 'nullable|string',
            'parent_column_id' => 'required|integer|min:0',
        ]);
        $new_column = $request->only(['name','type','explanation','parent_column_id']);
        $new_column['sheet_id']=$sheet->id;
        $column = Column::create($new_column);
        return redirect('/sheet/'.$sheet->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Column  $column
     * @return \Illuminate\Http\Response
     */
    public function show(Sheet $sheet, Column $column)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Column  $column
     * @return \Illuminate\Http\Response
     */
    public function edit(Sheet $sheet, Column $column)
    {
        return view('column.edit', compact('sheet','column'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Column  $column
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sheet $sheet, Column $column)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required|string|min:1|max:190',
            'order_by' => 'required|integer|min:0',
            'type' => 'required|string|min:1|max:190',
            'explanation' => 'nullable|string',
            'parent_column_id' => 'required|integer|min:0',
        ]);
        $new_column = $request->only(['name','order_by', 'type','explanation','parent_column_id']);
        $column->update($new_column);
        return redirect('/sheet/'.$sheet->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Column  $column
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sheet $sheet, Column $column)
    {
        //
    }
}
