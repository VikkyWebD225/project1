<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Undo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<body>
 
    <h1 align="center">Products Undos</h1>

    <a href="{{route('add-product')}}"><button type="button" class="btn btn-outline-primary">Create</button></a>

                <a href="{{route('showproduct')}}"><button type="button" class="btn btn-outline-primary">Product View</button></a>
    

    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Image</th>
            <th scope="col">Product Name</th>
            <th scope="col">Description</th>
            <th scope="col">Expiry Date</th>
            <th scope="col">Units in Stock</th>
            <th scope="col">Operations</th>
          </tr>
        </thead>
        @foreach($products as $product)
        <tr>
            <td>{{$product['id']}}</td>
            <td>
                <img height="120" width="120" src="public/{{$product['image']}}"></td>
            <td>{{$product['productname']}}</td>
            <td>{{$product['description']}}</td>
            <td>{{$product['expirydate']}}</td>
            <td>{{$product['unitsinstock']}}</td>
            <td>

                
                
                
                
                
                <a href="#">
                <button type="button" class="btn btn-outline-danger">Delete</button>
            </a>
            <a href="{{url('product-restore/'.$product->id)}}">
                <button type="button" class="btn btn-outline-primary">Restore</button>
            </a>

            
        </td>
        </tr>
        @endforeach
    </table>
    
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>
</html>