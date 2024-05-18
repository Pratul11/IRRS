<?php 
session_start(); 

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header("location: ./login.php");
    exit();
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: ./login.php");
    exit();
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <title>IRRS</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background: url(./bg.jpeg);
        }

        form {
            box-shadow: 2px 6px 100px #ffffff;
        }

        .error-message {
            color: red;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg" style="background-color: aliceblue;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">IRRS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php">HOME</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <button class="btn btn-primary" type="submit">MY BOOKINGS</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container-fluid bg-dark text-light py-3">
        <header class="text-center">
            <h1 class="display-6">BOOKING DATA</h1>
        </header>
    </div>
    <section class="container my-4 bg-light w-100 p-2">
        <?php
        $user = $_SESSION['username'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "registration";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM booking WHERE user = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $user);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            echo "<p class='error-message'>No booking record found.</p>";
        } else {
            echo "<table class='table table-striped table-striped-columns table-hover'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col'>PNR</th>";
            echo "<th scope='col'>Name</th>";
            echo "<th scope='col'>Gender</th>";
            echo "<th scope='col'>Age</th>";
            echo "<th scope='col'>Coach</th>";
            echo "<th scope='col'>Seat</th>";
            echo "<th scope='col'>Train Number</th>";
            echo "<th scope='col'>Train Name</th>";
            echo "<th scope='col'>Journey Date</th>";
            echo "<th scope='col'>Booking Date</th>";
            echo "<th scope='col'>Source</th>";
            echo "<th scope='col'>Destination</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['pnr'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                echo "<td>" . $row['co'] . "</td>";
                echo "<td>" . $row['se'] . "</td>";
                echo "<td>" . $row['trainNo'] . "</td>";
                echo "<td>" . $row['trainName'] . "</td>";
                echo "<td>" . $row['journeydate'] . "</td>";
                echo "<td>" . $row['bookDate'] . "</td>";
                echo "<td>" . $row['source'] . "</td>";
                echo "<td>" . $row['destination'] . "</td>";
                echo "<td><button class='delete-btn' data-id='" . $row['pnr'] . "'>Cancel Ticket</button></td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        }
        $stmt->close();
        $conn->close();
        ?>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    var pnr = this.getAttribute('data-id');
                    var trainNo = ''; // Assuming you have trainNo defined somewhere in your code
                    if (confirm("Are you sure to cancel the ticket?")) {
                        var xhr = new XMLHttpRequest();
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState == 4 && xhr.status == 200) {
                                location.reload(); // Reload the page after successful deletion
                            }
                        };
                        xhr.open("GET", "delete_ticket.php?pnr=" + pnr + "&trainNo=" + trainNo, true);
                        xhr.send();
                    }
                });
            });
        });

    </script>
</body>

</html>
