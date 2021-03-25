<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(product $obj)
    {
        $Data=$obj->get();
        return view('HomePage')->with('ProductData',$Data);
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
        echo "<pre>";
        $data=$request->all();
        $token=bin2hex(random_bytes(15));
        $data['Token']=$token;
        
        $Image=$request->file('Image1');
        $Imagename=$Image->getClientOriginalName();
        $Imagepath=$Image->path();
        $new_name_Image = rand() . '.' . $Image->getClientOriginalExtension();
        $data['Image1']=$new_name_Image;
        $StoreImage=move_uploaded_file($Image,'StoredImages/'.$new_name_Image);
        // Image 2
        if (isset($data['Image2'])) {
        $Image2=$request->file('Image2');
        $Imagename2=$Image2->getClientOriginalName();
        $new_name_Image2 = rand() . '.' . $Image->getClientOriginalExtension();
        $data['Image2']=$new_name_Image2;
        $StoreImage2=move_uploaded_file($Image2,'StoredImages/'.$new_name_Image2);
        }
        
        if (isset($data['Image3'])) {    
        $Image3=$request->file('Image3');
        $Imagename3=$Image3->getClientOriginalName();
        $new_name_Image3 = rand() . '.' . $Image->getClientOriginalExtension();
        $data['Image3']=$new_name_Image3;
         $StoreImage3=move_uploaded_file($Image3,'StoredImages/'.$new_name_Image3);
        }
    

        $obj=new product($data);
        $count=count($data);
        // print_r($data);
        // exit();
        $save=$obj->save();
        if ($save) {
            return redirect('/InsertProduct');
        }
        print_r($data);
        // exit();

        /*
        
        $Image=$request->file('TeacherImage');
        $Imagename=$request->file('TeacherImage')->getClientOriginalName();
        $Imagepath=$request->TeacherImage->path();
        $new_name_Image = rand() . '.' . $Image->getClientOriginalExtension();
        $Data['TeacherImage']=$new_name_Image;
        $StoreImage=move_uploaded_file($Imagepath,'StoredImages/'.$new_name_Image);

        */

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(product $obj,$id,Request $request)
    {
        $Data=$obj::find($id);
        // echo "<pre>";
        // print_r($Data);
        // exit();
        // $Data[0]['ProductName'];

        return view('Product/ProductView')->with('ProductData',compact('Data'));  
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
}
