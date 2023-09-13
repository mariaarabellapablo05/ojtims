<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OJTIMS</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <img style="width: 55px; margin-left: 6px; padding-top: 30px;" src="/images/puplogo.png">
                        <span class="toptitle">OJTIMS</span>
                    </a>
                </li>

                <li>
                    <a href="home">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title" >Home</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/student/accountinfo') }}">
                        <span class="icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <span class="title">Account Information</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="albums-outline"></ion-icon>
                        </span>
                        <span class="title">OJT Information</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/student/class') }}">
                        <span class="icon">
                            <ion-icon name="clipboard-outline"></ion-icon>
                        </span>
                        <span class="title">Class</span>
                    </a>
                </li>

                <li>
                    <a href="uploadpage">
                        <span class="icon">
                            <ion-icon name="document-outline"></ion-icon>
                        </span>
                        <span class="title">Upload Templates</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/login') }}">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Log Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            

            <div class="topbar">

                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <span class="subtitle">On-the-Job Training Information Management System </span>

            </div>

            <div class="dash">
                <h1 style="color:white;">Account Information</h1>
            </div>

            <!-- Editable Account Information Form -->
        <form class="account-form" action="{{url('/student/edit',$data->email)}}" method="post"style="color: white;">
            @csrf
            @method('PUT')
            <div class="form-column">
                <div class="form-group">
                    <label class="form-label" for="first_name">First Name:</label>
                    <input class="form-input" type="text" id="first_name" name="first_name" value={{$data->first_name}}>
            </div>

            <div class="form-group">
                    <label class="form-label" for="middle-name">Middle Name:</label>
                    <input class="form-input" type="text" id="middle_name" name="middle_name" value={{$data->middle_name}}>
             </div>
            <div class="form-group">
                    <label class="form-label" for="last_name">Last Name:</label>
                    <input class="form-input" type="text" id="last_name" name="last_name" value={{$data->last_name}}>
             </div>
             <div class="form-group">
                <label class="form-label" for="suffix">Suffix:</label>
                <input class="form-input" type="text" id="suffix" name="suffix" value={{$data->suffix}}>
         </div>
        <!-- Add more form fields for the first column here -->
             </div>
            <div class="form-column">
                <div class="form-group">
                    <label class="form-label" for="contact_number">Contact NO:</label>
                    <input class="form-input" type="text" id="contact_number" name="contact_number" value={{$data->contact_number}}>
            </div>
            <div class="form-group">
                <label class="form-label" for="date_of_birth">Date of Birth:</label>
                <input class="form-input" type="date" id="date_of_birth" name="date_of_birth" value={{$data->date_of_birth}}>
        </div>
            <div class="form-group" >
                    <label class="form-label" for="address">Address:</label>
                    <input class="form-input" type="text" id="address" name="address" value={{$data->address}}>
            </div>
            <div class="form-group">
                    <label class="form-label" for="email">Email:</label>
                    <input class="form-input" type="email" id="email" name="email" value={{$data->email}}>
            </div>


            <div class="form-group" >
                <label class="form-label" for="studentNum">Student No.:</label>
                <input class="form-input" type="text" id="studentNum" name="studentNum" value={{$data->studentNum}}>
        </div>

        

    <div class="form-group" >
        <label class="form-label" for="course">Course:</label>

        <select name="course" class="form-control">
            @foreach ($course as $course)
                     <option value="{{$course->course}}">{{$course->course}}</option>
                  @endforeach
   </select>
        
</div>

<div class="form-group" >
    <label class="form-label" for="year_and_section">Year and Section:</label>
    <input class="form-input" type="text" id="year_and_section" name="year_and_section" value={{$data->year_and_section}}>
</div>
        <!-- Add more form fields for the second column here -->
            </div>
            <div class="form-group">
                    <button class="edit-button" type="submit" style="margin-right: 45px;">Update </button>
            </div>


            



            
    </form>
            

<!--Change Password-->
<div class="details" style="color:black">
    <div class="recentOrders">

<form class="account-form" action="{{url('/change_password',$data->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-column">
        <div class="form-group">
            <label class="form-label" for="current_password">Current Password:</label>
            <input class="form-input" type="password" id="current_password" name="current_password">
            

    </div>
    <span class="text-danger">@error('current_password') {{$message}} @enderror</span>
    

    <div class="form-group">
            <label class="form-label" for="new_password">New Password:</label>
            <input class="form-input" type="password" id="new_password" name="new_password">
     </div>
     <span class="text-danger">@error('new_password') {{$message}} @enderror</span>
     
    <div class="form-group">
            <label class="form-label" for="confirm_password">Confirm New Password:</label>
            <input class="form-input" type="password" id="confirm_password" name="confirm_password">
            <span class="text-danger">@error('confirm_password') {{$message}} @enderror</span>
     </div>


<!-- Add more form fields for the first column here -->
     </div>
    <div class="form-group">
            <button class="edit-button" type="submit"style="margin-top:50px;margin-right: -220px;">Update </button>
    </div>


    



    
</form>

</div>
</div>










            </div>


        </div>
    </div>





</body>
</html>


<script src="{{url('/assets/js/main.js')}}"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>