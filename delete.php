<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirm_delete"])) {
    $id = $_POST["id"];

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

    // Prepare the delete statement to prevent SQL injection
    $stmt = $connection->prepare("DELETE FROM employees WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute()) {
        // Set a session message for successful deletion
        session_start();
        $_SESSION['message'] = "The information has been successfully deleted.";
    }

    // Close statement and connection
    $stmt->close();
    $connection->close();

    // Redirect to the index page
    header("location: /CONCERT/index.php");
    exit;
}

// Check if the id GET parameter is set
if (isset($_GET["id"])) {
    $id = $_GET["id"];
?>

   



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Confirmation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
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

    
        body {
            background-image: url('/CONCERT/bts_delete.jpeg'); /* Specify the path to your image */
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
<body>
     <!-- Confirmation form -->
     
     <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="confirmation-box">
    <h2 class="text-center mb-4">Are you sure you want to delete this id?</h2>
    <form method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="row">
                            <div class="col-md-6">
    <input type="submit" name="confirm_delete" class="btn btn-custom-red btn-sm w-100" value="Yes, delete it!">
    </div>
                            <div class="col-md-6">
    <a class="btn btn-custom-blue btn-sm w-100" href="/CONCERT/index.php">No, take me back</a>
    </div>
    </div>
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
} else {
    // If the id parameter is not set, redirect to the error page
    header("location: /CONCERT/error.php");
    exit;
}
?>
