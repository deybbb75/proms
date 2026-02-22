<?php
include '../../includes/init.php';
$db = DB::getInstance();

$redirect_path = '../../index.php';

if (isset($_POST['sub_prog_id'])) {
    try {
        $sub_prog_id = decrypt_data($_POST['sub_prog_id']);
        // Check for duplicate emp_no or email
        $message = $db->hasDuplicate(
            'SELECT student_id, prog_id, sub_prog_id 
            FROM tbl_reservation 
            WHERE student_id = :student_id 
            AND ay_id = :ay_id 
            AND prog_id = :prog_id 
            AND sub_prog_id = :sub_prog_id 
            AND status = "Pending" ', 
            [
                'student_id'        => $_SESSION['proms']['student_id'], 
                'ay_id'             => $_SESSION['proms']['ay_id'],
                'prog_id'           => $_SESSION['proms']['prog_id'], 
                'sub_prog_id'       => $sub_prog_id,
            ]
        );
        if ($message) {
            Alert::error(array(
                'title' => 'Duplicate Reservation',
                'html'  => 'You already have a reservation for this sub-program for the current academic year.',
                'path'  => $_SERVER['HTTP_REFERER']
            ));
        }

        // Prepare the SQL array for insertion
        $sqlArray = array(
            'student_id'        => $_SESSION['proms']['student_id'],
            'ay_id'             => $_SESSION['proms']['ay_id'],
            'prog_id'           => $_SESSION['proms']['prog_id'], 
            'sub_prog_id'       => $sub_prog_id, 
            'date_scheduled'    => $_POST['date_scheduled'] ?? null,
            'datetime_reserved' => date('Y-m-d H:i:s'),
            'status'            => 'Pending'
        );
        // Execute the insert operation
        $db->executeInsert($sqlArray, 'tbl_reservation');
        
        // Check if the insert was successful
        if ($db->affectedRows > 0) {
            if($_SESSION['proms']['prog_id'] == 1){
                $swalObject = new stdClass();
                $swalObject->title = 'Applied Successful';
                $swalObject->text = 'Kindly proceed to the CTEL office for more information.';
                $swalObject->icon = 'success';

                safe_redirect($redirect_path);
            }else{
                $swalObject = new stdClass();
                $swalObject->title = 'Reserve Successful';
                $swalObject->text = 'Reservation successfully Submitted.';
                $swalObject->showConfirmButton = false;
                $swalObject->timer = 2500;
                $swalObject->icon = 'success';
            }

            $_SESSION['proms']['swal_object'] = $swalObject;
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
?>