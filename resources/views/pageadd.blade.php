<html>

<head>
    <title>
        Add Page
    </title>
    <link rel="stylesheet" type="text/css" href="{{asset('http://localhost/admin-panel/resources/css/login.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{asset('http://localhost/admin-panel/resources/css/header.css')}}" >
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({selector:'.tinymce'});</script>

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
                    <p>Login Information<br/>Username : <?php $name = session()->get('user_session');
                    echo $name;?></p>
                 </div> 
            </div>
        </div> 

        <div class="right-section">
            <div class="right">
                    <div class="heading">
                    <h2>Page Manager</h2>
                    </div><br/>
                  
            <div class="addpage">
            
            <div class="sea">Add page</div>   <br/>
            @if(@isset($findrec[0]))
                <form action="{{url('editdata/'.$findrec[0]->id)}}" method="post">
            @else
            @endif
                <form method="post" action="{{url('/add-page')}}" > 
                {{csrf_field()}}
                    <table>
                        <tr>
                            <td class="t1">Name*</td>
                            <td><input type="text" name="name" value="{{isset($findrec[0]->name) ? $findrec[0]->name:""}}"></td>
                        </tr>
                        <tr>
                                <td class="t1"> Content</td>
                                <td ><textarea name="content" class="tinymce" value="{{isset($findrec[0]->content) ? $findrec[0]->content:""}}" rows="15" cols="55" ></textarea></td>
                        </tr>

                        <tr>
                            <td class="t1">Status</td>
                            <td><input type="checkbox" name="status" ></td>
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
<div class="container4"></div>
</body>
</html>