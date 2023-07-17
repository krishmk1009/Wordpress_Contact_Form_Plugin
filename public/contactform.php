<?php

// echo "this is a Contact Form"
global $wpdb, $table_prefix;
$wp_contact = $table_prefix . "contact";

if (isset($_POST["submit_contact"])) {
  $name = esc_sql($_POST["contact_name"]);
  $email = esc_sql($_POST["contact_email"]);
  $message = esc_sql($_POST["contact_message"]);
  $data = array(
    "name" => $name,
    "email" => $email,
    "message" => $message
  );
  $result = $wpdb->insert($wp_contact, $data);

  if ($result == false) {
    echo "Error while submitting the form, Please try again Later";
  }

}

?>

<div class="container">
  
  <div class="contact_div">
    <form action="" method="POST">
      <Label class="contact_label">Name:</Label>
      <input type="text" name="contact_name" class="contact_input" />
      <Label class="contact_label">Email:</Label>
      <input type="email" name="contact_email" class="contact_input" />
      <Label class="contact_label">Message:</Label>

      <textarea type="message" name="contact_message" class="contact_input_message"></textarea>

      <input type="submit" name="submit_contact" class="submit_btn" />


    </form>
  </div>
</div>