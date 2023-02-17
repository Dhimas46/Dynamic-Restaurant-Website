<?php
  define("TITLE", "Contact | Franklin's Fine Dinning");
  include('includes/header.php');

 

?>

<div id="contact">
  <hr>
  <h1>Get in touch with us!</h1>

  <?php

    // Check for header injections
    function has_header_injection($str) {
      return preg_match("/[\r\n]/", $str);
    }

    if(isset($_POST['contact_submit'])) {
      $name    = trim($_POST['name']);
      $email   = trim($_POST['email']);
      $msg     = $_POST['message'];

      // Check to see if $name or $email have header injections
      if(has_header_injection($name) || has_header_injection($email) ) {
        die(); // if true, kill the script
      }

      if(!$name || !$email || !$msg) {
        echo "<h4 class='error'>All fields required.</h4><a href='contact.php' class='button block'>Go back and try again</a>";
        exit;
      }

      // Add the recipient email to a variable
      $to = "dhimaswahyu0846@gmail.com";

      // Create a subject
      $subject = "$name sent you a message via your contact form";

      $message  = "Name: $name\r\n";
      $message .= "Email: $email\r\n";;
      $message .= "Message:\r\n$msg";

      // If the subscribe checkbox is checked
      if(isset($_POST['subscribe']) && $_POST['subscribe'] == 'subscribe') {

        // Add a new line to the $message
        $message .= "\r\n\r\nPlease add $email to the mailing list.\r\n";
      }

      $message = wordwrap($message, 72);

      // Set mail headers into a variable
      $headers = "MIME-Version: 1.0\r\n";
      $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
      $headers .= "From: " . $name . " <" . $email . ">\r\n";
      $headers .= "X-Priority: 1\r\n";
      $headers .= "X-MSMail-Priority: High\r\n\r\n";

      // Send the email!
      mail($to, $subject, $message, $headers);

  ?>
      <!-- Show success message after email has sent -->
      <h5>Thanks for contacting Admin!</h5>
      <p>Please allow 24 hours for a response.</p>
      <p><a href="index.php" class="button block">&laquo; Go to Home Page</a></p>

  <?php
    } else {
  ?>

  <form method="post" action="" id="contact-form">
    <label for="name">Your name</label>
    <input type="text" id="name" name="name">

    <label for="email">Your Email</label>
    <input type="email" id="email" name="email">

    <label for="message">Your message</label>
    <textarea name="message" id="message" cols="30" rows="8"></textarea>

    <input type="checkbox" id="subscribe" name="subscribe" value="subscribe">
    <label for="subscribe">Subscribe to newsletter</label>

    <input type="submit" class="button next" name="contact_submit" value="Send Message">
  </form>
  <?php } ?>

  <hr>

</div>


 <?php include('includes/footer.php'); ?>
