<!DOCTYPE html>
<html lang="en">

<head>
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
                </li>

                <li>
                    <a href="dashboard">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title" >Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="accountinfo">
                        <span class="icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <span class="title">Account Information</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Students</span>
                    </a>
                </li>

                <li>
                    <a href="professorTab">
                        <span class="icon">
                            <ion-icon name="person-circle-outline"></ion-icon>
                        </span>
                        <span class="title">Professors</span>
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
                    <a href="{{ url('/maintenance') }}">
                        <span class="icon">
                            <ion-icon name="code-working-outline"></ion-icon>
                        </span>
                        <span class="title">Maintenance</span>
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
            <h2 style="color:white;">Welcome, {{ $data->full_name }} !</h1>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">20</div>
                        <div class="cardName">Students</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">12</div>
                        <div class="cardName">Advisers</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="person-circle-outline"></ion-icon>
                    </div>
                    
                </div>


                

                <div class="card">
                    <a href="uploadpage" style="color:maroon;text-decoration:none;">
                    <div>
                        <div class="numbers">2</div>
                        <div class="cardName">Uploaded Templates</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cloud-upload-outline"></ion-icon>
                    </a>
                    </div>




            </div>

            <!-- ================ Order Details List =================
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Uploaded Templates</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>File Name</td>
                                <td>Uploader</td>
                                <td>Date</td>
                                <td>Upload</td>
                                <td>Delete</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Memorandum_of_Agreement_Temp.doc</td>
                                <td>Uploader Name</td>
                                <td>2023-08-18 AM 8:38</td>
                                <td>
                                    <button style="background-color:gold;border-radius: 12px;padding: 5px 10px;border-color : gold">
                                        <a href="uploadpage" style="color:white;font-family: 'Poppins', sans-serif;">Upload</a>
                                    </button>
                                </td>
                                <td>
                                    <button style="background-color: red;border-radius: 12px;padding: 5px 10px;border-color : red">
                                        <a href="#" style="color:white;font-family: 'Poppins', sans-serif;">Delete</a>
                                    </button>

                                </td>
                            </tr>

                            <tr>
                                <td>Recommendation_Letter_Temp.doc</td>
                                <td>Uploader Name</td>
                                <td>2023-08-18 AM 8:38</td>
                                <td>
                                    <button style="background-color:gold;border-radius: 12px;padding: 5px 10px;border-color : gold">
                                        <a href="uploadpage" style="color:white;font-family: 'Poppins', sans-serif;">Upload</a>
                                    </button>
                                </td>
                                <td>
                                    <button style="background-color: red;border-radius: 12px;padding: 5px 10px;border-color : red">
                                        <a href="#" style="color:white;font-family: 'Poppins', sans-serif;">Delete</a>
                                    </button>

                                </td>                            </tr>
                        </tbody>
                    </table>
                </div>

            </div> -->
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>