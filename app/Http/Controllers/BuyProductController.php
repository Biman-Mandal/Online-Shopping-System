<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\profile;
use App\Models\buyproduct;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Validator;
class BuyProductController extends Controller
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function CartAction(Request $request,$id){
        // echo "<pre>";
        $ProductData=product::find($id);
        $cart=session()->get('cart');
        // print_r(session()->all());
        // die();
        if (!$cart) {
            $cart=[
                $id=>[
                    'product_id'=>$ProductData->id,
                    'product_name'=>$ProductData->ProductName,
                    'product_brand'=>$ProductData->BrandName,
                    'product_image'=>$ProductData->Image1,
                    'product_price'=>$ProductData->Price,
                    'quantity'  =>1
                ]
            ];
            session()->put('cart',$cart);
            return back()->with('Homesuccess', 'Item added to cart !');
        }
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart',$cart);
            return back()->with('Homesuccess', 'Item added to cart !');
        }
        $cart[$id]=[
            'product_id'=>$ProductData->id,
            'product_name'=>$ProductData->ProductName,
            'product_brand'=>$ProductData->BrandName,
            'product_image'=>$ProductData->Image1,
            'product_price'=>$ProductData->Price,
            'quantity'  =>1
        ];
        session()->put('cart',$cart);
        return back()->with('Homesuccess', 'Item added to cart !');
    }


    public function ViewCart(Request $request){
        if (session()->has('cart')) {
            return view('Product/ViewCart');
        }else{
            return back()->with('Homesuccess','Cart is empty');
        }    
    }



    public function RemoveCart(Request $request,$id){
        echo "<pre>";
        $cart=session()->get('cart');
        print_r($cart[$id]);

         print_r(session()->all());
        // die();
        // $cart['previous']['url'];
        if (isset($cart[$id])){
            if ((session()->forget($cart[$id])) ) {
                return back()->with('Homesuccess','Product removed from cart');
            }else{
                return back()->with('Homesuccess','Error');
            }
            // die();
            
        }else{
            return back();
        }
       
    }
    public function CartVerifyFun(Request $request){
        // echo "<pre>";
        $Data=session()->all();
        // print_r($Data);
        if (isset($Data['ProfileId']) && isset($Data['cart'])) {
        $id=$Data['ProfileId'];
        $DB_Data=profile::find($id);
        return view('Product/AfterCartVerify')->with('DatabaseData',$DB_Data);
         }else{
            return redirect('/')->with('Homesuccess','Login First');
         }

    }
    public function FinalVeriFun(Request $request){

        $ProfileId=session()->get('ProfileId');
        $SessionData=session()->all();
        echo "<pre>";
        // print_r($SessionData);
        $ProfileData=profile::find($ProfileId);
        
        
        $data=$request->input();
        $obj=new profile;


        echo "<pre>";

        $validator = Validator::make($request->all(), [        
            'CustomerAddress' => 'required',
        ]);
         if ($validator->fails()) {
        return back()
                    ->withErrors($validator)
                    ->withInput();
          }else{

        $user=$obj::where("id",$ProfileId)->first();
        $user->CustomerAddress=$request->CustomerAddress;
        $user->CustomerEmail=$request->CustomerEmail;

        if ($user->save()){
            $ProductS_Data=session()->get('cart');
            $BuyPObj=new buyproduct;
            $count=1;
            $total=0;
            $ProductID=1;
            foreach ($ProductS_Data as $id => $Data) {
               $ProductID='ProductID'.$count;
               $BuyPObj->$ProductID=$id;                 
               $count++;
               $sub_Total=$Data['product_price']*$Data['quantity'];
               $total+=$sub_Total;
            }
            $BuyPObj->ProfileID=$ProfileId;
            $BuyPObj->PaymentType="Online";
            $BuyPObj->TotalAmount=$total;
            $BuyPObj->BuyProductToken=Carbon::now()->format('Ymdt') .'$BM'.  bin2hex(random_bytes(6));
            
            $CustomerData=[
             'CustomerName'=>$ProfileData->CustomerName,
             'CustomerPhone'=>$ProfileData->CustomerPhone,
             'TotalAmount'=>$total
            ];
           if ($BuyPObj->save()) {
                return redirect('/payment')->with('CustomerDataKey',$CustomerData);
            }else{
                return redirect('/')->with('Homesuccess','Error !! please try after sometime');
            }
        }else{
            return redirect('/')->with('Homesuccess','Error !! please try after sometime');
        }
    }
}
    
}
