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
                        <span class="name"> {{ $user->full_name }} </span>
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
                <h1 style="color:white;">Files</h1>
            </div>



            <!-- ================ Order Details List =================-->

           

  <!--Room List-->          
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Downloadable Files</h2>
                    </div>

                    <table id="fileTable" class="display">
                        <thead>
                            <tr>
                                <th data-orderable="true">File Name</th>
                                <th></th>
                                <th data-orderable="true">Date and Time Submitted</th>
                                <th data-orderable="true">Uploader Name</th>
                                <th></th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($upload as $upload)
                            <tr>
                                <td>{{$upload->name}}</td>
                                <td>{{$upload->file}}</td>
                                <td>{{$upload->created_at}}</td>
                                <td>{{$upload->uploader_name}}</td>
                                <td>
                                    <button style="background-color:#FFA800;border-radius: 12px;padding: 5px 10px;border-color : gold">
                                        <a href="{{url('/view',$upload->id)}}" style="color:white;font-family: 'Poppins', sans-serif;text-decoration:none;">View</a>
                                    </button>
                                </td>
                                <td>
                                    <button style="background-color: green;border-radius: 12px;padding: 5px 10px;border-color : green">
                                        <a href="{{url('/download',$upload->file)}}" style="color:white;font-family: 'Poppins', sans-serif;text-decoration:none;">Download</a>
                                    </button>
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
