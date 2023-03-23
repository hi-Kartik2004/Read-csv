<!-- csv file path : D:\1st Sem ISE student list.csv -->
<?php
require_once('php/send_code.php');
session_start();
if (isset($_POST['subject'])) {
    sendEmail($_POST['subject']);
    // header("location: csv.php");
} else {
    echo "Subject missing";
}

// if (isset($_POST['send'])) {
//     $data = $_SESSION['csv_data'];
//     $template = $_POST['template'];
//     // print_r($_SESSION['csv_data']);

//     $count = count($data);
//     // echo $count;
//     // echo $template;
//     // echo strlen($template);

//     $break_points = array();
//     for ($i = 0; $i < $count; $i++) {
//         $str = "";
//         for ($j = 0; $j < strlen($template); $j++) {
//             if ($template[$j] == '$') {
//                 // $str =  $str . $template[$j];
//                 $str  =  $str . ($data[$i][$template[$j + 1]]);
//                 $flag = 1;
//                 // array_push($break_points, $j + 1);
//             } else {
//                 if (isset($flag) && $flag) {
//                     $flag = 0;
//                 } else {
//                     $str = $str . $template[$j];
//                 }
//             }
//         }
//         echo $str;
//         echo "<br>";
//     }



// $break_points_count = count($break_points);

// for ($i = 0; $i < $break_points_count; $i++) {
//     for ($j = 0; $j < $count; $j++) {
//         $template[$break_points[$i]] = $data[$j][$i];
//     }
// }

// echo $str;

// echo count($data);
// }
// echo "Hello";
// // $csv_file = "test.csv";
// if (($csv_file = fopen("test.csv", "r")) !== FALSE) {
//     echo "Inside";
//     while (($data = fgetcsv($csv_file, 1000, ",")) !== FALSE) {
//         // echo "Inner inside";
//         $column_count = count($data);

//         for ($c = 0; $c < $column_count; $c++) {
//             echo $data[$c];
//             echo " ...........";
//         }
//         echo "<br>";
//     }

//     fclose($csv_file);
// }

?>