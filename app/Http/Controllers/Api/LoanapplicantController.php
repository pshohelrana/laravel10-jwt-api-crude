<?php

namespace App\Http\Controllers\Api;
use App\Models\Loanapplicant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoanapplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return response()->json(["loanapplicants"=>Loanapplicant::All()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

       
        $loanapplicant=new Loanapplicant;
        $loanapplicant->name=$request->name;
        $loanapplicant->mobile=$request->mobile;
        $loanapplicant->address=$request->address;
        $loanapplicant->nid=$request->nid;
        $loanapplicant->occupation=$request->occupation;
        $loanapplicant->nominee_name=$request->nominee_name;
        $loanapplicant->loan_amount=$request->loan_amount;
        $loanapplicant->interest_rate=$request->interest_rate;
       
        if(isset($request->photo)){
           $loanapplicant->photo=$request->photo;
        }
       

        $loanapplicant->save();
        if(isset($request->photo)){
            $imageName = $loanapplicant->id.'.'.$request->photo->extension();
            $loanapplicant->photo=$imageName;
            $loanapplicant->update();
            $request->photo->move(public_path('img'),$imageName);
        }
  
        
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
        return json_encode(Loanapplicant::find($id));
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
        
        $loanapplicant=Loanapplicant::find($id);

        $loanapplicant->name=$request->name;
        $loanapplicant->mobile=$request->mobile;
        $loanapplicant->address=$request->address;
        $loanapplicant->nid=$request->nid;
        $loanapplicant->occupation=$request->occupation;
        $loanapplicant->nominee_name=$request->nominee_name;
        $loanapplicant->loan_amount=$request->loan_amount;
        $loanapplicant->interest_rate=$request->interest_rate;
       
		if(isset($request->photo)){
		    $loanapplicant->photo=$request->photo;
		}

		

		if(isset($request->photo)){
			$imageName = $loanapplicant->id.'.'.$request->photo->extension();
			$loanapplicant->photo=$imageName;
			$request->photo->move(public_path('img'),$imageName);
		}
		$loanapplicant->update();
      

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
        Loanapplicant::find($id)->delete();
		return json_encode(["success"=>$id]);
    }
}
