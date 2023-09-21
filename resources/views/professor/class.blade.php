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


                    <!-- Button trigger modal -->
                    <div class="buttons" style="margin-left: 1150px;">
                        <div class="AddProfBtn">
                            <button class="updateBtn" type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal" style="font-size: 18px;">Add New Room</button>
                            <i class="uil uil-plus" style="font-size: 25px;color:white;"></i>
                        </div>
                    </div>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Room</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{url('/roomCreate')}}" method="post" enctype="multipart/form-data">

                @csrf
                <table>
                    <thead>
                        <tr>
                            <td>Room Name</td>
                            <td>Course</td>
                            
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>
                                <input type="text" name="room">
                            </td>
                            
                            <td>
                                <select name="course" class="form-control">
                                 @foreach ($course as $course)
                                     <option value="{{$course->course}}">{{$course->course}}</option>
                                @endforeach
                                 </select>
                       
                            </td>
                            

                        </tr>

                                                   
                    </tbody>
                </table>

            

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type="submit" style="background-color:#FFA800;border-radius: 12px;padding: 5px 10px;border-color : gold;color:white;">
          
        </div>
      </div>
    </div>
  </div>

</form>

                    






  <!--Room List-->          
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Rooms</h2>
                    </div>

                    <table id="fileTable" class="display">
                        <thead>
                            <tr>
                            
                                <td data-orderable="true">Course</td>
                                <td data-orderable="true">Room Name</td>
                                <td>Needing Approval</td>
                                <td>Students List</td>
                                <td>Add Announcements</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($class as $class)
                            <tr>
                                <td>{{$class->course}}</td>
                                <td>{{$class->room}}</td>
                                
                                <td>
                                    <button style="background-color:green;border-radius: 12px;padding: 5px 10px;border-color :green">
                                        <a href="{{ url('/professor/listStudents', $class->course) }}" style="color:white;font-family: 'Poppins', sans-serif;">View</a>
                                    </button>
                                </td>
                                <td>
                                    <button style="background-color: red;border-radius: 12px;padding: 5px 10px;border-color : red">
                                        <a href="{{ url('/professor/classList', $class->course) }}" style="color:white;font-family: 'Poppins', sans-serif;">View</a>
                                    </button>

                                </td>   

                                <td>
                                    
                                <!-- Button to trigger modal -->
<button type="button" data-bs-toggle="modal" data-bs-target="#exModal" style="color: white; font-family: 'Poppins', sans-serif; background-color: #4169E1; border-radius: 12px; padding: 5px 10px; border-color: #4169E1">
Add
</button>



<!-- Modal -->
<div class="modal fade" id="exModal" tabindex="-1" aria-labelledby="exModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exModalLabel">Create Announcement</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('/announcements')}}">
                    @csrf
                    <div class="form-group">
                        <label for="title" style="color:black">Title</label>
                        <input type="text" id="title" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="content" style="color:black">Content</label>
                        <textarea id="content" name="content" class="form-control" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Announcement</button>
                </form>

                                
    
                            </tr>
    
                                                       
                        </tbody>
                    </table>
    
                
    
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <input type="submit" style="background-color:#FFA800;border-radius: 12px;padding: 5px 10px;border-color : gold;color:white;">
              
            </div>
          </div>
        </div>
      </div>
    
    </form>
    
                        
    
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
                 
<!-- Include jQuery and DataTables scripts -->
                        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
                        <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
                    
                        <!-- Enable sorting for the fileTable -->
                        <script>
                            $(document).ready(function() {
                                $('#fileTable').DataTable();
                            });
                        </script>
    