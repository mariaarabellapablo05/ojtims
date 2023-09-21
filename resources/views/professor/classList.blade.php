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
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
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
                    <a href="{{ url('/professor/home') }}">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title" >Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/professor/accountinfo') }}">
                        <span class="icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <span class="title">Account Information</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/professor/class') }}">
                        <span class="icon">
                            <ion-icon name="clipboard-outline"></ion-icon>
                        </span>
                        <span class="title">Class</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/supTab') }}">
                        <span class="icon">
                            <ion-icon name="person-circle-outline"></ion-icon>
                        </span>
                        <span class="title">OJT Supervisor</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/professor/upload') }}">
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
                <h1 style="color:white;">Class</h1>
            </div>



            <!-- ================ Order Details List =================-->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Student List</h2>
                    </div>
    
                    <table id="fileTable" class="display">
    
                        <thead>
                            <tr>
                                <td data-orderable="true">Student Name</td>
                                <td data-orderable="true">Course</td>
                                <td data-orderable="true">Year and Section</td>
                                <td>View Personal Information</td>
                                <td>View OJT Information</td>
                            </tr>
                        </thead>
    
                        <tbody>
                            @foreach ($studentData as $data)
                            <tr>
                                <td>{{$data['student']->first_name }} {{ $data['student']->last_name }}</td>
                                <td>{{$data['student']->course }}</td>
                                <td>{{ $data['student']->year_and_section }}</td>
                                <td>
                                    <button style="background-color:green;border-radius: 12px;padding: 5px 10px;border-color :green " data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <a href="#" style="color:white;font-family: 'Poppins', sans-serif;">View</a>
                                    </button>
                                <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Student Personal Information</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            
    
                @csrf
    
                <h4 style="color: maroon">{{ $data['student']->full_name }}</h4>
                <p style="color: maroon">Contact NO: {{ $data['student']->contact_number }}</p>
                <p style="color: maroon">Email Address: {{$data['student']->email }}</p>
                <p style="color: maroon">Address: {{ $data['student']->address }}</p>
                <p style="color: maroon">Date of Birth: {{ $data['student']->date_of_birth }}</p>
                <p style="color: maroon">Student Number: {{ $data['ojt']->studentNum }}</p>
    
            
    
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    
        </div>
      </div>
    </div>
    </div>
    
    
    
    
                               </td>                
                                <td>
                                    <button style="background-color: red;border-radius: 12px;padding: 5px 10px;border-color : red" data-bs-toggle="modal" data-bs-target="#exModal">
                                        <a href="#" style="color:white;font-family: 'Poppins', sans-serif;">View</a>
                                    </button>
    
    
                                <!-- Modal -->
                                <div class="modal fade" id="exModal" tabindex="-1" aria-labelledby="exModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exLabel">Student OJT Information</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            
                                    
                                                @csrf
                                    
                                                <h4 style="color: maroon">{{ $data['student']->full_name }}</h4>
                                                <p style="color: maroon">Company Name: {{ $data['ojt']->company_name }}</p>
                                                <p style="color: maroon">Company Address: {{$data['ojt']->company_address }}</p>
                                                <p style="color: maroon">Nature of Business: {{ $data['ojt']->nature_of_bus }}</p>
                                                <p style="color: maroon">Nature of Networking or Linkages: {{ $data['ojt']->nature_of_link }}</p>
                                                <p style="color: maroon">Level: {{ $data['ojt']->level }}</p>
                                                <p style="color: maroon">Start Date: {{ $data['ojt']->start_date}}</p>
                                                <p style="color: maroon">End Date: {{$data['ojt']->finish_date }}</p>
                                                <p style="color: maroon">Reporting Time: {{ $data['ojt']->report_time }}</p>
                                                <p style="color: maroon">Contact Name: {{ $data['ojt']->contact_name }}</p>
                                                <p style="color: maroon">Position of Contact: {{ $data['ojt']->contact_position }}</p>
                                                <p style="color: maroon">Contact Number of Representative: {{ $data['ojt']->contact_number }}</p>
                                    
                                            
                                    
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    
                                        </div>
                                      </div>
                                    </div>
                                    </div>
    
                                </td>                           
                            </tr>
                        </tbody>
                        @endforeach
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
    
                        <!-- Include jQuery and DataTables scripts -->
                        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
                        <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
                    
                        <!-- Enable sorting for the fileTable -->
                        <script>
                            $(document).ready(function() {
                                $('#fileTable').DataTable();
                            });
                        </script>
    