<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['train_number'])) {
        $train_number = $_POST['train_number'];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "registration";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "DELETE FROM trains WHERE train_no = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $train_number);

        if ($stmt->execute()) {
            echo "Records with train number " . $train_number . " deleted successfully.";
        } else {
            echo "Error deleting records: " . $conn->error;
        }
        $stmt->close();
        $conn->close();     
    } else {
        echo "Please provide a train number.";
    }
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
            color: white;
        }

        form {
            box-shadow: 2px 6px 100px #ffffff;
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
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/book.php">BOOKING</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/pass.php">USERS</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            TRAINS
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../admin/trains.php">ALL TRAINS</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="./addTrain.html">ADD TRAINS</a></li>
                            <!-- <li><a class="dropdown-item" href="./editTrain.php">EDIT TRAINS</a></li> -->
                            <li><a class="dropdown-item" href="./deleteTrain.php">DELETE TRAINS</a></li>
                        </ul>
                    </li>

                </ul>
                <form class="d-flex" role="search">
                    <button class="btn btn-primary" type="submit">ADMIN PANEL</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container-fluid bg-dark text-light py-3">
        <header class="text-center">
            <h1 class="display-6">DELETE TRAINS</h1>
        </header>
    </div>
    <section class="container my-5 bg-dark w-25 text-light">
        <form class="row g-3 p-3" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="col-md-6">
                <label for="train_number" class="form-label">Train Number</label>
                <input type="text" class="form-control" name="train_number" id="train_number" placeholder="12423" required>
            </div>
            
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck" required>
                        By clicking you agree to our <a href="#">Terms of Service</a> and <a href="#">Privacy
                            Policy</a>.
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </section>
</body>

</html>