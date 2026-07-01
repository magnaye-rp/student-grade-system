<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Sample data
$students = [
    ['id' => 1, 'name' => 'John Doe', 'course' => 'Mathematics', 'grade' => 'A'],
    ['id' => 2, 'name' => 'Jane Smith', 'course' => 'Science', 'grade' => 'B+'],
    ['id' => 3, 'name' => 'Bob Johnson', 'course' => 'English', 'grade' => 'A-'],
];

// Find the highest grade
$highestGrade = $students[0]['grade'];

foreach ($students as $student) {
    if (strcmp($student['grade'], $highestGrade) < 0) {
        $highestGrade = $student['grade'];
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grades - Student Grade System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Student Grades</h1>
            <a href="dashboard.php" class="btn">Back to Dashboard</a>
        </header>
        <table class="grades-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Grade</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                <tr>
                    <td><?php echo $student['id']; ?></td>
                    <td><?php echo htmlspecialchars($student['name']); ?></td>
                    <td><?php echo htmlspecialchars($student['course']); ?></td>
                    <td><?php echo htmlspecialchars($student['grade']); ?></td>
                    <td>
                        <button class="btn btn-small">Edit</button>
                        <button class="btn btn-small btn-danger">Delete</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button class="btn btn-primary">Add New Grade</button>
    </div>
</body>
</html>
