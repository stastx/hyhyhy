<?php
include 'config.php';

// Fetch features from the database
$sql = "SELECT * FROM features";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/styles2.css"/>
    <script src="js/cookies.js"></script> <!-- Include cookies.js -->
    <script src="js/main.js" defer></script> <!-- Include main.js with defer to load after HTML -->
</head>
<body>
<section class="main">
    <nav>
        <a href="#" class="logo">
            <img src="images/image02.png" alt="Logo"/>
        </a>
        <ul class="menu">
            <li><a href="index.php" class="active">Home</a></li>
            <li><a href="courses.php">Courses</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>
    <div class="main-heading">
        <h1>Catch The Wave To Success</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <form action="#">
            <div class="input-row">
                <div class="input-group">
                    <span><i class="ri-search-line"></i></span>
                    <input type="text" placeholder="Search for Course"/>
                </div>
                <div class="input-group">
                    <span><i class="ri-arrow-down-s-line"></i></span>
                    <input type="text" placeholder="Categories"/>
                </div>
            </div>
            <button type="submit">Search Now</button>
        </form>
    </div>
</section>

<section class="features">
    <div class="feature-container">
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="feature-box">
                    <div class="f-img">
                        <img src="<?php echo htmlspecialchars($row['image_url']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>"/>
                    </div>
                    <div class="f-text">
                        <h4><?php echo htmlspecialchars($row['title']); ?></h4>
                        <p><?php echo htmlspecialchars($row['description']); ?></p>
                        <a href="#" class="main-btn">Check</a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No features available.</p>
        <?php endif; ?>
    </div>
</section>

<section class="contact-section">
    <div class="contact-heading">
        <h1>Contact Us</h1>
        <p>Have questions or need more information? Reach out to us!</p>
    </div>
    <div class="contact-container">
        <div class="contact-info">
            <h3>Our Address</h3>
            <p>123 Learning Lane, Knowledge City, Education State, 45678</p>
            <h3>Email Us</h3>
            <p>info@ourcompany.com</p>
            <h3>Call Us</h3>
            <p>(123) 456-7890</p>
        </div>
        <div class="contact-form">
            <form action="contact.php" method="POST">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" placeholder="Your Message" required></textarea>
                <button type="submit">Send Message</button>
            </form>
        </div>
    </div>
</section>

<!-- Modal Example -->
<div class="modal">
    <div class="modal-content">
        <span class="close-modal">&times;</span>
        <h2>Modal Title</h2>
        <p>This is a modal popup example.</p>
    </div>
</div>

<!-- Language Selector -->
<select class="language-select">
    <option value="en" <?php echo ($_COOKIE['user_language'] == 'en') ? 'selected' : ''; ?>>English</option>
    <option value="es" <?php echo ($_COOKIE['user_language'] == 'es') ? 'selected' : ''; ?>>Spanish</option>
    <!-- Add more languages as needed -->
</select>

<?php $conn->close(); ?>
</body>
</html>
