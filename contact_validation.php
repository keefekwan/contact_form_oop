<?php

require_once 'contact_class.php';

// Form validations
if (!empty($_POST)) {
    $submit = $_POST["submit"];

    if ($submit) {
        $result = 'Form submitted';

        if (!$_POST['email']) {
            $error .= "<br />Please enter your email address";
        }

        if (!$_POST['message']) {
            $error .= "<br />Please enter a message";
        }

        if ($_POST['email'] != "" AND !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
        ) {
            $error .= "<br />Please enter a valid email address";
        }

        if ($error) {
            $result = '<strong>There were error(s) in your form:</strong>' . $error;
        } else {
            // If there are errors send a message if not proceed with sending the email
            try {
                $email = new Contact($_POST['email'], $_POST['message']);
                mail($email->getSendTo(), $email->getSubject(), $email->getMessageForEmail(), $email->getFromEmailAsHeader());
                $email->redirect("contact_form2.php?message=1");
            } catch (\Exception $e) {
                echo 'There was an error, please try again later';
            }
        }
    }
}
