<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>all products</title>
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>
    <div style="width: 50%; height: 50%;" class="container mt-5">
        <h1 style="text-align: center; ">All Transactions</h1>

        <form action="" method="GET" style="text-align: center;">
            <input class="mt-2 form-control d-inline me-2" style="width: 40%; " type="text" name="search" placeholder="Search for something">
            <button class="btn btn-primary" type="submit">Search</button>

         </form>
    <table class="table table-striped mt-5">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">payment_id</th>
            <th scope="col">amount</th>
            <th scope="col">currency</th>
            <th scope="col">created_at</th>
            <th scope="col">status</th>
            
          </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $item)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$item->payment_id}}</td>
                <td>{{$item->amount}}</td>
                <td>{{$item->currency}}</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->status}}</td>
              </tr>
        </tbody>

            @endforeach
      </table>
      @if($transactions->count() == 0)
         <sban class="d-flex justify-content-center">Data Not Found</sban>
      @endif
    </div>
</body>
</html>