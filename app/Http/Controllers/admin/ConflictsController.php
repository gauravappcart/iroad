<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Conflicts;
use App\Models\ConflictsResolvedInformation;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ConflictsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('ConflictsController Index');
        $result['conflicts']=Conflicts::with('sites')->with('companies')->where('company_id',session()->get('company_id'))->orderBy('created_at','desc')->get()->toArray();
        // dd($result);
        return view('admin/conflict_list',$result);
    }

    public function get_conflicts_details(Request $request){


        try {
            $result['record'] = Conflicts::findOrFail($request->id);
            if($result['record']){
                $result['conflicts_details']= Conflicts::with(['conflicts_media','conflicts_resolved_information','sites','companies'])->where('conflict_id',$request->id)->get()->toArray();
                // dd($result['conflicts_details']);
                return view('admin/conflict_details', $result);
            }else{
                return back()->withErrors(['msg' => 'Record not found']);
            }
        } catch (ModelNotFoundException $e) {
            // dd(url('/'));
            // dd($request->fullUrl());
            return back()->withErrors(['msg' => 'Record not found']);
        }

        // if($request->id){

        // }else{

        // }
    }


    public function save_conflicts_information(Request $request){
        if($request->resolved==1){
            $material_update=Conflicts::where('conflict_id', $request['conflict_id'])->update([
                'confirmed_by'=>session()->get('user_id'),
                'confirmed'=>$request->resolved?1:0,
                'confirmed_date'=>now(),
            ]);

           $data= ConflictsResolvedInformation::create(
                [
                    'conflict_id'=>$request->conflict_id,
                    'resolved_comment'=>$request->resolved_comment,
                    'created_by'=>session()->get('user_id'),
                    'updated_by'=>session()->get('user_id'),
                ]
            );
            if($data){

                $result = array('status' => true, 'msg' => 'Comment Updated Successfully And Conflict Resolved Is Also Marked.');
            }
            else{
                $result = array('status' => false, 'msg' => 'Something Went Wrong');
            }
        }else{
            $data=ConflictsResolvedInformation::create(
                [
                    'conflict_id'=>$request->conflict_id,
                    'resolved_comment'=>$request->resolved_comment,
                    'created_by'=>session()->get('user_id'),
                    'updated_by'=>session()->get('user_id'),
                ]
            );

            if($data){

                $result = array('status' => true, 'msg' => 'Comment Updated Successfully');
            }else{
                $result = array('status' => false, 'msg' => 'Something Went Wrong');
            }
        }
        echo json_encode($result);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Conflicts  $conflicts
     * @return \Illuminate\Http\Response
     */
    public function show(Conflicts $conflicts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Conflicts  $conflicts
     * @return \Illuminate\Http\Response
     */
    public function edit(Conflicts $conflicts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conflicts  $conflicts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conflicts $conflicts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conflicts  $conflicts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conflicts $conflicts)
    {
        //
    }
}
