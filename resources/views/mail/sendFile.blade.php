<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample Email</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #800000; /* Updated to maroon */
        }

        /* Header Styles */
        .header {
            background-color: #800000; /* Maroon header */
            color: #ffffff; /* Text color changed to white */
            padding: 20px;
            text-align: center;
        }

        /* Content Styles */
        .content {
            padding: 20px;
            background-color: #ffffff;
            color: black; /* Text color changed to black */
            border-radius: 10px; /* Increased border radius for a softer look */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Increased shadow depth */
            text-align: center; /* Center-align content */
        }

        /* Button Styles */
        .button {
            padding: 15px 30px; /* Increased padding for a larger button */
            background-color: #800000; /* Maroon button color */
            color: #ffffff; /* Text color changed to white */
            text-decoration: none;
            border-radius: 5px; /* Rectangular button */
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #5c0000; /* Darker maroon color on hover */
        }

        /* Footer Styles */
        .footer {
            background-color: #800000; /* Maroon footer */
            color: #ffffff; /* Text color changed to white */
            padding: 10px;
            text-align: center;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <div class="header">
        <img src="/images/puplogo.png" alt="Your Logo" width="80" height="80" style="max-width: 100%; height: auto;">
        <h1 style="font-size: 24px; margin-top: 10px;">Welcome to the On-the-job Training Information Management System</h1>
    </div>

    <!-- Content Section -->
    <div class="content">
        <h2 style="color: black; font-size: 28px;">Good day!</h2>
 
        <p style="font-size: 18px;">Please find the attached Memorandum of Agreement below:</p>

    <a href="{{ route('download.file', $file) }}">Download Attached File</a>
    <p style="font-size: 18px;">This can be downloaded until {{$attachmentPath}}.</p>


    </div>

    <!-- Footer Section -->
    <div class="footer">
        <p>
            <a href="#">Privacy</a> | <a href="#">General terms and conditions</a> | <a href="#">Unsubscribe</a><br>
            PUP Taguig Branch, General Santos Ave, Lower Bicutan, Taguig, Metro Manila, Philippines | University<br>
            &copy; POLYTECHNIC UNIVERSITY OF THE PHILIPPINES
        </p>
    </div>
</body>
</html>