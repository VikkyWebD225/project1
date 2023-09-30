
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product - Dashboard Admin Template</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    
</head>

<body>

   
                           
    <div class="card text-center">
        <div class="card-header">
          Product Edit
        </div>
        <div class="card-body">
         
            <form action="{{url('update-products',$products->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
            @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif 
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
             
            Image: <input type="file" name="image" ><br/><br/>
            Product Name <input type="text" name="prodname" placeholder="Enter the product name" value="{{$products->productname}}"><br/><br/>

            Description <textarea name="description" >{{$products->description}}</textarea></<br/><br/>

            Expiry Date <input type="date" name="expdate" value="{{$products->expirydate}}" ><br/><br/>

            Units in Stock <input type="number" name="stock" value="{{$products->unitsinstock}}"><br/><br/>

            

            <input type="submit" name="submit" value="Update"><br/><br/>

            </form>
          
        </div>
       
      </div>

       
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>