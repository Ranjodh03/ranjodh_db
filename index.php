index.php


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONCERT</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <style>
        body {
            background-image: url('/CONCERT/bts__image.jpeg'); /* Specify the path to your image */
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

         /* Style the table */
        .employees-table {
            background-color: green; /* Set the background color */
            padding: 10px; /* Add some padding */
            border-radius: 5px; /* Add border radius for rounded corners */
            margin-top: 20px; /* Add margin to separate from heading */
            text-align: center; /* Center-align text */
        }

        /* Style the table headings */
        .employees-table th {
            text-align: center; /* Center-align text */
        }

        /* Style the table cells */
        .employees-table td {
            text-align: center; /* Center-align text */
        }
        
         /* Style the title */
         .title-background {
            background-color: lightblue; /* Set the background color */
            padding: 10px; /* Add some padding */
            border-radius: 5px; /* Add border radius for rounded corners */
            text-align: center; /* Center-align text */
        }
  
        
    </style>
</head>
    <body>
        <div class="container-fluid">
        <div class="title-background">
             <h2 class="text-center mt-3"> List of CONCERT Employees</h2>
        <div class="employees-table">
            <!-- Table with light green background -->
            <table class="table mx-auto">
                <thead>
            
             
            <a class="btn btn-primary" href="/CONCERT/create.php" role="button">New Employee</a>
           
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Salary</th>
                        <th>Created At</th>
                        <th>Action</th>
</tr>
</thead>
<tbody>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "concert";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    //check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }


    //read all row from database table
    $sql = "SELECT * FROM employees";
    $result = $connection->query($sql);

    if (!$result) {
        die("Invalid query: " . $connection->error);
    }

    // read data of each row
    while($row = $result->fetch_assoc()) {
        echo "
        <tr>
        <td>$row[id]</td>
        <td>$row[name]</td>
        <td>$row[address]</td>
        <td>$row[salary]</td>
        <td>$row[created_at]</td>
        <td>
       
        <a class='btn btn-primary btn-sm' href='/CONCERT/update.php?id=$row[id]'>Update</a>
        <a class='btn btn-warning btn-sm' href='/CONCERT/read.php?id=$row[id]'>Read</a>
        <a class='btn btn-danger btn-sm' href='/CONCERT/delete.php?id=$row[id]'>Delete</a>
</td>
</tr>
        ";
        
    } 

    ?>
    <?php
     // Display session message if set
     if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        // Unset the message after displaying it
        unset($_SESSION['message']);
    }



?>

    
</tbody>
</table>

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