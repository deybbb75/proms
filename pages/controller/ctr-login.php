<?php
include '../../includes/init.php';
$db = DB::getInstance();

$redirect_path = '../../login.php';

$email = $_POST['email'];
$enteredPassword = $_POST['password'];

try {
    $student = $db->queryUniqueObject("SELECT * FROM tbl_student WHERE email = :email", ['email' => $email]);
    if ($student) {
        $_SESSION['proms']['student_id']   = $student->student_id;
        $_SESSION['proms']['fullname']      = $student->fname . ' ' . $student->mname . ' ' . $student->lname;
        $_SESSION['proms']['email']         = $student->email;
        $_SESSION['proms']['mobile_no']     = $student->mobile_no;
        $_SESSION['proms']['birthday']      = $student->birthday;
        $_SESSION['proms']['fb_link']       = $student->fb_link;
        $_SESSION['proms']['password']      = $student->password;

        if (password_verify($enteredPassword, $_SESSION['proms']['password'])) {
            $sqlArray = array(
                'student_id'       => $_SESSION['proms']['student_id'],
                'email'        => $_SESSION['proms']['email'],
                'fullname'     => $_SESSION['proms']['fullname'],
                'log_datetime' => date('Y-m-d H:i:s'),
            );
            $db->executeInsert($sqlArray, 'tbl_login_logs');

            if ($db->affectedRows > 0) {
                Alert::success(array(
                    'title' => 'Welcome!',
                    'text'  => 'You have successfully logged in.',
                    'path'  => '../../index.php'
                ));;
            }
        } else {
            Alert::error(array(
                'title' => 'Invalid Password',
                'text'  => 'The password you entered is incorrect. Please try again.',
                'path'  => $redirect_path
            ));
        }
    } else {
        Alert::error(array(
            'title' => 'Login Failed',
            'text'  => 'Account does not exist.',
            'path'  => $redirect_path
        ));
    }
} catch (Exception $e) {
    console_error('An error occurred during login: ' . $e->getMessage());
}

?>