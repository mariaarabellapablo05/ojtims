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
                        <span class="name"> {{ $user->full_name }} </span>
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
                <h1 style="color:white;">Upload Files</h1>
            </div>



            <!-- ================ Order Details List ================= -->
            <div class="buttons" style="margin-left: 1150px;">
                <div class="AddProfBtn">
                    <button class="updateBtn" type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal" style="font-size: 18px;">Upload New Template</button>
                    <i class="uil uil-plus" style="font-size: 25px;color:white;"></i>
                </div>
            </div>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add File</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{url('/uploadfile')}}" method="post" enctype="multipart/form-data">

                @csrf
                <table>
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Choose File</td>
                            
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>
                                <input type="text" name="name">
                            </td>
                            <td>
                                <input type="file" name="file">

                            </td>

                                                   
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

                    




            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Uploaded Templates</h2>
                    </div>
                    


                    <table id="fileTable" class="display">
                        <thead>
                            <tr>
                                <th data-orderable="true">File Name</th>
                                <th></th>
                                <th data-orderable="true">Date and Time Submitted</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $data)
                            <tr>
                                <td>{{$data->name}}</td>
                                <td>{{$data->file}}</td>
                                <td>{{$data->created_at}}</td>
                                <td>
                                    <button style="background-color:#FFA800;border-radius: 12px;padding: 5px 10px;border-color : gold">
                                        <a href="{{url('/view',$data->id)}}" style="color:white;font-family: 'Poppins', sans-serif;text-decoration:none;">View</a>
                                    </button>
                                </td>
                                <td>
                                    <button style="background-color: green;border-radius: 12px;padding: 5px 10px;border-color : green">
                                        <a href="{{url('/download',$data->file)}}" style="color:white;font-family: 'Poppins', sans-serif;text-decoration:none;">Download</a>
                                    </button>
                                </td>
                                <td>
                                    <form action="{{url('/remove',$data->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <button type="submit" style="background-color: red;border-radius: 12px;padding: 5px 10px;border-color : red;color:white;font-family: 'Poppins', sans-serif;text-decoration:none;">
                                            Remove
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                
                    <!-- Include jQuery and DataTables scripts -->
                    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
                    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
                
                    <!-- Enable sorting for the fileTable -->
                    <script>
                        $(document).ready(function() {
                            $('#fileTable').DataTable();
                        });
                    </script>
                



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
    