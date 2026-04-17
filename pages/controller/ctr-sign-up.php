<?php
include '../../includes/init.php';
$db = DB::getInstance();

$redirect_path = '../../login.php';
$error_redirect_path = '../../sign-up.php';

if (isset($_POST['terms'])) {
    try {
        // Check if the required fields are set
        $requiredFields = [
            'fname'             => 'First Name', 
            'lname'             => 'Last Name', 
            'email'             => 'Email',
            'mobile_no'         => 'Mobile Number',
            'birthday'          => 'Birthday',
            'fb_link'           => 'Facebook Link',
            'create_password'   => 'Password',
            'terms'             => 'Terms and Conditions'
        ];
        $missing        = validateRequiredFields($requiredFields, $_POST);
        if ($missing) {
            echo json_encode([
                'swal' => sweetAlert([
                    'title' => 'Validation Error',
                    'html' => 'Missing required fields: ' . implode(', ', $missing),
                    'icon' => 'error',
                ]),
            ]);
            exit;
        }

        // Check for duplicate emp_no or email
        $message = $db->hasDuplicate('SELECT email FROM tbl_student WHERE LOWER(email) = LOWER(:email)', [
            'email'  => $_POST['email']
        ]);
        if ($message) {
            echo json_encode([
                'swal' => sweetAlert([
                    'title' => 'Email Already Registered',
                    'html' => 'An account with this email already exists. Please use a different email or log in.',
                    'icon' => 'error',
                ]),
            ]);
            exit;
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
            'fname'   => ucwords(strtolower($_POST['fname'])),
            'mname'   => !empty($_POST['mname']) ? ucwords(strtolower($_POST['mname'])) : null,
            'lname'   => ucwords(strtolower($_POST['lname'])),
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
            echo json_encode([
                'swal' => sweetAlert([
                    'title' => 'Success',
                    'html' => 'Account successfully created.',
                    'icon' => 'success',
                ]),
            ]);
            exit; 
        }
    } catch (DBException $e) {
        // Handle the database error
        echo json_encode([
            'swal' => sweetAlert([
                'title' => 'Server Error',
                'html' => 'Something went wrong on our end.',
                'icon' => 'error',
            ]),
            'debug' => $e->getMessage()
        ]);
        exit;

        // echo $e->getMessage();
    } catch (Exception $e) {
        // Handle other exceptions
        echo json_encode([
            'swal' => sweetAlert([
                'title' => 'Error',
                'html'  => 'Something went wrong with your request.',
                'icon' => 'error',
            ]),
            'debug' => $e->getMessage()
        ]);
        exit;
    }
}
