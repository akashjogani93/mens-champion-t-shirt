<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us - Print On Demand</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: white;
            padding: 10px 0;
            text-align: center;
        }

        main {
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .contact-info,
        .contact-form {
            background-color: white;
            margin: 20px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
        }

        .contact-info h2,
        .contact-form h2 {
            color: #333;
        }

        .contact-info p {
            font-size: 16px;
            line-height: 1.5;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .contact-form button {
            padding: 10px 20px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .contact-form button:hover {
            background-color: #555;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #333;
            color: white;
        }

        .footer-links a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }

        .footer-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <h1>Contact Us</h1>
    </header>

    <main>
        <div class="contact-info">
            <h2>Our Address</h2>
            <p>1234 Print-on-Demand Street, Suite 100<br>City, State, 56789</p>

            <h2>Contact Information</h2>
            <p>Email: <a href="mailto:support@yourdomain.com">support@yourdomain.com</a></p>
            <p>Phone: (123) 456-7890</p>
            <p>Business Hours: Monday - Friday, 9:00 AM - 6:00 PM</p>
        </div>

        <div class="contact-form">
            <h2>Send Us a Message</h2>
            <form action="#" method="post">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" required placeholder="Enter your name">

                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email">

                <label for="message">Your Message:</label>
                <textarea id="message" name="message" required placeholder="Enter your message" rows="4"></textarea>

                <button type="submit">Send Message</button>
            </form>
        </div>
    </main>

    <footer>
        <div class="footer-links">
            <a href="privacy-policy.html">Privacy Policy</a>
            <a href="terms-conditions.html">Terms & Conditions</a>
        </div>
        <p>&copy; 2025 Your Print-on-Demand Business</p>
    </footer>
</body>
</html>
