<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <a href="{{ url('/dashboard') }}">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title" >Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/accountinfo') }}">
                        <span class="icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <span class="title">Account Information</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/studentLists') }}">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Students</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/professorTab') }}">
                        <span class="icon">
                            <ion-icon name="people-circle-outline"></ion-icon>
                        </span>
                        <span class="title">Professors</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/uploadpage') }}">
                        <span class="icon">
                            <ion-icon name="document-outline"></ion-icon>
                        </span>
                        <span class="title">Upload Templates</span>
                    </a>
                </li>
                
                <li>
                    <a href="{{ url('/maintenance') }}">
                        <span class="icon">
                            <ion-icon name="code-working-outline"></ion-icon>
                        </span>
                        <span class="title">Maintenance</span>
                    </a>
                </li>

                <li class="active">
                    <a href="{{ url('/MOA') }}">
                        <span class="icon">
                            <ion-icon name="folder-outline"></ion-icon>
                        </span>
                        <span class="title">MOA</span>
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
                <h1 style="color:white;">Student List</h1>
            </div>

            <!-- ================ Order Details List =================-->

            <div class="buttons" style="margin-left: 1150px;">
                <div class="AddProfBtn">
                    <button class="updateBtn" type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal" style="font-size: 18px;">Add MOA File</button>
                    <i class="uil uil-plus" style="font-size: 25px;"></i>
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
                            <form action="{{url('/uploadMOA')}}" method="post" enctype="multipart/form-data">

                                @csrf
                                <table>
                                    
                                    <div class="form-group" style="font-size: 22px;">
                                        
                                        <label class="form-label" for="student_name">Student Name:</label>
                                        <input class="form-input" type="text" name="student_name">

                                        <label class="form-label" for="file_name">File Name:</label>
                                        <input class="form-input" type="text" name="file_name">

                                        <label class="form-label" for="file">Choose File:</label>
                                        <input class="form-input" type="file" name="file">

                                    </div>

                                </table>

                                <div class="buttons" style="margin-left: 100px;">
                                                
                                    <button class="modalCloseBtn" type="button" data-bs-dismiss="modal" style="font-size: 18px; font-weight: 400; background-color:#FFA800;"> Close </button>
                                    
                                    <button class="submitBtn" type="submit" data-bs-dismiss="modal" style="font-size: 18px; font-weight: 400;"> Submit </button>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>



  <!--Room List-->          
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Memorandum of Agreement</h2>
                    </div>

                    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
                    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
                <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
                <script>
                    $(document).ready(function() {
                    $('#fileTable').DataTable();
                });
                </script>
                    <table id="fileTable" class="display">
                        <thead>
                            <tr>
                            
                                <td data-orderable="true">Student Name</td>
                                <td data-orderable="true">File Name</td>
                                <td data-orderable="true">Date Uploaded</td>
                                <td data-orderable="true">Valid Until</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($moa as $moa)
                            <tr>
                                <td>{{$moa->student_name}}</td>
                                <td>{{$moa->file_name}}</td>
                                <td>{{$moa->created_at}}</td>
                                <td>{{$moa->valid_until}}</td>
                                <td>
                                    <button style="background-color:#FFA800;border-radius: 12px;padding: 5px 10px;border-color : gold">
                                        <a href="{{url('/moa/view',$moa->id)}}" style="color:white;font-family: 'Poppins', sans-serif;text-decoration:none;">View</a>
                                    </button>
                                </td>
                                <td>
                                    <button style="background-color: green;border-radius: 12px;padding: 5px 10px;border-color : green">
                                        <a href="{{url('/moa/download',$moa->file)}}" style="color:white;font-family: 'Poppins', sans-serif;text-decoration:none;">Download</a>
                                    </button>
                                </td>
                                <td>
                                    <form action="{{url('/moa/remove',$moa->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <button type="submit" style="background-color: red;border-radius: 12px;padding: 5px 10px;border-color : red;color:white;font-family: 'Poppins', sans-serif;text-decoration:none;">
                                            Remove
                                        </button>
                                    </form>
                                </td>
                                <td>


<!-- Button to trigger modal -->
<button type="button" data-file-id="{{$moa->id}}" data-file-name="{{$moa->file_name}}" data-bs-toggle="modal" data-bs-target="#exModal" style="color: white; font-family: 'Poppins', sans-serif; background-color: #4169E1; border-radius: 12px; padding: 5px 10px; border-color: #4169E1">
    Send
</button>

<script>
    // JavaScript code to populate hidden fields when the "Send" button is clicked
    $(document).ready(function () {
        $('#exModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var fileId = button.data('file-id');
            var fileName = button.data('file-name');
            var modal = $(this);

            // Populate the hidden input fields with file information
            modal.find('#file-id').val(fileId);
            modal.find('#file-name').val(fileName);
        });
    });
</script>

<!-- Modal -->
<div class="modal fade" id="exModal" tabindex="-1" aria-labelledby="exModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exModalLabel">Send File To</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{url('/sendFile')}}" method="post" enctype="multipart/form-data">
    
                    @csrf
                    <table>
                        <thead>
                            <tr>
                                <td>Email</td>
                                
                            </tr>
                        </thead>
    
                        <tbody>
                            <tr>
                                <td>
                                    <script>
                                        // JavaScript code to populate hidden fields when the "Send" button is clicked
                                        $(document).ready(function () {
                                            $('#exModal').on('show.bs.modal', function (event) {
                                                var button = $(event.relatedTarget);
                                                var fileId = button.data('file-id');
                                                var fileName = button.data('file-name');
                                                var modal = $(this);
                                    
                                                // Populate the hidden input fields with file information
                                                modal.find('#file-id').val(fileId);
                                                modal.find('#file-name').val(fileName);
                                            });
                                        });
                                    </script>
                                    <input type="text" name="email">
                                    <input type="hidden" id="file-id" name="file_id" value="">
                                    <input type="hidden" id="file-name" name="file_name" value="">
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