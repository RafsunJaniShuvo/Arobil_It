<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="my-2">
                <label for="exampleFormControlInput1" class="form-label"><strong>Input Form</strong></label>
            </div>
            <hr>

            
            {{-- billNO start --}}
             <div class="row mb-2 ">
                <div class="mt-2 col-2">
                    {{-- <label for="bill" class="form-label">Seach With Bill</label> --}}
                    <input type="number" class="form-control" id="bill" placeholder="Bill NO">
                   
                </div>
                <div class="col-4 mt-2  ">
                    <button type="button" class="btn btn-primary">Find</button>
                </div>
    
            </div>
                {{-- billNO End --}}


                <div class="row mb-3">
                    <div class="col-4">
                        <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    </div>
                    <div class="col">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            </select>
                    </div>
                    <div class="col">
                        <input type="date">
                    </div>
    
                </div>


                {{-- table start --}}
            <table class="table table-bordered ">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product </th>
                    <th scope="col">Rate</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Net Amount</th>
                 
                  </tr>
                </thead>
                <?php
                use App\Models\Product;
                ?>
                <tbody>
                
                    @foreach($products as $item)
                    @php
                    $total =0;
                  @endphp
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{Product::find($item->product_id)->name}}</td>
                        <td>{{$item->Rate}}</td>
                        <td>
                           <input type="text" type="number" name="" id="" value="{{$item->qty}}"> 
                        </td>
                       
                        <td>{{$item->discount}}</td>
                        @php
                        $total += $item->Rate*$item->qty;
                       
                        @endphp
                        <td>{{$total-$item->discount}} </td>
                       
                    </tr>
                 
                    @endforeach
                 
                </tbody>
            </table>
            {{-- table-end --}}
       
        </div>

        <div class="row flex-column align-items-end">
            <div class="col-4 ">
                <label for="">Net Total</label>
                <input type="text" class="form-control" >
            </div>
            <div class="col-4">
                <label for="">Discount Total</label>
                <input type="text" class="form-control" >
            </div>
            <div class="col-4">
                <label for="">Paid Amount</label>
                <input type="text" class="form-control" >
            </div>
            <div class="col-4">
                <label for="">Due Amount</label>
                <input type="text" class="form-control" >
            </div>
            <div class="col-4 my-2">
                <button class="btn btn-primary col-6" type="submit">Button</button>
            </div>
        </div>

    </div>
    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>