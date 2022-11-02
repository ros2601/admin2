<html>

<head>
    <title>
     Control pannel 
    </title>
    <link rel="stylesheet" type="text/css" href="{{asset('http://localhost/admin-panel/resources/css/login.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{asset('http://localhost/admin-panel/resources/css/header.css')}}" >
    
</head>

<body>
<!----------------------------------->
<div class="container1">
    <div class="subcontainer1">
        <img src="logo.png" /> 
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
                    <h3><a href="{{url('/summarypage')}}">Change Password</a></h3><hr/>
                    <p>Login Information<br/>Username :  <?php $name = session()->get('user_session');
                    echo $name;?></p>
                 </div> 
            </div>
        </div> 

        <div class="right-section">
            <div class="right">
                    <div class="heading">
                    <h2>Category Manager</h2>
                    </div>
                       <p>  This section displays the list of Categories</p><hr size="1"/>

                    <div class="link1">
                       <a href="{{url('/addcat')}}" >Click here</a> to add <a href="{{url('/addcat')}}">New Category</a><br/>
                    </div>

                    <div class="displaypage">

                       <div class="sea">Search</div>
                           <div class="sea-table">

                           <form method="post" action="{{url('/c_search-record')}}">
                                {{csrf_field()}}
                                <table width=100%>
                                <tr>
                                       <td>Search By Category </td>
                                       <td><input type="text" name="text"><button name="submit" value="Search">Search</button></td>
                                   </tr>
                                 </table>
                            </form>
                           </div>
                       </div>
                       <br/><br/>
                       <div class="table">
                       
                       <table width=100%   border=1px solid black>
                         <tr>
                            <th>Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                         </tr>
                         @foreach($data as $row)
                         <tr>
                            <td>{{$row->name}}</td>
                            <td><a href="{{'c_edit_display/'.$row->id}}" ><img src="edit.png" width=18px height=18px></a></td>
                            <td><a href="{{'c_delete_data/'.$row->id}}" ><img src="delete.jpeg" width=18px height=18px></a></td>
                         </tr>
                        @endforeach

                       </table>
                        </div>
                        {{$data->links()}}
</div>
            </div>
        </div>
    </div>
</div>

     
<div class="container4"></div>
</body>

</html>