<?php

namespace App\Http\Controllers\Api;
use App\Models\Loansystem;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoansystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       

        return response()->json(["loansystems"=>Loansystem::All()]);
    // $loansystem=Loansystem::All();
    // return response()->json(['loansystems'=>$loansystem]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
      


       
        
        return json_encode(['success'=>'Saved']);
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)    {
        return json_encode(Loansystem::find($id));
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
        /*
        $product=Product::find($id);

		$product->name=$request->name;
		$product->offer_price=$request->offer_price;
		$product->manufacturer_id=$request->manufacturer_id;
		$product->regular_price=$request->regular_price;
		$product->description=$request->description;

		if(isset($request->photo)){
		    $product->photo=$request->photo;
		}

		$product->product_category_id=$request->product_category_id;
		$product->product_section_id=$request->product_section_id;
        $product->product_type_id=1;
		$product->is_featured=$request->is_featured;
		$product->star=$request->star;
		$product->is_brand=$request->is_brand;
		$product->offer_discount=$request->offer_discount;
		$product->uom_id=$request->uom_id;
		$product->weight=$request->weight;
		$product->barcode=$request->barcode;

		if(isset($request->photo)){
			$imageName = $product->id.'.'.$request->photo->extension();
			$product->photo=$imageName;
			$request->photo->move(public_path('img'),$imageName);
		}
		$product->update();
      */

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
        Loansystem::find($id)->delete();
		return json_encode(["success"=>$id]);
    }
}
