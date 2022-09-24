<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Arobil-It!</title>
  </head>
  <body>
   

    <div class="container mt-5">
        <div class="row">
            <div class="card col-8 d-flex justify-content-center">
              @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif

                <div class="card-header">
                  Edit Page 
                </div>
                <div class="card-body">
                <div class="">
                    <form action="{{route('bilupdate',['id'=>$billupdate->id])}}" method="post">
                        @csrf
                  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Total Discount</label>

                      <input type="number" name="total_dis" class="form-control" id="exampleInputEmail1" placeholder="Total Discount" value = "{{$billupdate->totaldiscount}}">

                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Total Bill Amount</label>
                      <input type="number"name="total_amount" class="form-control" id="exampleInputPassword1" placeholder="Total Bill" value="{{$billupdate->totalbillamount}}">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">	Paid Amount</label>
                      <input type="number" name="paid_amount" class="form-control" id="exampleInputPassword1" placeholder="Paid Amount" value = "{{$billupdate->paidamount}}">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Due Amount</label>
                      <input type="number" name="due_amount" class="form-control" id="exampleInputPassword1" placeholder="Due Amount" value="{{$billupdate->dueamount}}" >
                    </div>
                  
                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                  </form>
            </div>
                </div>
              </div>
           
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>