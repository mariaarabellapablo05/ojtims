<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OJTIMS</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
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

                <li class="active">
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
                <li>
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
                <h1 style="color:white;">Dashboard</h1>
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <a href="{{ url('/studentLists') }}" style="color:maroon;text-decoration:none;">
                        <div class="numbers">{{ $roleCount }}</div>
                        <div class="cardName">Students</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                </a>
                </div>

                <div class="card">
                    <div>
                        <a href="{{ url('/professorTab') }}" style="color:maroon;text-decoration:none;">
                        <div class="numbers">{{ $roleCountP }}</div>
                        <div class="cardName">Professors</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="person-circle-outline"></ion-icon>
                    </div>
                </a>
                </div>


                <div class="card">
                    <div>
                        <a href="{{ url('/uploadpage') }}" style="color:maroon;text-decoration:none;">
                        <div class="numbers">{{ $fileCount }}</div>
                        <div class="cardName">Uploaded Templates</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cloud-upload-outline"></ion-icon>
                    </div>
                </a>
                </div>
            </div>

            
            <!-- ================ Order Details List =================-->
            <div class="details">
                <div class="recentOrders" style="text-align:center;">
                    <div class="cardHeader" >
                        <h2>Create Announcement</h2>
                    </div>

                    <div class="container">
                        <form method="POST" action="{{url('/announcements')}}">
                            @csrf

                            <table>
                                <div class="form-group" style="font-size: 22px; text-align: left;">
                                    <label class="form-label" for="title" style="margin-left: 10px;">Title:</label>
                                    <input class="form-input" type="text" id="title" name="title" style="width: 100%;" required>
                                </div>

                                <div class="form-group" style="font-size: 22px; text-align: left;">
                                    <label class="form-label" for="content" style="margin-left: 10px;">Content:</label>
                                    <textarea class="form-input" id="content" name="content" rows="4" style="width: 100%;" required></textarea>
                                </div>

                                {{-- <button type="submit" class="btn btn-primary" style="font-size: 18px; align-items: right;">Create Announcement</button> --}}

                                <button class="btn btn-primary" type="submit" style="margin-left: 1180px;">Create Announcement</button>
                            </table>

                        </form>
                    </div>
                </div>

            </div> 
        </div>


        
    </div>


    

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>