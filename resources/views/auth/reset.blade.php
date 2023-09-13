<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="{{ asset('/frontend/css/custom.css') }}">

    <link rel="stylesheet" href="/frontend/css/custom.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<!-- Font-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">


</head>
<body>
    <div class="card" style=" border-radius: 50px;">
        <img style="width: 85px;margin-left: auto; margin-right: auto;" src="/images/puplogo.png">
        <br>

    <div class="container">
        <div class="row">
            
            <h2>On-<span>t</span>he-<span>j</span>ob<span> T</span>raining<span> I</span>nformation<span> M</span>anagement<span> S</span>ystem</h2>
                <h4>Reset Password</h4>


                
                <form action="{{ route('password.update') }}" method="post">

                         @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        @if(Session::has('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif


                    @csrf

                    <br>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" placeholder="Enter Email"
                        name="email" >
                

                    </div>
                    

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Enter Password"
                        name="password" >
                

                    </div>

                    <div class="form-group">
                        <label for="password">Confirm Password</label>
                        <input type="confirm_password" class="form-control" placeholder="Enter Confirmed Password"
                        name="confirm_password" >
                

                    </div>
                    
                    
                    

                    





                    <br>

                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">Reset</button>
                    </div>

                    <br>
                    <a href="login">Login Here...</a>

</form>
            </div>

        </div>
    

</div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>