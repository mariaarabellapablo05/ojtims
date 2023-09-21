<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OJTIMS</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
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
                    <a href="#">
                        <span class="icon" style="margin-top: 60px;">
                            <ion-icon name="person-circle-outline"></ion-icon>
                        </span>
                        <span class="name"> {{ $data->full_name }} </span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/student/home') }}">
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

                <li class="active">
                    <a href="{{ url('/student/ojtinfo') }}">
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
                    <a href="{{ url('/student/files') }}">
                        <span class="icon">
                            <ion-icon name="document-outline"></ion-icon>
                        </span>
                        <span class="title">Downloadable Files</span>
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
                <h1 style="color:white;">OJT Information</h1>
            </div>

            <!-- Editable Account Information Form -->
            <div class="detailsacc" style="margin-left: 20%; width: 75%;">
                <div class="recentOrdersacc">

                    <div class="accdetails">
                        <div class="accounts">
                            <form class="account-form" action="{{url('/student/ojtEdit',$data->studentNum)}}" method="post"style="color: white;">
                                @csrf
                                @method('PUT')
                                <div class="form-column">
                                    <div class="form-group">
                                        <label class="form-label" for="company_name">Company Name:</label>
                                        <input class="form-input" type="text" id="company_name" name="company_name" value= "{{$user->company_name}}">
                                </div>

                                <div class="form-group">
                                        <label class="form-label" for="company_address">Company Address:</label>
                                        <input class="form-input" type="text" id="company_address" name="company_address" value="{{$user->company_address}}">
                                </div>
                                <div class="form-group">
                                        <label class="form-label" for="nature_of_bus">Nature of Business:</label>
                                        <input class="form-input" type="text" id="nature_of_bus" name="nature_of_bus" value="{{$user->nature_of_bus}}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="nature_of_link">Nature of Networking or Linkages:</label>
                                    <input class="form-input" type="text" id="nature_of_link" name="nature_of_link" value="{{$user->nature_of_link}}">
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="level">Level:</label>
                                    <input class="form-input" type="text" id="level" name="level" value="{{$user->level}}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="start_date">Start Date:</label>
                                    <input class="form-input" type="date" id="start_date" name="start_date" value="{{$user->start_date}}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="finish_date">End Date:</label>
                                    <input class="form-input" type="date" id="finish_date" name="finish_date" value="{{$user->finish_date}}">
                                </div>
                            <!-- Add more form fields for the first column here -->
                            </div>

                                <div class="form-column">
                                    
                                    <div class="form-group">
                                            <label class="form-label" for="report_time">Reporting Time:</label>
                                            <input class="form-input" type="text" id="report_time" name="report_time" value="{{$user->report_time}}">
                                    </div>


                                    <div class="form-group" >
                                        <label class="form-label" for="contact_name">Contact Name:</label>
                                        <input class="form-input" type="text" id="contact_name" name="contact_name" value="{{$user->contact_name}}">
                                    </div>


                                    <div class="form-group" >
                                        <label class="form-label" for="contact_position">Position of Contact:</label>
                                        <input class="form-input" type="text" id="contact_position" name="contact_position" value="{{$user->contact_position}}">
                                    </div>
                                    <div class="form-group" >
                                        <label class="form-label" for="contact_number">Contact Number of Representative:</label>
                                        <input class="form-input" type="text" id="contact_number" name="contact_number" value="{{$user->contact_number}}">
                                    </div>
                                    <!-- Add more form fields for the second column here -->

                                    <div class="form-group">
                                        <button class="edit-button" type="submit" style="margin-right: 45px;">Update </button>
                                </div>

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


<script>
    // Use JavaScript to validate and parse the input
    document.getElementById("report_time").addEventListener("blur", function() {
      const input = this.value.trim();
      const pattern = /^(\d{1,2}:\d{2} [APap][Mm] - \d{1,2}:\d{2} [APap][Mm])\s+\((Monday|Tuesday|Wednesday|Thursday|Friday)\s*-\s*(Monday|Tuesday|Wednesday|Thursday|Friday)\)$/;
  
      if (input.match(pattern)) {
        // Valid input format
        const [timeRange, days] = input.split(" (");
        const [timeIn, timeOut] = timeRange.split(" - ");
        const dayRange = days.slice(0, -1); // Remove the closing parenthesis
        
        // You can access timeIn, timeOut, and dayRange here for further processing
        console.log("Time-In:", timeIn);
        console.log("Time-Out:", timeOut);
        console.log("Days:", dayRange);
      } else {
        // Invalid input format, show an error message or handle accordingly
        alert("Invalid input format. Please use 9:00 am - 6:00 pm (Monday - Friday)");
      }
    });
  </script>