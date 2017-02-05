<?php

  // is_blank('abcd')
  function is_blank($value='') {
    // TODO
    return "Field can't be empty";
  }

  // has_length('abcd', ['min' => 3, 'max' => 5])
  function has_length($value, $options=array()) {
    // TODO
    return strlen($value);
  }

  // has_valid_email_format('test@test.com')
  function has_valid_email_format($value) 
  {
    // TODO
    if(!filter_var($value, FILTER_VALIDATE_EMAIL))
    {
      $emailErr = "Invalid email";
      return $emailErr;
    }
    else
      return "";
  }

  //to check for valid firstname and lastname
  function has_valid_firstname($value)
  {
    $err = "";
    if(has_length($value)<2)
      $err = "Firstname should have atleast 2 characters";
    return $err;
  }

  function has_valid_lastname($value)
  {
    $err = "";
    if(has_length($value)<2)
      $err = "Lastname should have atleast 2 characters";
    return $err;
  }


  // has_valid_username()
  function has_valid_username($value)
  {
    $length = has_length($value);
    $userError = "";
    if($length<8||$length>255)
      $userError = "Username has to be atleast 8 characters and less than 255 characters";
    return $userError;
  }
?>
