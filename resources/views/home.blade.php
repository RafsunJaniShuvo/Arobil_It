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
                <label for="exampleFormControlInput1" class="form-label"><strong>Input Form</strong></label>
            </div>
            <hr>
            @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

         <form action="{{route('bill')}}" method="POST">
            @csrf
                 {{-- billNO start --}}
            <div class="row mb-2 ">
            <div class="mt-2 col-2">
                {{-- <label for="bill" class="form-label">Seach With Bill</label> --}}
                <input type="number" name="bill" class="form-control" id="bill" placeholder="Bill NO">
                
            </div>
            <div class="col-4 mt-2  ">
                <button type="submit" class="btn btn-primary">Find</button>
            </div>
           
        </form>
            </div>
                {{-- billNO End --}}
                <form action="{{route('amountSave')}}" method="POST">
               
                    <div class="row mb-3">
                        
                            <div class="col-4">
                              
                                <select name="" class="form-control text-center" id="product" required>
                                    <option selected>Select Product or Item </option>
                                    @foreach ($data as $key => $valuees)
                                    <option class="prod" data-all="{{$valuees}}" value="{{$valuees->id}}">{{ $valuees->name}}</option>
                                    @endforeach
                                </select>
                          
                            </div>
                   
                            <div class="col-4">
                                <select name="customer_id" class="form-control text-center" id="" required>
                                    <option selected>Select Customer </option>
                                    @foreach ($customer as $key => $valuees)
                                    <option value="{{$valuees->id}}">{{ $valuees->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                 
                            <div class="col-4">
                                <input name="date" type="date">
                            </div>
                     
                    </div>
                {{-- table start --}}
            {{-- <table class="table table-bordered ">
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
                    @php
                    $Net_total =0;
                    $discount_total = 0;
                  @endphp
                    @foreach($products as $item)
                    @php
                    $total =0;
                  @endphp
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{Product::find($item->product_id)->name}}</td>
                        <td>{{$item->Rate}}</td>
                        <td>   
                         
                           <input  type="number" name="" id="qty" value="{{$item->qty}}"> 
                          
                        <td>
                            <input type="number" value="{{$item->discount}}">
                        </td>
                        @php
                        $total += $item->Rate*$item->qty;
                         $Net_total+= $item->Rate*$item->qty;
                         $discount_total += $item->discount;
                       
                        @endphp
                        <td>{{$total - $item->discount}} </td>
                       
                    </tr>
                 
                    @endforeach
                 
                </tbody>
            </table> --}}

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
                <tbody id="table_data">
                    
                </tbody>
            </table>
            {{-- table-end --}}
        </div>
        
            @csrf
            <div class="row flex-column align-items-end">
            <div class="col-4 ">
                <label for="netTotal">Net Total</label>
                <input type="text" class="form-control" name="totalbillamount" id="netTotal" value="0"  readonly>
            </div>
            <div class="col-4">
                <label for="">Discount Total</label>
                <input type="text" class="form-control" id="discount_total" name="discountTotal" value="0" readonly>
            </div>
            <div class="col-4">
                <label for="">Paid Amount</label>
                <input type="text" name="paidAmount" class="form-control" >
            </div>
            <div class="col-4">
                <label for="">Due Amount</label>
                <input type="text" name="dueAmount" class="form-control" >
            </div>
            <div class="col-4 my-2">
                <button class="btn btn-primary col-6" type="submit">Save Changes</button>
            </div>
            </div>
        </form>

    </div>
    


    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
  <script>
    'use strict'
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    var productArr = [];

    function calculateNetAmount(rate, qty, discount) {
        return ( parseFloat(rate) * parseInt(qty) ) - parseFloat(discount)
    }

    function grandTotal() {
        let discount = 0;
        let net_amount = 0;
        $('.discount').each(function(){
            discount += parseInt($(this).val());
        });
        $('.net_amount').each(function(){
            net_amount += parseInt($.trim($(this).text()));
        });

        $('#discount_total').val(discount);
        $('#netTotal').val(net_amount);
    }

    $(document).ready(function() {
        $('#product').change(function(){
            let productId = $(this).find(':selected').val();

            var url = '{{ route("getDataByAjax", ":id") }}';
            url = url.replace(':id', productId);
            $.post(url, function(data){
                if(!(productArr.indexOf(productId) !== -1)) {
                    let netAmount = calculateNetAmount(data.rate, data.qty, data.disc);
                    let table_data = '<tr>'+
                            '<td>1</td>'+
                            '<td>'+ data.name +'</td>'+
                            '<td id="rate_'+data.id+'">'+ data.rate +'</td>'+
                            '<td><input class="recalculate" data-id="'+data.id+'" id="qty_'+data.id+'" type="number" value="'+ data.qty +'" /></td>'+
                            '<td><input class="recalculate discount" data-id="'+data.id+'" id="dic_'+data.id+'" type="number" value="'+ data.disc +'" /></td>'+
                            '<td class="net_amount" id="net_'+data.id+'">'+ netAmount +'</td>'+
                        '<tr>';
                    $('#table_data').append(table_data);

                    productArr.push(productId);
                    grandTotal();
                }
            });
        });

        
    });

    $(document).on('change', '.recalculate', function() {
        let id = $(this).data('id');
        let rate = $.trim($('#rate_' + id).text());
        let qty = $('#qty_' + id).val();
        let dis = $('#dic_' + id).val();

        let amount = calculateNetAmount(rate, qty, dis)
        $('#net_' + id).text('').text(amount);

        grandTotal()
    });


  </script>
</html>