<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_id = $conn->real_escape_string($_POST['course_id']);
    $reviewer_name = $conn->real_escape_string($_POST['reviewer_name']);
    $review_text = $conn->real_escape_string($_POST['review_text']);
    $rating = $conn->real_escape_string($_POST['rating']);

    $sql = "INSERT INTO reviews (course_id, reviewer_name, review_text, rating) VALUES ('$course_id', '$reviewer_name', '$review_text', '$rating')";

    if ($conn->query($sql) === TRUE) {
        header("Location: courses.php?course_id=$course_id&success=1");
    } else {
        header("Location: courses.php?course_id=$course_id&error=1");
    }

    $conn->close();
}
?>
