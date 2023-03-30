<?php
// require_once('config.php');
session_start();


// $conn = mysqli_connect(db_server, db_username, db_password, db_name);

if (isset($_POST['import'])) {
    global $conn;
    if (isset($_POST['col_name'])) {
        $col_name = $_POST['col_name'];
        if ($_FILES['csv_file']['size'] > 0) {
            $filename = $_FILES['csv_file']['tmp_name'];
            $file = fopen($filename, "r");

            $column_count = 1;
            while (($data = fgetcsv($file, 2000, ",")) !== FALSE) {

                $column_count = count($data);
                for ($c = 0; $c < $column_count; $c++) {
                    if ($data[$c] == $col_name) {
                        $index = $c;
                        $flag = 1;
                        $_SESSION['email_index'] = $index;
                        break;
                    }
                }

                if (isset($flag) && $flag) {
                    break;
                }

                echo "<br>";
            }

            $inserted_count = 0;
            $ran = 0;
            $_SESSION['csv_data'] = array();
            while (($data = fgetcsv($file, 2000, ",")) !== FALSE) {
                $ran++;
                $real_file_name = $_FILES['csv_file']['name'];

                array_push($_SESSION['csv_data'], $data);
                // echo $real_file_name;
                // $sql_query = "INSERT INTO `csv_files` (`file_name`, `field_name`) VALUES ( '$real_file_name', '$data[$index]');";
                // $run = mysqli_query($conn, $sql_query);
                // if ($run) {
                //     $inserted_count++;
                // } else {
                //     echo "Record Insertion Failed for Column data" . $data[$index];
                // }
            }
            //print_r($_SESSION['csv_data']);
            if (count($_SESSION['csv_data']) == $ran) {
                header("location: csv.php");
            } else {
                $diff = abs($inserted_count - $ran);
                echo $diff . "files could not be inserted";
                // unset($_SESSION['csv_data']);
            }
        }
    }
}
