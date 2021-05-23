<?php

namespace App\Http\Controllers;

use App\Models\Sheet;
use Illuminate\Http\Request;

class SheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sheets = Sheet::get();
        return view('sheet.index', compact('sheets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sheet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|min:1|max:190',
            'brief' => 'required|string|min:1|max:190',
            'explanation' => 'nullable|string',
        ]);
        $new_sheet = $request->only(['name','brief','explanation']);
        $sheet = Sheet::create($new_sheet);
        return redirect('/sheet/'.$sheet->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sheet  $sheet
     * @return \Illuminate\Http\Response
     */
    public function show(Sheet $sheet)
    {
        $sheet->load('contents','columns');
        $allContents = \App\Models\Content::all();
        // $row = $sheet->contents[0];
        // return $row->data['money'];
        return view('sheet.show', compact('sheet','allContents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sheet  $sheet
     * @return \Illuminate\Http\Response
     */
    public function edit(Sheet $sheet)
    {
        return view('sheet.edit', compact('sheet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sheet  $sheet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sheet $sheet)
    {
        $this->validate($request, [
            'name' => 'required|string|min:1|max:190',
            'brief' => 'required|string|min:1|max:190',
            'explanation' => 'nullable|string',
        ]);
        $updated_sheet = $request->only(['name','brief','explanation']);
        $sheet->update($updated_sheet);
        return redirect('/sheet/'.$sheet->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sheet  $sheet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sheet $sheet)
    {
        //
    }

    public function download()
    {
        $file = Sheet::with('contents','columns')->get()->toArray();
        $file_name = '';
        $headers = [
            'Content-Type' => 'text; charset=utf-8',
            'Content-Description' => 'File Transfer',
            'Content-Disposition' => "attachment; filename={$file_name}",
        ];

        return response($file, 200, $headers);
    }
}
