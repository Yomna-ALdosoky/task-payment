<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style type="text/css">
   
    </style>
</head>
<body>
    <div style="width: 400px; height:100vh"  class="container mt-5">
        <h1 class="text-center">Welcome</h1>
            @if(Session::has('message'))
                <div class="alert alert-{{Session::get('message') == 'success' ? 'success' : 'danger'}}">{{ Session::get('message') }}</div>
            @endif
        <div  class="card d-flex align-items-center justify-content-center p-3">
            <form method="POST" action="{{route('payment')}}">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Price</label>
                  <input name="price" type="number" class="form-control">
                  <div id="emailHelp" class="form-text d-none">We'll never share your email with anyone else.</div>
                </div>
                <button type="submit"  class="btn btn-primary">Submit</button>
              </form>
        </div>
        
    </div>

    
</body>
</html>