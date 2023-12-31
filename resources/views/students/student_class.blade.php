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

                <li>
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
                <h1 style="color:white;">Class</h1>
            </div>



            <!-- ================ Order Details List =================-->

           

  <!--Room List-->          
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Rooms</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                            
                                <td>Course</td>
                                <td>Room Name</td>
                                <td>Join</td>
                                <td>View</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($class as $class)
                            <tr>
                                <td>{{$class->course}}</td>
                                <td>{{$class->room}}</td>
                                
                                <td>
                                    @if ($data->status != 0) <!-- Check if student status is not 0 (not approved) -->
                                    <span style="color: red;">Already Joined</span>
                                @else
                                    <form method="POST" action="{{ url('/student/join', $data->email) }}">
                                        @csrf
                                        <button type="submit" style="background-color: gold; border-radius: 12px; padding: 5px 10px; border-color: gold; color: white;">
                                                    Join
                                                </button>
                                    </form>
                                @endif
                                </td>
                                <td>
                                    <button style="background-color: green;border-radius: 12px;padding: 5px 10px;border-color :green"class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <a href="#" style="color:white;font-family: 'Poppins', sans-serif;">View</a>
                                    </button>


   
   <!-- Modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <h1 class="modal-title fs-5" id="exampleModalLabel">Room Details</h1>
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
             
 
                 @csrf
                 <table>
                     <thead>
                         <tr>
                             <td>Room Name</td>
                             <td>Course</td>
                             <td>Status</td>
                             <td>Adviser</td>
                             
                         </tr>
                     </thead>
 
                     <tbody>
                        
                        <tr>
                            <td>{{ $class->room}}</td>
                            <td>{{ $class->course}}</td>
                            <td>
                                @if ($data->status == 1)
                                    <span style="color: green;">Approved</span>
                                    @elseif ($data->status == 2)
                                        <span style="color: red;">Denied</span>
                                        @elseif ($data->status == 3)
                                          <span style="color: orange;">Pending</span>
                                 @endif

                            </td>
                            <td>{{ $class->adviser_name}}</td>
                                                   
                        </tr>
                        
                    </tbody>
                    
                 </table>
 
             
 
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

         </div>
       </div>
     </div>
   </div>
 

 

                                </td>                          
                          </tr>
                          @endforeach
                        </tbody>
                        
                    </table>
                    
                </div>

            </div> 
        </div>
    </div>






</body>
</html>


    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
