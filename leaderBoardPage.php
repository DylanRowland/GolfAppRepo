<?php
require($_SERVER['DOCUMENT_ROOT'] . '/functions.php');
require($_SERVER['DOCUMENT_ROOT'] . '/template/TemplateFunctions.php');
verifyLogin();
// schleeder morg gage
?>
 <!-- CSS LINK -->
  <link href="/template/css/styles.css" rel="stylesheet" />
<?php
// Query the database for the courses
$stmt = $pdo->prepare("SELECT * FROM GA_courses");
$stmt->execute();
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Initialize an empty array to store the top 5 users for each course
$topUsersPerCourse = [];

// Query the database to get the top 5 users for each course
foreach ($courses as $course) {
    $courseID = $course['courseID'];

    // For 9-hole rounds
    $stmt = $pdo->prepare("
        SELECT
            r.userID,
            r.courseID,
            u.username,
            r.totalScore,
            r.numberOfHoles
        FROM
            GA_rounds r
        JOIN
            GA_users u ON r.userID = u.uid
        WHERE
            r.courseID = :courseID AND r.numberOfHoles >= 9 AND r.numberOfHoles < 18 AND r.totalScore > 0
        ORDER BY
            r.totalScore ASC
        LIMIT
            5
    ");
    $stmt->execute(['courseID' => $courseID]);
    $topUsersPerCourse['9_holes'][$courseID] = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // For 18-hole rounds
    $stmt = $pdo->prepare("
        SELECT
            r.userID,
            r.courseID,
            u.username,
            r.totalScore,
            r.numberOfHoles
        FROM
            GA_rounds r
        JOIN
            GA_users u ON r.userID = u.uid
        WHERE
            r.courseID = :courseID AND r.numberOfHoles >= 18 AND r.totalScore > 0
        ORDER BY
            r.totalScore ASC
        LIMIT
            5
    ");
    $stmt->execute(['courseID' => $courseID]);
    $topUsersPerCourse['18_holes'][$courseID] = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Initialize $filteredStats
$filteredStats = $topUsersPerCourse;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedCourse = $_POST['course-select'];
    if ($selectedCourse !== 'all') {
        $filteredStats = [
            '9_holes' => [$selectedCourse => $topUsersPerCourse['9_holes'][$selectedCourse]],
            '18_holes' => [$selectedCourse => $topUsersPerCourse['18_holes'][$selectedCourse]]
        ];
    }
}
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Golf Leaderboard</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
      <link href="/startbootstrap-full-width-pics-gh-pages/css/styles.css" rel="stylesheet" />
      <link href="/resources/style.css" rel="stylesheet" />

        <style>
            /* Table styles */
            table {
                width: 100%;
                border-collapse: collapse;
            }

            th, td {
                padding: 8px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }

            th {
                background-color: #f2f2f2;
            }

            .card-header {
                background-color: #343a40;
                color: #fff;
            }

            .table-container {
                max-height: 300px;
                overflow-y: auto;
            }
        </style>
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
                if (isset($_SESSION['user']['profile']['picURL'])) {
                    $profilePicURL = $_SESSION['user']['profile']['picURL'];
                    if ($profilePicURL !== null) {
                        echo '<img class="img-fluid rounded-circle mb-4" src="' . $profilePicURL . '" alt="User Profile Picture" />';
                    } else {
                        echo '<img class="img-fluid rounded-circle mb-4" src="https://dummyimage.com/150x150/6c757d/dee2e6.jpg" alt="Default Profile Picture" />';
                    }
                }
                ?>
                <!-- user profile pic ENDS here-->
                <h1 class="text-white fs-3 fw-bolder bg-dark d-inline p-2 rounded">Leaderboard</h1>
                <br></br>
                <p class="text-white-50 mb-0 bg-dark d-inline p-2 rounded">Check out who is on top, and see if you have what it takes to be the best of the best.</p>
            </div>
        </header>
        <!-- Content section-->
        <section class="py-5">
            <div class="container my-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Filter Courses</h5>
                            </div>
                            <div class="card-body">
                                <form method="post">
                                    <div class="mb-3">
                                        <label for="course-select" class="form-label">Select Course:</label>
                                        <select name="course-select" id="course-select" class="form-select">
                                            <option value="all">All Courses</option>
                                            <?php foreach ($courses as $course): ?>
                                                <option value="<?php echo $course['courseID']; ?>"><?php echo $course['courseName']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <input type="submit" value="Show" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card" style="height: 435px;">
                            <div class="card-header">
                                <h5 class="card-title text-center">Scorecards</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="text-center">9 Holes Scorecard</h6>
                                        <div class="table-container">
                                            <?php foreach ($filteredStats['9_holes'] as $courseID => $users): ?>
                                                <?php if (!empty($users)): ?>
                                                    <h6 class="mt-3"><?php echo $courses[array_search($courseID, array_column($courses, 'courseID'))]['courseName']; ?></h6>
                                                    <table class="table table-sm table-striped">
                                                        <tr>
                                                            <th>User Name</th>
                                                            <th>Total Score</th>
                                                            <th>Number of Holes</th>
                                                        </tr>
                                                        <?php foreach ($users as $user): ?>
                                                            <tr>
                                                                <td><?php echo $user['username']; ?></td>
                                                                <td><?php echo $user['totalScore']; ?></td>
                                                                <td><?php echo $user['numberOfHoles']; ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </table>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="text-center">18 Holes Scorecard</h6>
                                        <div class="table-container">
                                            <?php foreach ($filteredStats['18_holes'] as $courseID => $users): ?>
                                                <?php if (!empty($users)): ?>
                                                    <h6 class="mt-3"><?php echo $courses[array_search($courseID, array_column($courses, 'courseID'))]['courseName']; ?></h6>
                                                    <table class="table table-sm table-striped">
                                                        <tr>
                                                            <th>User Name</th>
                                                            <th>Total Score</th>
                                                            <th>Number of Holes</th>
                                                        </tr>
                                                        <?php foreach ($users as $user): ?>
                                                            <tr>
                                                                <td><?php echo $user['username']; ?></td>
                                                                <td><?php echo $user['totalScore']; ?></td>
                                                                <td><?php echo $user['numberOfHoles']; ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </table>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer-->
        <footer class="py-4 bg-dark" style="position: fixed; bottom: 0; width: 100%;">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
    </html>