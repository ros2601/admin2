<html>

<head>
    <title>
    Add Products
    </title>
    <link rel="stylesheet" type="text/css" href="{{asset('http://localhost/admin-panel/resources/css/login.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{asset('http://localhost/admin-panel/resources/css/header.css')}}" >
    
</head>

<body>
<!----------------------------------->
<div class="container1">
    <div class="subcontainer1">
    <image src="{{asset('logo.png')}}" />
        <button><a href="{{url('/logout')}}">Logout</a></button>
    </div>
</div> 
<!----------------------------------->
<div class="container2">
    <div class="subcontainer2">
    <?php
       echo date('d-m-Y');
       ?>
    </div>   
</div>
<!----------------------------------->
<div class="maincontainer">
    <div class="innerconatiner">

        <div class="left-section">
            <div class="left">
                <br/>
                <div class="content1">
                    <h3><a href="{{url('/summarypage')}}">Page Summary</a></h3><hr/>
                    <p><a href="{{url('/addpage')}}">Add Page</a></p><hr/>
                    <h3><a href="{{url('/summarycat')}}">Category Summary</a></h3><hr/>
                    <p><a href="{{url('/addcat')}}">Add Category</a></p><hr/>
                    <h3><a href="{{url('/summaryproduct')}}">Product Summary</a></h3><hr/>
                    <p><a href="{{url('/addproduct')}}">Add Product</a></p><hr/>
                    <h3><a href="{{url('/password')}}">Change Password</a></h3><hr/>
                    <p>Login Information<br/>Username : admin</p>
                 </div> 
            </div>
        </div> 

        <div class="right-section">
            <div class="right">
                    <div class="heading">
                    <h2>Product Manager</h2>
                    </div>

                  
            <div class="addpage">
            <div class="sea">Add Product</div><br/>
            
            @if(@isset($findrec[0]))
                <form action="{{url('p_editdata/'.$findrec[0]->id)}}" method="post" enctype="multipart/form-data">
            @else
                <form method="post" enctype="multipart/form-data" action="{{url('/add-product')}}" > 
            @endif

                {{csrf_field()}}
                
                <div class="product">
                    <table>
                        <tr>
                            <td></td>
                            <td>
                            <select name="c_id">Choose Category
                            @foreach($data as $row)
                              <option value="{{$row->name}}">  {{$row->name}}</option>
                            @endforeach
                            </select>
                           </td>
                   
                        </tr>

                        <tr>
                            <td class="t1">Name*</td>
                            <td><input type="text" name="name" value="{{isset($findrec[0]->name) ? $findrec[0]->name:""}}"></td>
                        </tr>
                        <tr>
                            <td class="t1">Price</td>
                            <td><input type="text" name="price" value="{{isset($findrec[0]->price) ? $findrec[0]->price:""}}"></td>
                        </tr>
                
                        <tr>
                            <td class="t1"> Description</td>
                            <td ><input type="text" name="description" rows="5" cols="55" value="{{isset($findrec[0]->description) ? $findrec[0]->description:""}}"></td>
                        </tr>

                        <tr>
                            <td class="t1">Image</td>
                            <td><input type="file" name="image" value="{{isset($findrec[0]->image) ? $findrec[0]->image:""}}">Choose any picture </td>
                            
                        </tr>
        
                    </table>

                    <div class="btns" >
                         <input type="submit" name="save" value="Save" />
                         <input type="button" name="cancel" value="Cancel" />  
                    </div>
               </form>  
            </div>
            </div>
        </div>
    </div>
</div>

</div>
<div class="container4"></div>
</body>
</html>