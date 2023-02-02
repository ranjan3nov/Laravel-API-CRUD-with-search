<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sclass;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;


class SclassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sclass = Sclass::all();
        return response()->json($sclass);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            "class_name" => "required|min:3|max:5"
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } else {

            $sclass = new Sclass;
            $sclass->class_name = $request->class_name;
            $sclass->save();
            return ["result" => "Success"];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sclass = Sclass::find($id);
        return $sclass;
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
        $sclass = Sclass::find($id);
        $sclass->class_name = $request->class_name;
        if ($sclass->update()) {

            return ["result" => "Success"];
        } else {

            return ["result" => "failed"];
        };
        return ["result" => "failed"];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sclass = Sclass::find($id);
        if ($sclass->delete()) {

            return ["result" => "Success"];
        } else {

            return ["result" => "failed"];
        };
    }
}
