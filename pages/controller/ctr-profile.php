<?php
include '../../includes/init.php';
$db = DB::getInstance();

$redirect_path = '../profile.php';

try {
    // Check if the required fields are set
    $requiredFields = [
        'fname'             => 'First Name', 
        'lname'             => 'Last Name',
        'mobile_no'         => 'Mobile Number',
        'birthday'          => 'Birthday',
        'fb_link'           => 'Facebook Link',
    ];
    $missing        = validateRequiredFields($requiredFields, $_POST);
    if ($missing) {
        Alert::error(array(
            'title' => 'Validation Error',
            'html'  => 'Missing required fields: ' . implode(', ', $missing),
            'path'  => $redirect_path
        ));
    }

    $email = $_SESSION['proms']['email'];

    // Check for duplicate emp_no or email
    $message = $db->hasDuplicate('SELECT fname, lname, email FROM tbl_student WHERE ((fname = :fname AND lname = :lname) OR LOWER(email) = LOWER(:email)) AND student_id != :student_id', [
        'fname' => $_POST['fname'],
        'lname' => $_POST['lname'],
        'email'  => $email,
        'student_id' => $_SESSION['proms']['student_id']
    ]);
    if ($message) {
        Alert::error(array(
            'title' => 'Error!',
            'html'  => 'Duplicate account detected.',
            'path'  => $redirect_path
        ));
    }

    // Prepare the SQL array for insertion
    $sqlArray = array(
        'fname'   => ucwords(strtolower($_POST['fname'])),
        'mname'   => !empty($_POST['mname']) ? ucwords(strtolower($_POST['mname'])) : null,
        'lname'   => ucwords(strtolower($_POST['lname'])),
        'mobile_no' => $_POST['mobile_no'],
        'birthday' => $_POST['birthday'],
        'fb_link' => $_POST['fb_link'],
    );
    // Execute the insert operation
    $db->executeUpdate($sqlArray, 'tbl_student', 'student_id = :student_id', ['student_id' => $_SESSION['proms']['student_id']]);
    
    // Check if the insert was successful
    if ($db->affectedRows > 0) {
        Alert::success(array(
            'title' => 'Profile Updated Successfully',
            'html'  => 'Your profile has been updated.',
            'path'  => $redirect_path
        ));
    }else{
        Alert::warning(array(
            'title' => 'No Update Performed',
            'html'  => 'Submitted data is identical to existing record.',
            'path'  => $redirect_path
        ));
    }
} catch (DBException $e) {
    // Handle the database error
    Alert::error(array(
        'title' => 'Server Error',
        'html'  => 'Something went wrong on our end.',
        'path'  => $redirect_path
    ));

    // echo $e->getMessage();
} catch (Exception $e) {
    // Handle other exceptions
    Alert::error(array(
        'title' => 'Error',
        'html'  => 'Something went wrong with your request.',
        'path'  => $redirect_path
    ));
}

