<?php
require($_SERVER['DOCUMENT_ROOT'] . '/functions.php');
require($_SERVER['DOCUMENT_ROOT'] . '/template/TemplateFunctions.php');
// accessControl()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>View All Rounds</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/template/css/styles.css" rel="stylesheet">
    <style>
        .round-table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }
        .round-table th, .round-table td {
            padding: 8px 2px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .round-table th {
            background-color: #f2f2f2;
        }
        .round-table tr:hover {
            background-color: #f2f2f2;
        }
        #searchForm {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        #searchInputName, #searchInputDate {
            width: calc(50% - 5px);
        }
    </style>
</head>
<body>
    <?php navTEST(); ?>
    <header class="py-5 bg-image-full" style="background-image: url('/template/imagefolder/SunsetCourse.png'); margin-top: 55px; background-size: cover;">
        <div class="text-center my-5">
            <?php
            if (isset($_SESSION['user']['profile']['picURL'])) {
                $profilePicURL = $_SESSION['user']['profile']['picURL'];
                $profilePic = ($profilePicURL !== null) ? $profilePicURL : 'https://dummyimage.com/150x150/6c757d/dee2e6.jpg';
                echo '<img class="img-fluid rounded-circle mb-4" src="' . $profilePic . '" alt="User Profile Picture" />';
            }
            ?>
            <h1 class="text-white fs-3 fw-bolder bg-dark d-inline p-2 rounded">View All Rounds</h1><br><br>
            <p class="text-white-50 mb-0 bg-dark d-inline p-2 rounded">Check all the Rounds</p>
        </div>
    </header>
    <br>
    <div class="col-md-12 mb-3">
        <div class="row">
            <form id="searchForm">
                <input type="text" id="searchInputName" onkeyup="filterRounds()" placeholder="Search by name">
                <input type="text" id="searchInputDate" onkeyup="filterRounds()" placeholder="Search by Date">
            </form>
            <div class="col-md-12 mb-3">
                <div style="padding: 20px;">
                    <table class="round-table">
                        <thead>
                            <tr>
                                <th>Course Name</th>
                                <th>Score</th>
                                <th>Date</th>
                                <th># Of Holes</th>
                                <th style="text-align: right;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $pageData = $_SESSION['pageData'];
                            foreach ($pageData as $i => $data) {
                                echo '<tr>
                                    <td>' . $data['courseName'] . '</td>
                                    <td>' . $data['totalScore'] . '</td>
                                    <td>' . $data['datePlayed'] . '</td>
                                    <td>' . $data['numberOfHoles'] . '</td>
                                    <td style="text-align: right;">
                                        <a href="/handlers/editRoundsHandler.php?id=' . $data['roundID'] . '" class="btn btn-primary">View Round</a>
                                    </td>
                                </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 20rem"></div>
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>
    <script>
        function filterRounds() {
            var nameInput = document.getElementById('searchInputName');
            var dateInput = document.getElementById('searchInputDate');
            var nameFilter = nameInput.value.toUpperCase();
            var dateFilter = dateInput.value.toUpperCase();
            var rows = document.querySelectorAll('.round-table tbody tr');
            for (var i = 0; i < rows.length; i++) {
                var row = rows[i];
                var courseName = row.cells[0].textContent.toUpperCase();
                var datePlayed = row.cells[2].textContent.toUpperCase();
                if ((courseName.indexOf(nameFilter) > -1 || nameFilter === '') && (datePlayed.indexOf(dateFilter) > -1 || dateFilter === '')) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        }
    </script>

    <!-- Bootstrap core JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
