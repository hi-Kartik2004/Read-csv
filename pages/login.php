<?php

?>


<br>
<center>

    <div class="card text-center" style="width: 28rem; flex-direction:row">
        <div class="card-body">
            <h3 class="card-title"><u>Customize the Email Sender</u></h3>
            <br>
            <form method="post" action="">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Sender Email</label>
                    <input type="email" class="form-control" required placeholder="example@example.com" id="exampleInputEmail1" name="senderEmail" aria-describedby="emailHelp">
                    <!-- <div id="emailHelp" class="form-text">We never store your data</div> -->
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Sender Name</label>
                    <input type="text" placeholder="Your Name" required name="senderName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <!-- <div id="emailHelp" class="form-text">We never store your data</div> -->
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Sender Phone</label>
                    <input type="text" name="senderPhone" required minlength="10" maxlength="10" class="form-control" id="exampleInputEmail1" placeholder="12345 67890" aria-describedby="emailHelp">
                    <!-- <div id="emailHelp" class="form-text">We never store your data</div> -->
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Google App Password</label>
                    <input type="password" class="form-control" minlength="16" maxlength="16" required id="exampleInputPassword1" placeholder="16 letter password" name="senderPassword">
                    <div id="emailHelp" class="form-text">Not sure about your Google App password? <a href="https://www.youtube.com/watch?v=J4CtP1MBtOE">Where is it !?</a></div>

                </div>

                <div class="d-flex" style="flex-direction:column; margin-top:20px;">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <br>
                    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Open modal for @mdo</button> -->


                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Enter your name</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="../index.php?auth=0">

                                        <label for="recipient-name" class="col-form-label">Enter your name:</label>
                                        <input type="text" name="sender_name" class="form-control" id="recipient-name">

                                        <button type="submit" class="btn btn-primary">Send</button>
                                        <!-- <a href="?auth=0" class="btn btn-secondary"></a> -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <hr>
                    <form action="?auth=0" method="post">
                        <h5>Configure once use limitless</h5>
                        <input type="text" class="form-control my-3" required name="senderName2" placeholder="Enter your name">
                        <input type="text" minlength="11" maxlength="11" required class="form-control" name="senderPhone2" placeholder="Enter your Phone numnber">

                        <br>
                        <button style="width:100%;" class="btn btn-secondary" type="submit">Use Kartikeya's email id on my name</button>
                    </form>
                    <!-- <a href="?auth=0" class="btn btn-secondary">Use Kartikeya's email id to send email</a> -->
                </div>
                <div id="emailHelp" style="margin-top:15px;" class="form-text">We don't store any of your data <a href="https://github.com/hi-Kartik2004/email-sender">Know more</a></div>

            </form>

            <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
        </div>
    </div>

</center>