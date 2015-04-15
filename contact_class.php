<?php

class Contact {

    private $sendTo;
    private $from;
    private $subject;
    private $message;

    public function __construct($email, $message)
    {
        $this->sendTo = "example@example.com"; // This could also simply be set on the declaration above.
        $this->subject = "Message from Contact Form OOP"; // Not sure what the str_replace is doing for you. Probably belongs in the message instead?
        $this->setEmail($email);
        $this->setMessage($message);
    }

    // Now for the getters of things that are set in the constructor manually. These could have setters, but for the purpose of this, they will not.
    public function getSendTo()
    {
        return $this->sendTo;
    }

    public function getFromEmail()
    {
        return $this->from;
    }

    // A utility function, that retrieves the from email in a format sensible for a email header
    public function getFromEmailAsHeader()
    {
        return "From: " . $this->from . "\r\n";
    }

    public function setEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) !== FALSE) {
            $this->from = $email;
        } else {
            throw new \InvalidArgumentException('Email is not a valid Email address');
        }
        return $this; // Allows you to method chain, for convenience
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function setMessage($message)
    {
        // You could do more validation here if you want, or modification. Throwing an exception if something is incorrect as well.
        $this->message = $message;

        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }

    // As well, you could add convenience methods around a message, specifically for email.
    // In my experience (which may be wrong), I've found that regex seems more reliable for matching/replacing control characters.
    public function getMessageForEmail()
    {
        //return str_replace(array("\\\n","\\\r"),array(" "," "));
        return str_replace(array("\r", "\n", "%0a", "%0d"), '', stripslashes($_POST['message']));
    }

    public function redirect($path)
    {
        header("Location: $path");
        die();
    }
}

