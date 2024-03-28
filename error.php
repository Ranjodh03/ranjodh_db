<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

<style>
    body {
            background-image: url('/CONCERT/bts_error.png'); /* Specify the path to your image */
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
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Error!</h4>
                    <?php
                    // Check if there's an error message passed from create.php or update.php
                    if (isset($_GET['errorMessage'])) {
                        $errorMessage = $_GET['errorMessage'];
                        echo "<p>$errorMessage</p>";
                    } else {
                        // Check if any of the fields are missing
                        $missingFields = [];
                        if (empty($_GET['name'])) {
                            $missingFields[] = 'name';
                        }
                        if (empty($_GET['address'])) {
                            $missingFields[] = 'address';
                        }
                        if (empty($_GET['salary'])) {
                            $missingFields[] = 'salary';
                        }
                        if (!empty($missingFields)) {
                            $missingFieldsList = implode(', ', $missingFields);
                            echo "<p>Please fill all the information. Missing fields: $missingFieldsList</p>";
                        } else {
                            echo "<p>Invalid request or missing parameters.</p>";
                        }
                    }
                    ?>
                    <hr>
                    <p class="mb-0">Please <a href="/CONCERT/index.php">click here</a> to return to the landing page.</p>
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
