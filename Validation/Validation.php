<?php
class Validation
{
    // Method to check empty fields
    public function check_empty($data, $fields)
    {
        $msg = null;
        foreach ($fields as $value) {
            if (empty($data[$value])) {
                $msg .= "$value field empty <br />";
            }
        }
        return $msg;
    }

    // Method to validate name
    public function is_name_valid($name)
    {
        if (strlen($name) >= 3) {
            return true;
        } else {
            return false;
        }
    }

    // Method to validate address
    public function is_address_valid($address)
    {
        if (strlen($address) >= 3) {
            return true;
        } else {
            return false;
        }
    }

    // Method to validate phone
    public function is_phone_valid($phone)
    {
        if (is_numeric($phone)) {
            if (preg_match("/^(98|97)[0-9]{8}$/", $phone)) {
                return true;
            }
        }
        return false;
    }

    // Method to validate email
    public function is_email_valid($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
}
?>
