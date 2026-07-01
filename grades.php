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
    ['id' => 4, 'name' => 'Alice Brown', 'course' => 'Mathematics', 'grade' => 'B'],
    ['id' => 5, 'name' => 'Charlie Davis', 'course' => 'Science', 'grade' => 'C+'],
    
];

// Search by name and filter by course
$search = trim($_GET['search'] ?? '');
$courseFilter = trim($_GET['course'] ?? '');
 
$filteredStudents = array_filter($students, function ($student) use ($search, $courseFilter) {
    $matchesSearch = $search === '' || stripos($student['name'], $search) !== false;
    $matchesCourse = $courseFilter === '' || $student['course'] === $courseFilter;
    return $matchesSearch && $matchesCourse;
});



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
        
        //Add total student count display
        <p><strong>Total Students:</strong> <?php echo count($filteredStudents); ?></p>

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
