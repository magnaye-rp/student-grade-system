<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Student Grade System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Dashboard</h1>
            <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
        </header>
        <nav>
            <a href="grades.php" class="btn">Manage Grades</a>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </nav>
        <!-- added stats section -->
        <div class="stats">
            <div class="stat-card">
                <h3>Total Students</h3>
                <p>0</p>
            </div>
            <div class="stat-card">
                <h3>Total Courses</h3>
                <p>0</p>
            </div>
            <div class="stat-card">
                <h3>Grades Recorded</h3>
                <p>0</p>
            </div>
        </div>
        <!-- added recent grades section -->
         <div class="recent-grades">
            <h2>Recent Grades</h2>
            <table>
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Course</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Sample data -->
                    <tr>
                        <td>John Doe</td>
                        <td>Math 101</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td>Jane Smith</td>
                        <td>Science 201</td>
                        <td>B+</td>
                    </tr>
                </tbody>
            </table>
        </div>
         <!-- added recent courses section -->
        <div class="recent-courses">
            <h2>Recent Courses</h2>
            <ul>
                <li>Math 101</li>
                <li>Science 201</li>
                <li>History 301</li>
            </ul>
            
    </div>
    <!-- some changes made -->
</body>
</html>
