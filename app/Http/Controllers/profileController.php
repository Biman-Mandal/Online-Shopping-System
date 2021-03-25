<?php

namespace App\Http\Controllers;
use App\Models\profile;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Auth;
use Session;
use App\SendCode;
use Socialite;
// use App\Http\Controllers\CabRes;
class profileController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function redirectToProvider()
    {
        // echo "Hello";
        return Socialite::driver('google')->stateless()->redirect();
    }


    public function handleProviderCallback(Request $request)
    {

       $user = Socialite::driver('google')->stateless()
      ->with(["access_type" => "offline", "prompt" => "consent select_account"])->user();
       $request->Session()->put('GoogleData', $user);
       return redirect('/GoogleData');
    }


    public function googleDataStore(Request $request){
        if($exception instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException){
            return redirect('/');
        }
         $validator = Validator::make($request->all(), [ // <---            
            'CustomerPass' => 'min:6|required_with:CustomerRePass|same:CustomerRePass',
            'CustomerRePass' => 'min:6',
        ]);
        if ($validator->fails()) {
        return redirect('/GoogleData')
                    ->withErrors($validator)
                    ->withInput();
          }else{
            $data=$request->input();
            $SessionData=Session()->get('GoogleData');
            $data['CustomerName']=$SessionData->name;
            $data['CustomerEmail']=$SessionData->email;
            $data['CustomerEmailActive']=1;
           
            $Pass=$request->CustomerPass;
            $Phone=$request->CustomerPhone;
            $hashed = Hash::make($Pass, [
                        'rounds' => 12,
                    ]);
            $data['CustomerPass']=$hashed;
            $obj=new profile($data);
            if ($obj->save()) {
                Auth::logout();
                Session::flush();
                return redirect('/Account')->with('success','Account Created.Please Login..');
            }

          }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // exit();
        
     $validator = Validator::make($request->all(), [ // <---
            'CustomerName' =>'required',
            'CustomerPass' => 'min:6|required_with:CustomerRetype|same:CustomerRetype',
            'CustomerRetype' => 'min:6',
            'CustomerEmail' => "required|unique:profiles,CustomerEmail",
            'CustomerPhone'=>'min:10 | max:12',
            'CustomerPhone'=>'required| unique:profiles,CustomerPhone',
        ]);
      if ($validator->fails()) {
        return redirect('/Account')
                    ->withErrors($validator)
                    ->withInput();
        }else{
            echo "<pre>";
            $data=$request->input();
            $Pass=$request->CustomerPass;
            $Phone=$request->CustomerPhone;
            $hashed = Hash::make($Pass, [
                        'rounds' => 12,
                    ]);
            $data['CustomerPass']=$hashed;
            $data['PhoneActive']=0;
           
            $data['CustomerPhoneToken']=SendCode::Sendcode($Phone);
            if ($data['CustomerPhoneToken']){
            
            $obj=new profile($data);
            // print_r($Phone);
            // exit();
            $obj->save();
            $request->Session()->put('PhoneNumber', $Phone);
            return redirect('/verifyPhone');


            }else{

            }
            
        }

        
    }
     public function Verify(Request $request){
        $validator = Validator::make($request->all(), [ // <---
            'CustomerPhoneToken' => 'required|numeric|digits:4',
        ]);
          if ($validator->fails()) {
                 if ($validator->fails()) {
            return redirect('/verifyPhone')
                        ->withErrors($validator)
                        ->withInput();
              }
         }
         else{
            echo "<pre>";
            $obj=new profile;
            // $data=$request->all();
            $user=$obj::where("CustomerPhone",$request->input("CustomerPhone"))->first();
            echo "<pre>";
            // print_r($data);
            if($user->CustomerPhoneToken)
             {
                $user->CustomerPhoneToken=null;
                $user->PhoneActive=1;

                if ($user->save()) {
                    Auth::logout();
                    Session::flush('PhoneNumber');
                    return redirect('Account')->with('success','Account Created & Phone Number Varified');
                }else{
                     return back()->withErrors("Please try after sometime");
                }
             }else{
                
                return back()->withErrors("Otp does not match, please enter correct Otp");
                // Session::get('PhoneNumber');
                
                // Session::forget('PhoneNumber');
                // $request->session()->flush('PhoneNumber');
             }
         }
 }
 public function VerifyLater(){
     Session::flush('PhoneNumber');
     return redirect('Account')->with('success','Account Created & Phone Number not Varified');
 }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function Login(Request $request){
        $obj=new profile;
        // 
        $data=$request->input();
        // $userEmail=$obj::where('CustomerEmail', $request->input('LoginUser'))->get();
        // $userPhone=$obj::where('CustomerPhone', $request->input('LoginUser'))->get();
        $user = $obj::where('CustomerEmail', $request->input('LoginUser'))
                    ->orWhere('CustomerPhone', $request->input('LoginUser'))
                     ->get();

        if ($user->isEmpty()) {
             return back()->with('success', 'You don\'t have an account please create one');
        }else{
          if (Hash::check($request->input('LoginPass'), $user[0]['CustomerPass'])){
                // $request->Session()->put('Profile',$profile);
            echo "<pre>";
            $id=$user[0]['id'];
            $request->Session()->put('ProfileId',$id);
            $request->Session()->put('IsLogin','Login');
            return redirect('/')->with('Homesuccess','Login Successful');
          }else{
             return back()->with('success', 'The user name or password is incorrect');
          }
        }
    }
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
    public function Logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        return back()->with('Homesuccess','Logout Successful');
    }
}
