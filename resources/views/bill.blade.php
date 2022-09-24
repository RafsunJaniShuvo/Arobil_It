<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="my-2">
                <label for="exampleFormControlInput1" class="form-label"><strong>Your Searched Page</strong></label>
            </div>
            <hr>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
              {{-- table start --}}
            <table class="table table-bordered ">
                <thead>
                  <tr>
                    <th scope="col">Sl. No</th>
                    <th scope="col">Date</th>
                    <th scope="col">Bill No</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Total Discount</th>
                    <th scope="col">Total Bill Amount</th>
                    <th scope="col">Due Amount</th>
                    <th scope="col">Paid Amount</th>
                    <th scope="col">Action</th>
                    
                  </tr>
                </thead>
             <?php
             use App\Models\Customer;
              ?>
                <tbody>
                    <tr>
                        @foreach($data as $item)
                        <th scope="row"> {{$loop->iteration}} </th>
                        <td> {{$item->date}} </td>
                        <td> {{$item->billNo}} </td>
                        <td>{{Customer::find($item->customer_id)->name}}  </td>
                        <td> {{$item->totaldiscount}} </td>
                        <td> {{$item->totalbillamount}}</td>
                        <td> {{$item->dueamount}}</td>
                        <td> {{$item->paidamount}}</td>
                       
                        <td>
                            <a href="{{route('eidtbill',['id'=>$item->id])}}" class="btn btn-success">Edit</a>
                         </td>
                      
                    
                       @endforeach
                    </tr>
                 
                
                 
                </tbody>
            </table>
        
       
        </div>
    

    </div>
    


    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
  {{-- <script>
      'use strict'
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $(document).ready(function() {
     $('#qty').click(function(e){
        alert('ok');
     });
    });


  </script> --}}
</html>