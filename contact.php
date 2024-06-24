<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO contact_messages (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        $success_message = "Message sent successfully!";
    } else {
        $error_message = "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/styles2.css"/>
</head>
<body>
<section class="main">
    <nav>
        <a href="#" class="logo">
            <img src="images/image02.png" alt="Logo"/>
        </a>
        <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="courses.php">Courses</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php" class="active">Contact</a></li>
        </ul>
    </nav>
    <div class="main-heading">
        <h1>Contact Us</h1>
        <p>Have questions or need more information? Reach out to us!</p>
    </div>
</section>

<section class="contact-section">
    <div class="contact-heading">
        <h1>Contact Us</h1>
        <p>Have questions or need more information? Reach out to us!</p>
        <?php if (isset($success_message)): ?>
            <p class="success"><?php echo $success_message; ?></p>
        <?php endif; ?>
        <?php if (isset($error_message)): ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php endif; ?>
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
</body>
</html>
