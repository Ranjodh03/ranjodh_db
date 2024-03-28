<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "concert";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if ID is provided in the URL
if(isset($_GET['id']) && !empty($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $employee_id = $connection->real_escape_string($_GET['id']);

    // Query to retrieve employee details
    $sql = "SELECT * FROM employees WHERE id = $employee_id";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $employee = $result->fetch_assoc();
    } else {
        echo "Employee not found.";
        exit;
    }
} else {
    echo "Employee ID not provided.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('/CONCERT/bts_read.jpeg'); /* Specify the path to your image */
            background-size: cover; /* Cover the entire background */
            background-position: center; /* Center the background image */
            background-repeat: no-repeat; /* Do not repeat the background image */
            min-height: 100vh; /* Set minimum height of the body to full viewport height */
            margin: 0; /* Reset default margin */
            padding: 0; /* Reset default padding */
            display: flex; /* Use flexbox */
            flex-direction: column; /* Set flex direction to column */
        }

         /* Define the styles for the blue-colored table */
         .footer-table {
            width: 100%;
            background-color: lightBlue; /* Set the background color */
            color: black; /* Set the text color */
            padding: 10px 0; /* Add some padding for spacing */
            margin-top: 50px; /* Adjust the top margin to separate from footer */
            text-align: center; /* Center-align text */
            
        }

        /* Center the text within the table */
        .footer-table p {
            margin: 0;
           
        }

        /* Style the footer */
        footer.container {
            z-index: 1; /* Ensure the footer is above the blue table */
            margin-top: auto; /* Push the footer to the bottom */
            position: relative; /* Position relative for absolute positioning of footer */
            bottom: 0; /* Stick to the bottom */
        }
        
        
    </style>
   
</head>
<style>
    .btn-custom-red {
            background-color: red;
            color: white;
        }

        .btn-custom-blue {
            background-color: blue;
            color: white;
        }

        .confirmation-box {
            border: 1px solid #ccc;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
        }

         /* Add space above the header */
         .confirmation-box h2 {
            margin-top: 20px;
        }

        /* Center align the "Employee Detail" */
        .employee-detail {
            text-align: center;
            margin-bottom: 20px;
        }
         /* Custom class to highlight text */
         .highlight-text {
            background-color: lightblue; /* Set the background color */
            padding: 5px; /* Add padding for spacing */
            border-radius: 5px; /* Add border radius for rounded corners */
        }
        
        </style>
<body>
    <div class="container">
    <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="confirmation-box">
                      <!-- Highlighted text -->
        <h2 class="text-center mb-4 highlight-text">Employee Details</h2>
        <form method="post">
        <table class="table">
            <tbody>
                <tr>
                <div class="row">
                            <div class="col-md-6">
                    <td>ID</td>
                    <td><?php echo $employee['id']; ?></td>
</div>
</div>
                </tr>
                <tr>
                <div class="row">
                            <div class="col-md-6">
                    <td>Name</td>
                    <td><?php echo $employee['name']; ?></td>
</div>
</div>
                </tr>
                <tr>
                <div class="row">
                            <div class="col-md-6">
                    <td>Address</td>
                    <td><?php echo $employee['address']; ?></td>
</div>
</div>
                </tr>
                <tr>
                <div class="row">
                            <div class="col-md-6">
                    <td>Salary</td>
                    <td><?php echo $employee['salary']; ?></td>
</div>
</div>
                </tr>
                <tr>
                <div class="row">
                            <div class="col-md-6">
                    <td>Created At</td>
                    <td><?php echo $employee['created_at']; ?></td>
</div>
</div>
                </tr>
            </tbody>
        </table>
    </form>
</div>
</div>
</div>
    </div>
    <!-- Footer -->
    <footer class="container mt-5 text-center">
        <!-- lightBlue-colored table -->
     <div class="footer-table">
     <p>Designed with ❤️ by Ranjodh Kaur</p>
        <p>Student ID: 202107929</p>
    </div>
    </footer>
    <!-- End of Footer -->
</body>
</html>



<?php

// Close connection
$connection->close();
?>

