<!-- <!doctype html>
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
                            <li><a class="dropdown-item" href="./editTrain.php">EDIT TRAINS</a></li>
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
            <h1 class="display-6">MODIFY TRAINS DATA</h1>
        </header>
    </div>
    <section class="container my-4 bg-dark w-50 text-light">
        <form class="row g-3 p-3 my-3">
            <div class="col-md-3">
                <label for="validationDefault01" class="form-label">Train Number</label>
                <input type="text" class="form-control" id="validationDefault01" placeholder="12423" required>
            </div>
            <div class="col-md-3 mt-5">
                <label for="validationDefault01" class="form-label"></label>
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
        <form class="row g-3 p-3">
            <div class="col-md-3">
                <label for="validationDefault01" class="form-label">Train Number</label>
                <input type="text" class="form-control" id="validationDefault01" placeholder="12423" required>
            </div>
            <div class="col-md-9">
                <label for="validationDefault02" class="form-label">Train Name</label>
                <input type="text" class="form-control" id="validationDefault02"
                    placeholder="New Delhi Rajdhani Express" required>
            </div>
            <div class="col-md-6">
                <label for="validationDefault02" class="form-label">Source Station</label>
                <input type="text" class="form-control" id="validationDefault02" placeholder="Dibrugarh" required>
            </div>
            <div class="col-md-6">
                <label for="validationDefault02" class="form-label">Destination Station</label>
                <input type="text" class="form-control" id="validationDefault02" placeholder="New Delhi" required>
            </div>
            <div class="col-md-2">
                <label for="validationDefault02" class="form-label">Source</label>
                <input type="text" class="form-control" id="validationDefault02" placeholder="DBRT" required>
            </div>
            <div class="col-md-4">
                <label for="validationDefault02" class="form-label">Departure Time</label>
                <input type="text" class="form-control" id="validationDefault02" placeholder="20:05" required>
            </div>
            <div class="col-md-2">
                <label for="validationDefault02" class="form-label">Destination</label>
                <input type="text" class="form-control" id="validationDefault02" placeholder="NDLS" required>
            </div>
            <div class="col-md-4">
                <label for="validationDefault02" class="form-label">Arrival Time</label>
                <input type="text" class="form-control" id="validationDefault02" placeholder="10:30" required>
            </div>
            <div class="col-md-4">
                <label for="validationDefault02" class="form-label">Runs on</label>
                <input type="text" class="form-control" id="validationDefault02" placeholder="Runs Daily" required>
            </div>
            <div class="col-md-4">
                <label for="validationDefault02" class="form-label">Total Time</label>
                <input type="text" class="form-control" id="validationDefault02" placeholder="37h 40m" required>
            </div>
            <div class="col-md-4">
                <label for="validationDefault02" class="form-label">Fare</label>
                <input type="text" class="form-control" id="validationDefault02" placeholder="3455" required>
            </div>

            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
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

 -->



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IRRS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
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
            <h1 class="display-6">MODIFY TRAINS DATA</h1>
        </header>
    </div>

    <section class="container my-4 bg-dark w-50 text-light">
        <form class="row g-3 p-3 my-3" id="searchForm">
            <div class="col-md-3">
                <label for="trainNumber" class="form-label">Train Number</label>
                <input type="text" class="form-control" id="trainNumber" placeholder="12423" required>
            </div>
            <div class="col-md-3 mt-5">
                <button type="button" class="btn btn-primary" onclick="searchTrain()">Search</button>
            </div>
        </form>
        <form class="row g-3 p-3" id="updateForm" style="display: none;">
            <!-- Fields will be filled dynamically using JavaScript -->
        </form>

    </section>

    <script>
    function searchTrain() {
        var trainNumber = document.getElementById('trainNumber').value;

        // Send AJAX request to fetch train details
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'fetch_train_details.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Parse the JSON response
                    var trainDetails = JSON.parse(xhr.responseText);
                    // Fill the update form with the fetched data
                    fillUpdateForm(trainNumber, trainDetails);
                } else {
                    console.error('Error fetching train details:', xhr.status);
                }
            }
        };
        xhr.send('trainNumber=' + encodeURIComponent(trainNumber));
    }

    function fillUpdateForm(trainNumber, trainDetails) {
        document.getElementById('updateForm').innerHTML = `
            <div class="col-md-3">
                <label for="trainNumber" class="form-label">Train Number</label>
                <input type="text" class="form-control" id="trainNumber" value="${trainNumber}" required disabled>
            </div>
            <div class="col-md-9">
                <label for="trainName" class="form-label">Train Name</label>
                <input type="text" class="form-control" id="trainName" value="${trainDetails.train_name}" required>
            </div>
            
            <div class="col-md-6">
                <label for="source_station" class="form-label">Source Station</label>
                <input type="text" class="form-control" id="source_station" value="${trainDetails.source_station}" required>
            </div>
                <div class="col-md-6">
                    <label for="destination_station" class="form-label">Destination Station</label>
                    <input type="text" class="form-control" id="destination_station" value="${trainDetails.destination_station}" required>
                </div>
                <div class="col-md-2">
                    <label for="source_code" class="form-label">Source</label>
                    <input type="text" class="form-control" id="source_code" value="${trainDetails.source_code}" required>
                </div>
                <div class="col-md-4">
                    <label for="departure_time" class="form-label">Departure Time</label>
                    <input type="text" class="form-control" id="departure_time" value="${trainDetails.departure_time}" required>
                </div>
                <div class="col-md-2">
                    <label for="destination_code" class="form-label">Destination</label>
                    <input type="text" class="form-control" id="destination_code" value="${trainDetails.destination_code}" required>
                </div>
                <div class="col-md-4">
                    <label for="arrival_time" class="form-label">Arrival Time</label>
                    <input type="text" class="form-control" id="arrival_time" value="${trainDetails.arrival_time}" required>
                </div>
                <div class="col-md-4">
                    <label for="runs_on" class="form-label">Runs on</label>
                    <input type="text" class="form-control" id="runs_on" value="${trainDetails.runs_on}" required>
                </div>
                <div class="col-md-4">
                    <label for="total_time" class="form-label">Total Time</label>
                    <input type="text" class="form-control" id="total_time" value="${trainDetails.total_time}" required>
                </div>
                <div class="col-md-4">
                    <label for="fare" class="form-label">Fare</label>
                    <input type="text" class="form-control" id="fare" value="${trainDetails.fare}" required>
                </div>

            <div class="col-12">
                <button type="button" class="btn btn-primary" onclick="updateTrain()">Update</button>
            </div>
        `;
        // Display the update form
        document.getElementById('updateForm').style.display = 'block';
    }

    function updateTrain() {
        // Implement update functionality here
        console.log('Train details updated successfully.');
    }
</script>

    </script>

</body>

</html>
