<?php
include_once 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Contact Us</title>
<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


body {
    font-family: Arial, sans-serif;
    background: linear-gradient(to bottom, #3498db, #2980b9);
    color: #fff;
}

header {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 1rem 0;
}

h1 {
    font-size: 2rem;
}

main {
    max-width: 800px;
    margin: 2rem auto;
    padding: 1rem;
    background-color: rgba(255, 255, 255, 0.8);
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.contact-form, .social-media {
    margin-bottom: 1rem;
    padding: 1rem;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: rgba(255, 255, 255, 0.9);
}

h2 {
    font-size: 1.5rem;
    margin-bottom: 1rem;
}

label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: bold;
}

input[type="text"],
input[type="email"],
textarea {
    width: 100%;
    padding: 0.5rem;
    margin-bottom: 1rem;
    border: 1px solid #ccc;
    border-radius: 3px;
}

button[type="button"] {
    background-color: #333;
    color: #fff;
    padding: 0.5rem 1rem;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    font-weight: bold;
}

button[type="button"]:hover {
    background-color: #555;
}

.social-media ul {
    list-style: none;
    padding: 0;
    display: flex;
    justify-content: center;
}

.social-media ul li {
    margin-right: 10px;
}

.social-media a img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    transition: transform 0.2s;
}

.social-media a img:hover {
    transform: scale(1.2);
}

footer {

</style>
</head>
<body>
    <header>
        <h1>Contact Us</h1>
    </header>
    <main>
        <section class="contact-form">
            <h2>Send us a message</h2>
            <form>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>
                
                <button type="button" id="submit-button">Submit</button>
            </form>
        </section>
        <section class="social-media">
            <h2>Follow Us</h2>
            <ul>
                <li><a href="https://www.facebook.com/yourcompany" target="_blank"><img src="facebook-icon.png" alt="Facebook"></a></li>
                <li><a href="https://twitter.com/yourcompany" target="_blank"><img src="twitter-icon.png" alt="Twitter"></a></li>
                <li><a href="https://www.instagram.com/yourcompany" target="_blank"><img src="instagram-icon.png" alt="Instagram"></a></li>
                <li><a href="https://www.linkedin.com/company/yourcompany" target="_blank"><img src="linkedin-icon.png" alt="LinkedIn"></a></li>
            </ul>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 Haneen Albayoud</p>
    </footer>
   
</body>
</html>