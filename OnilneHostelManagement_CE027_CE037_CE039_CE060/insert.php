<?php
// Include config file
require_once "config.php";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $input_name = trim($_POST["fullname"]);
    $name = $input_name;

    $input_mail = trim($_POST["mail"]);
    $mail = $input_mail;

    $input_Enquiry =trim($_POST["Enquiry"]);
    $enquiry = $input_Enquiry;

    $input_hostel = trim($_POST["hostel"]);
    $hostel = $input_hostel;

    // Prepare an insert statement
    $sql = "INSERT INTO `enquire`(`FullName`, `E-mail`, `Enquiry`, `ChooseYourHostel`) VALUES (?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssss", $param_name, $param_mail, $param_enquiry, $param_hostel);

        // Set parameters
        $param_name = $name;
        $param_mail = $mail;
        $param_enquiry = $enquiry;
        $param_hostel = $hostel;

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Records created successfully. Redirect to landing page
            header("location: Enquire.html");
            exit();
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($link);
}
?>