<?php require_once 'contact_validation.php'; ?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" type="text/css" href="../../contact_form/css/style.css">
</head>
<body>
<div>

    <form action="contact_form2.php" method="post" class="basic-grey" novalidate="novalidate">
        <h1>Contact Form</h1>
        <p>Please contact us</p>

        <div>
            <?php
            if (!empty($result)) {
                echo $result;
            }
            ?>
            <?php
            if (isset($_GET['message']) == 1) {
                echo "Thank you, I'll be in touch.";
            } else {
                echo "";
            }
            ?>
        </div><br>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="" placeholder="">
        </div>

        <div>
            <label for="message">Message:</label>
            <textarea id="message" name="message"></textarea>
        </div>

        <div>
            <input type="submit" name="submit" value="Send" class="button">
        </div>

    </form>

</div>
</body>
</html>

