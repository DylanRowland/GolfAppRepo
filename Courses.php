<?php
require($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); 
require($_SERVER['DOCUMENT_ROOT'] . '/template/TemplateFunctions.php'); 
// Access control logic

// Include this line to check if the user is logged in; add your logic as needed
// accessControll();

// Example: If you want to redirect users to the login page if they are not logged in
// if (!isset($_SESSION['user'])) {
//     header("Location: login.php");
//     exit();
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Golf Courses Chart - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/startbootstrap-full-width-pics-gh-pages/css/styles.css" rel="stylesheet" />
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <!-- CSS LINK -->
  <link href="/template/css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Responsive navbar-->
    <?php
    navTEST();
    ?>

    <header class="py-5 bg-image-full" style="background-image: url('/template/imagefolder/SunsetCourse.png'); margin-top: 55px; background-size: cover;">
        <div class="text-center my-5">
            <!-- User profile picture starts here -->
            <?php
            // Check if the user array and its keys are defined
            if (isset($_SESSION['user']['profile']['picURL'])) {
                $profilePicURL = $_SESSION['user']['profile']['picURL'];

                if ($profilePicURL !== null) {
                    // If profile picture URL is not null, display the user's profile picture
                    echo '<img class="img-fluid rounded-circle mb-4" src="' . $profilePicURL . '" alt="User Profile Picture" />';
                } else {
                    // If profile picture URL is null, display the default image
                    echo '<img class="img-fluid rounded-circle mb-4" src="https://dummyimage.com/150x150/6c757d/dee2e6.jpg" alt="Default Profile Picture" />';
                }
            }
            ?>
            <!-- user profile pic ENDS here-->
            <h1 class="text-white fs-3 fw-bolder bg-dark d-inline p-2 rounded">Golf Courses Chart</h1>
          <br></br>
            <p class="text-white-50 mb-0 bg-dark d-inline p-2 rounded">Explore the popularity of golf courses</p>
        </div>
    </header>

    <!-- Content section -->
    <section class="py-5">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2>Discover Popular Golf Courses</h2>
                    <p class="lead">Explore the popularity or ratings of different golf courses with an interactive chart.</p>
                    <p class="mb-0">Whether it's a famous golf resort or a hidden gem, see how golfers rate and choose their favorite courses.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- dont touch -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- world ends if you touch this -->
    <style>
        .search-bar {
            max-width: 400px;
            margin: 0 auto;
        }
        table {
            width: auto;
            margin: 0 auto; /* Center the table */
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        img {
            max-width: 50px;
            max-height: 50px;
            display: block;
            margin: 0 auto;
        }
        .text-box {
            width: 100px;
            height: 50px;
            border: 1px solid #ccc;
            padding: 5px;
            cursor: pointer; /* Change cursor to pointer on hover */
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="input-group search-bar">
                <input type="text" class="form-control" id="searchInput" placeholder="Search..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" onclick="filterTable()"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<table id="dataTable">
    <tr>
        <th>Photo</th>
        <th>Course Name</th>
    </tr>
    <?php
    if (isset($_SESSION['pageData'])) {
        $courses = $_SESSION['pageData'];
        foreach ($courses as $course) {
            $courseID = $course['courseID'];
            $courseName = $course['courseName'];
            $courseLogo = $course['courseLogo'];
    ?>
    <tr>
        <td><img src="<?php echo $courseLogo; ?>" alt="<?php echo $courseName; ?>"></td>
        <td><a href="/handlers/ViewCoursesHandler.php?id=<?php echo $courseID; ?>"><?php echo $courseName; ?></a></td>
    </tr>
    <?php
        }
    }
    ?>
</table>

<script>
    function filterTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("dataTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1]; // Change index to match the column you want to search
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>

<br><br>
<hr> <br><br>
<!-- Footer -->
<footer class="py-5 bg-dark" style="position: fixed; bottom: 0; width: 100%;">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
</footer>

<!-- Bootstrap core JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS -->
<script src="js/scripts.js"></script>
</body>
</html>