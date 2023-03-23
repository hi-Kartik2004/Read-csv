<center>
    <br>
    <br>
    <br>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <div style="max-width: 600px" style="display:flex;">

            <div class="mb-3">
                <label for="formFileSm" class="form-label">Import your CSV File</label>
                <input class="form-control form-control-sm" name="csv_file" id="formFileSm" type="file" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Email's column name (Case sensitive) : </span>
                <input type="text" class="form-control" name="col_name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" requir>
            </div>

            <button class="btn btn-primary" type="submit" name="import" style="width:100%;"> Upload CSV File</button>

            <br>
            <a href="logout.php" style="width:100%" class="mt-3 btn btn-danger">Unset details</a>


        </div>
    </form>



</center>