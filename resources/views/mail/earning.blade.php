<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Congratulations!</title>
    <style>
        /* Resetting default styles */
        body, p, h1, h2, h3, h4, td {
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Work Sans', sans-serif;
            background-color: #ffffff;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            margin: 0;
            padding: 0;
        }
        /* Container styles */
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        /* Header styles */
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            max-width: 100%;
            height: auto;
        }
        /* Content styles */
        .content {
            text-align: left;
        }
        .content h2 {
            color: #333333;
            font-size: 24px;
            margin-bottom: 15px;
        }
        .content p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 15px;
        }
        .content a {
            color: #5caad2;
            text-decoration: none;
            font-weight: bold;
        }
        /* Footer styles */
        .footer {
            text-align: center;
            margin-top: 20px;
        }
        .footer p {
            font-size: 14px;
            color: #888888;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="logo.png" alt="Logo">
        </div>
        <div class="content">
            <h2>Congratulations!</h2>
            <p>
                We're thrilled to inform you that {{$data}}.
            </p>
            <p>
                If you have any questions or need further assistance, please contact our support team at <a href="mailto:support@zen-bottrd.com">support@zen-bottrd.com</a>.
            </p>
            <p>
                Kind Regards,<br>
                Zen-bottrd
            </p>
        </div>
        <div class="footer">
            <p>&copy; 2024 - All Rights Reserved</p>
            <p><a href="#">Unsubscribe</a></p>
        </div>
    </div>
</body>
</html>
