<?php

session_start();

if (isset($_SESSION['csv_data'])) {
    print_r($_SESSION['csv_data']);
}

?>

<br>
<br>
<center>
    <div style="max-width: 600px" style="display:flex;">
        <form action="action.php" method="post">

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Common Subject</label>
                <input type="text" name="subject" required class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Mail Template</label>
                <textarea class="form-control" name="template" required id="exampleFormControlTextarea1" rows="3" placeholder='Let the variables be in the form $column_index (0 based indexing)'></textarea>
                <button class="btn btn-primary mt-3" style="width:100%" name="send">Send Emails</button>
                <br>
                <a href="logout.php" style="width:100%" class="mt-3 btn btn-danger">Unset the CSV File</a>
                <br> <br>
                <a href="hi-kartik2004.github.io/send_mails_via_csv" class="mt-5">Know more</a>
            </div>
        </form>

    </div>
</center>