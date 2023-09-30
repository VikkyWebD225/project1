<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    

    <div class="card text-center">
        <div class="card-header">
          Product Insertion
        </div>
        <div class="card-body">
         
            <form action="{{route('productinsert')}}" method="post" enctype="multipart/form-data">
                @csrf
            @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif 
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
             
            Image: <input type="file" name="image"><br/><br/>
            Product Name <input type="text" name="prodname" placeholder="Enter the product name"><br/><br/>

            Description <textarea name="description"></textarea><br/><br/>

            Expiry Date <input type="date" name="expdate" ><br/><br/>

            Units in Stock <input type="number" name="stock"><br/><br/>

            

            <input type="submit" name="submit" value="Add" class="btn btn-primary">

            </form>

          
        </div>
       
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>