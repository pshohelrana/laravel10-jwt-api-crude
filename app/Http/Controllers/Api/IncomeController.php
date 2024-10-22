<?php

namespace App\Http\Controllers\Api;
use App\Models\Income;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       

        return response()->json(["incomes"=>Income::All()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       


       
        $income=new Income;
        $income->name=$request->name;
        $income->taka=$request->taka;
       
  
        
        return response()->json(['success'=>'Saved']);
        return json_encode(['success'=>'Saved']);
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)    {
        return json_encode(Income::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $income=Income::find($id);

		  $income->name=$request->name;
        $income->taka=$request->taka;
       
		
		$income->update();
      

		return json_encode(["success"=>$request->star,"ID"=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Income::find($id)->delete();
		return json_encode(["success"=>$id]);
    }
}
