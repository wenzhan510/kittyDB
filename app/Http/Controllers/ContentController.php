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
        $contents = \App\Models\Content::all();
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

        $sheet->load('columns');

        $this->validate($request, [
            'name' => 'required|string|min:1|max:190',
        ]);
        // TODO validation of content by each column

        $new_content = $request->only('name');

        $new_content['data'] = $request->only($sheet->columns->where('type','<>','link')->pluck('name')->toArray());

        foreach($sheet->columns->where('type','=','link') as $link_column){
            foreach($request[$link_column->name] as $combo){
                if(array_key_exists('key', $combo) && array_key_exists('value', $combo) && $combo['key'] ){
                    $new_content['data'][$link_column->name][$combo['key']]=$combo['value'];
                }
            }
        }

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

        $new_content = $request->only('name');

        $new_content['data'] = $request->only($sheet->columns->where('type','<>','link')->pluck('name')->toArray());

        foreach($sheet->columns->where('type','=','link') as $link_column){
            foreach($request[$link_column->name] as $combo){
                if(array_key_exists('key', $combo) && array_key_exists('value', $combo) && $combo['key'] ){
                    $new_content['data'][$link_column->name][$combo['key']]=$combo['value'];
                }
            }
        }

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
