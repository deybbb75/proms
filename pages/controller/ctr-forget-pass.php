<?php
include '../../includes/init.php';
$db = DB::getInstance();

$redirect_path = '../../login.php';

$email = $_POST['email'];

try {
    $student = $db->queryUniqueObject("SELECT * FROM tbl_student WHERE email = :email", ['email' => $email]);
    if ($student) {
        $active_reset = $db->queryUniqueObject("SELECT * FROM tbl_pass_reset WHERE email = :email AND status = 'Active'", ['email' => $email]);

        if($active_reset) {
            if($active_reset->expire_datetime > date('Y-m-d H:i:s')) {
                Alert::error(array(
                    'title' => 'Reset Link Still Active',
                    'text'  => 'A password reset link has already been sent to your email address. Please check your inbox or wait until the current link expires.',
                    'path'  => $redirect_path
                ));
            }else{
                $db->executeUpdate(['status' => 'Expired'], 'tbl_pass_reset', 'reset_id = :reset_id', ['reset_id' => $active_reset->reset_id]);
            }
        }

        $token = bin2hex(random_bytes(32));;

        $hash = password_hash(
            $token,
            PASSWORD_ARGON2ID,
            [
                'memory_cost' => 65536, // 64 MB
                'time_cost'   => 3,     // iterations
                'threads'     => 2
            ]
        );

        if ($hash === false) {
            throw new Exception('Token hashing failed');
        }

        $date = new DateTime();              // current date and time
        $date->modify('+5 minutes');         // add 5 minutes
        $expire_datetime = $date->format('Y-m-d H:i:s');

        $sqlArray = array(
            'student_id'       => $student->student_id,
            'email'             => $student->email,
            'token'             => $hash,
            'expire_datetime'    => $expire_datetime,
            'status'            => 'Active'
        );
        $db->executeInsert($sqlArray, 'tbl_pass_reset');

        if ($db->affectedRows > 0) {
            $_SESSION['proms']['reset_email']['email'] = $student->email;
            $_SESSION['proms']['reset_email']['token'] = $token;

            Alert::success(array(
                'title' => 'Reset Link Sent',
                'text'  => 'A password reset link has been sent to your email address. Please check your inbox.',
                'timer' => 3000,
                'path'  => $redirect_path
            ));
        }
    } else {
        Alert::error(array(
            'title' => 'Email Not Found',
            'text'  => 'No account is associated with this email address.',
            'path'  => '../../forget-pass.php'
        ));
    }
} catch (Exception $e) {
    console_error('An error occurred: ' . $e->getMessage());
}
?>