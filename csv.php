<?php
session_start();
include("pages/header.php");
include("pages/input.php");

if (isset($_SESSION['csv_data'])) {
    include("pages/customise.php");
}

include("pages/footer.php");
