<?php

namespace App\Http\Controllers\Api;
use App\Models\Withdraw;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       

        return response()->json(["withdraws"=>Withdraw::All()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       


       
        $withdraw=new Withdraw;
        $withdraw->name=$request->name;
        $withdraw->policy=$request->policy;
        $withdraw->lastname=$request->lastname;
        $withdraw->loanamount=$request->loanamount;
        $withdraw->interest_rate=$request->interest_rate;
        $withdraw->net_amount=$request->net_amount;
        $withdraw->member_id=$request->member_id;
       
        $withdraw->save();
        
  
        
        //return response()->json(['success'=>'Saved']);
        return json_encode(['success'=>'Saved']);
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)    {
        return json_encode(Withdraw::find($id));
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
        
        $withdraw=Withdraw::find($id);

        $withdraw->name=$request->name;
        $withdraw->policy=$request->policy;
        $withdraw->lastname=$request->lastname;
        $withdraw->loanamount=$request->loanamount;
        $withdraw->interest_rate=$request->interest_rate;
        $withdraw->net_amount=$request->net_amount;
        $withdraw->member_id=$request->member_id;
		

		
		$withdraw->update();
      

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
        Withdraw::find($id)->delete();
		return json_encode(["success"=>$id]);
    }
}
