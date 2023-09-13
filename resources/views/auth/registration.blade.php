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
                <h4>Registration</h4>


                
                <form action="{{route('register-user')}}" method="post">

                         @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        @if(Session::has('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif


                    @csrf

                    <br>
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" placeholder="Enter First Name"
                        name="first_name" value = "{{old('first_name')}}">
                        <span class="text-danger">@error('first_name') {{$message}} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" placeholder="Enter Last Name"
                        name="last_name" value = "{{old('last_name')}}">
                        <span class="text-danger">@error('last_name') {{$message}} @enderror</span>
                    </div>
                    

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" placeholder="Enter Email"
                        name="email" value = "{{old('email')}}">
                        <span class="text-danger">@error('email') {{$message}} @enderror</span>

                    </div>

                    <div class="form-group">
                        <label for="studentNum">Student No.</label>
                        <input type="text" class="form-control" placeholder="Enter Student No."
                        name="studentNum" value = "">
                        <span class="text-danger">@error('studentNum') {{$message}} @enderror</span>

                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Enter Password"
                        name="password" value = "">
                        <span class="text-danger">@error('password') {{$message}} @enderror</span>

                    </div>
                    
                    

                    <div class="form-group">
                        <label for="adviser_name">Adviser</label>
                        <select name="adviser_name" class="form-control">
                            @foreach ($data as $row)
                                           <option value="{{$row->full_name}}">{{$row->full_name}}</option>
                                        @endforeach
                </select>
                       
                    </div>
                    

                    

                    <div class="form-group">
                        <label for="course">Course</label>
                       <select name="course" class="form-control">
                          @foreach ($course as $course)
                                   <option value="{{$course->course}}">{{$course->course}}</option>
                                @endforeach
                 </select>
                       
                    </div>

                    <div class="form-group">
                        <label for="year_and_section">Year and Section</label>
                        <input type="text" class="form-control" placeholder="Enter Year and Section"
                        name="year_and_section" value = "">

                    </div>



                    <br>

                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">Register</button>
                    </div>

                    <br>
                    <a href="login">Already Registered? Login Here...</a>

</form>
            </div>

        </div>
    

</div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>