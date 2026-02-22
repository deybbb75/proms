<?php
include '../../includes/init.php';
$db = DB::getInstance();

$redirect_path = '../../login.php';

if (isset($_POST['terms'])) {
    try {
        // Check if the required fields are set
        $requiredFields = [
            'fname' => 'First Name', 
            'lname' => 'Last Name', 
            'email' => 'Email',
            'mobile_no' => 'Mobile Number',
            'birthday' => 'Birthday',
            'fb_link' => 'Facebook Link',
            'create_password' => 'Password',
            'terms' => 'Terms and Conditions'
        ];
        $missing        = validateRequiredFields($requiredFields, $_POST);
        if ($missing) {
            Alert::error(array(
                'title' => 'Validation Error',
                'html'  => 'Missing required fields: ' . implode(', ', $missing),
                'path'  => $redirect_path
            ));
        }

        // Check for duplicate emp_no or email
        $message = $db->hasDuplicate('SELECT fname, lname, email FROM tbl_student WHERE (fname = :fname AND lname = :lname) OR LOWER(email) = LOWER(:email)', [
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'email'  => $_POST['email']
        ]);
        if ($message) {
            Alert::error(array(
                'title' => 'Error!',
                'html'  => 'Duplicate account detected.',
                'path'  => $redirect_path
            ));
        }

        $password = $_POST['create_password'];

        $hash = password_hash(
            $password,
            PASSWORD_ARGON2ID,
            [
                'memory_cost' => 65536, // 64 MB
                'time_cost'   => 3,     // iterations
                'threads'     => 2
            ]
        );

        if ($hash === false) {
            throw new Exception('Password hashing failed');
        }

        // Prepare the SQL array for insertion
        $sqlArray = array(
            'fname'   => ucwords($_POST['fname']),
            'mname'   => !empty($_POST['mname']) ? ucwords($_POST['mname']) : null,
            'lname'   => ucwords($_POST['lname']),
            'email'   => $_POST['email'],
            'mobile_no' => $_POST['mobile_no'],
            'birthday' => $_POST['birthday'],
            'fb_link' => $_POST['fb_link'],
            'password' => $hash,
            'status' => 'Active',
        );
        // Execute the insert operation
        $db->executeInsert($sqlArray, 'tbl_student');
        
        // Check if the insert was successful
        if ($db->affectedRows > 0) {
            Alert::success(array(
                'title' => 'Sign-up Successful',
                'html'  => 'Account successfully created.',
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
}
