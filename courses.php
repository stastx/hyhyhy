<?php
include 'config.php';

// Fetch courses from the database
$sql_courses = "SELECT * FROM courses";
$result_courses = $conn->query($sql_courses);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/styles2.css"/>
    <script src="js/cookies.js"></script>
    <script src="js/main.js" defer></script>
</head>
<body>
<section class="main">
    <nav>
        <a href="index.php" class="logo">
            <img src="images/image02.png" alt="Logo"/>
        </a>
        <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="courses.php" class="active">Courses</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>
    <div class="main-heading">
        <h1>Our Courses</h1>
        <p>Explore our wide range of courses and start learning today.</p>
    </div>
</section>

<section class="courses">
    <div class="course-container">
        <?php if ($result_courses->num_rows > 0): ?>
            <?php while($course = $result_courses->fetch_assoc()): ?>
                <div class="course-box">
                    <div class="course-img">
                        <img src="<?php echo htmlspecialchars($course['image_url']); ?>" alt="<?php echo htmlspecialchars($course['title']); ?>"/>
                    </div>
                    <div class="course-text">
                        <h4><?php echo htmlspecialchars($course['title']); ?></h4>
                        <p><?php echo htmlspecialchars($course['description']); ?></p>
                        <p><strong>Instructor:</strong> <?php echo htmlspecialchars($course['instructor']); ?></p>
                    </div>
                    <div class="reviews">
                        <h5>Reviews:</h5>
                        <?php
                        // Fetch reviews for the course
                        $course_id = $course['id'];
                        $sql_reviews = "SELECT * FROM reviews WHERE course_id = $course_id";
                        $result_reviews = $conn->query($sql_reviews);

                        if ($result_reviews->num_rows > 0) {
                            while($review = $result_reviews->fetch_assoc()) {
                                echo "<div class='review'>";
                                echo "<p><strong>" . htmlspecialchars($review['reviewer_name']) . ":</strong> ";
                                echo htmlspecialchars($review['review_text']) . " ";
                                echo "<em>(" . htmlspecialchars($review['rating']) . "/5)</em></p>";
                                echo "</div>";
                            }
                        } else {
                            echo "<p>No reviews yet. Be the first to review this course!</p>";
                        }
                        ?>
                        <form class="review-form" action="save_review.php" method="POST">
                            <input type="hidden" name="course_id" value="<?php echo $course['id']; ?>">
                            <input type="text" name="reviewer_name" placeholder="Your Name" required>
                            <textarea name="review_text" placeholder="Your Review" required></textarea>
                            <label for="rating">Rating:</label>
                            <select name="rating" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <button type="submit">Submit Review</button>
                        </form>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No courses available at the moment.</p>
        <?php endif; ?>
    </div>
</section>

<?php $conn->close(); ?>
</body>
</html>
