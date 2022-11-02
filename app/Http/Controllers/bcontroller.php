<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\business;
use App\Models\addpage;
use App\Models\category;
use App\Models\product;
use Session;
use Carbon\Carbon;


class bcontroller extends Controller
{
    //OK FOR PASSWORD
    public function password(Request $request)
    {
        $name = $request->session()->get('user_session');
        $password = $request->get('opassword');
        $data = business::select('*')
            ->where('name', $name)
            ->where('password', $password)
            ->first();
        $new = $request->get('npassword');
        $confirm= $request->get('cpassword');
        echo $confirm;
        if($new==$confirm)
        {
        $count = business::select('*')
        ->where('name', $name)
        ->where('password', $password)
        ->count();
        echo $count;
        if ($count > 0) 
        {
                echo $count;
                echo $name;
                if ($request->isMethod('post')) 
                {
                    $data->password = $request->get('npassword');
                    $data->save();
                }
        }
        }
        return redirect('/password');   

    }
    //-------------------------------------------------------------------------------------

    //ok for registeration
    public function register(Request $request)
    {
    $add= new business;
    if($request->isMethod('post'))
    {
        $add->name=$request->get('name');
        $add->password=$request->get('password');
        $add->save();
    }
    return view("login");
    }

    //ok for login in admin pannel 
    public function login(Request $request)
    {
        $name = $request->get('name');
        $password = $request->get('password');
        $count = business::select('*')
            ->where('name', $name)
            ->where('password', $password)
            ->count();
        if ($count > 0) {
            session()->put("user_session", $name);
            return redirect("/summarypage");
        }
        return view("login");
    }
//------------------------------------page section------------------------------------------------------
    //ok for the summary(main) page
    public function summarypage()
    {
        return view('summarypage');   
    }
    //ok for add page form and table
    public function addpage(Request $request)
    {
    $check= new addpage;
    if($request->isMethod('post'))
    {
        $check->name=$request->get('name');
        $check->content=$request->get('content');
        $status=$check->status=$request->get('status');

        if($status=='on')
        {
         $status=1;
        }
        else{
         $status=0;
        }

        $check->status=$status;
        $check->save();
    }
    return redirect('/summarypage');   
    }
    
    //ok for displaying content in summarypage
    public function d_summarypage()
    {
      $data=addpage::simplepaginate(10);
      return view('summarypage',compact('data'));
    }

    //ok to delete data in summarypage
    public function deletedata($id)
    {  
          $obj= addpage::find($id);
          $obj->delete();
          return redirect("summarypage");
    }
    
    //ok to display data in edit
    public function editpage($id)
    {
      $findrec=addpage::where('id',$id)->get();
      return view('pageadd',compact('findrec'));
    }

    //ok to save edit changes
    public function editdata(Request $request, $id='')
    {  
       $add=addpage::find($id);
       if($request->isMethod('post'))
     {
         $add->name=$request->get('name');
         $add->content=$request->get('content');
         if (!empty($request->get('status')))
         {
             $status = 1;
         } 
         else {
             $status = 0;
         }
         $add->status=$status;
         $add->save();
     }
     return redirect("summarypage");
    }
    
    //ok for search 
    public function search(Request $request)
    {
      if($request->isMethod('post'))
      {
         $name=$request->get('text');
         $data=addpage::where('name','Like','%'.$name.'%')->simplepaginate(10);
      }
      return view('summarypage',compact('data'));
    }
    //------------------------------------------------------------------------------------------

    //for logout
    public function logout()
    {
        Session::flush();
        return redirect('login');
    }
//----------------------------------------for category section---------------------------------------
    //ok for add page form and table
    public function addcategory(Request $request)
    {
        $check= new category;
        if($request->isMethod('post'))
        {
        $check->name=$request->get('name');
        $check->save();
        }
        return redirect('/summarycat');   
    }
    //ok for displaying content in summarypage
    public function d_summarycat()
    {
        $data=category::simplepaginate(10);
        return view('summarycat',compact('data'));
    }
    //ok to delete data in summarycat
      public function c_deletedata($id)
      {  
           $obj= category::find($id);
           $obj->delete();
           return redirect("summarycat");
      }

     //ok for edit in category
     public function c_editdisplay($id)
     {
         $findrec=category::where('id',$id)->get();
         return view('addcategory',compact('findrec'));
     }
    
     //ok to save changes in category
    public function c_editdata(Request $request, $id='')
    {  
       $add=category::find($id);
       if($request->isMethod('post'))
     {
         $add->name=$request->get('name');
    
         $add->save();
     }
     return redirect("summarycat");
    }
    //ok for search 
    public function c_search(Request $request)
    {
        if($request->isMethod('post'))
        {
        $name=$request->get('text');
        $data=category::where('name','Like','%'.$name.'%')->simplepaginate(10);
        }
        return view('summarycat',compact('data'));
    }
//----------------------for product section----------------------------------------------------
//for displaying content of cat in product page
 
public function addproductpage()
{
   $data=category::all();
    return view('productadd',compact('data'));
}
public function p()
{
    $data=category::simplepaginate(10);
    return view('summarycat',compact('data'));
}
//for add page form and table
public function addproduct(request $request)
{
    $this->validate($request,['c_id'=>'required']);
    $this->validate($request,['name'=>'required']);
    $this->validate($request,['price'=>'required']);
    $this->validate($request,['description'=>'required']);
    $add= new product;

    if($request->isMethod('post'))
    {
    $add->c_id=$request->get('c_id');
    $add->name=$request->get('name');
    $add->price=$request->get('price');
    $add->description=$request->get('description');


    if(!empty($request->file('image')))
    {
        $file=$request->file('image');
        $current=uniqid(Carbon::now()->format('Ymdhs'));
        $file->getClientOriginalName();
        $file->getClientOriginalExtension();
        $fullfilename=$current.".".$file->getClientOriginalExtension();

        $destinationPath=public_path('uploads');
        $file->move($destinationPath,$fullfilename);
        $add->image=$fullfilename;
    }
    $add->save();
    }
    return redirect('/summaryproduct');
}
 //for displaying content in summary product page
 
 public function summaryproduct()
 {
    $product=product::simplepaginate(3);
    return view('summaryproduct',compact('product'));
 }
 //to delete data in products
 public function p_deletedata($id)
 {  
      $obj= product::find($id);
      unlink('uploads/'.$obj->image);
      $obj->delete();
      return redirect("summaryproduct");
 }
//............for edit in category
public function p_editdisplay($id)
{
    $data=category::all();
    $findrec=product::where('id',$id)->get();
    return view('productadd',compact('findrec','data'));
}
  

//to save changes in edit product
public function p_editdata(Request $request, $id='')
{  
    $add=product::find($id);
    $image = $add->image;
   // print_r($image);
   if($request->isMethod('post'))
   {   
      $add->name=$request->get('name');
      $add->price=$request->get('price');
      $add->description=$request->get('description');
      $add->c_id=$request->get('c_id');
      
      if(!empty($request->file('image')))
      {
          $file=$request->file('image');
         $current=uniqid(Carbon::now()->format('Ymdhs'));
          $file->getClientOriginalName();
          $file->getClientOriginalExtension();
          $fullfilename=$current.".".$file->getClientOriginalExtension();
          $destinationPath=public_path('uploads');
          $file->move($destinationPath,$fullfilename);
          $add->image=$fullfilename;
          unlink('uploads/'. $image);
      }
      $add->save();
  }
    
     
  return redirect("summaryproduct");
 }
   //ok for search
   public function psearch(Request $request)
   {
       if($request->isMethod('post'))
       {
       $name=$request->get('text');
       $product=product::where('name','Like','%'.$name.'%')->simplepaginate(10);
       }
       return view('summaryproduct',compact('product'));
   }
}
