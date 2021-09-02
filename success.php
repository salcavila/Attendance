<?php 
        $title ='Success';
        require_once 'includes/header.php';
        require_once 'db/conn.php';

        if(isset($_POST['submit'])){
            //extract values from the $_POST array
            $fname = $_POST['firstName'];
            $lname = $_POST['lastName'];
            $dob = $_POST['dob'];
            $email = $_POST['email'];
            $contact = $_POST['phone'];
            $specialty = $_POST['specialty'];

            $orig_file = $_FILES["avatar"]["tmp_name"];
            $target_dir = 'uploads/';
            $destination = $target_dir . basename($_FILES["avatar"]["name"]);
            move_uploaded_file($orig_file, $destination);

            exit();

            //call function to insert and track if success or not
            $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $contact, $specialty);

            if($isSuccess){
                include 'includes/successMessage.php';
            }
            else{
                include 'includes/errorMessage.php';
            }
        }
?>



<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">
            <?php
                echo $_POST['firstName'] . ' ' . $_POST['lastName'];
            ?>
        </h5>
        <h6 class="card-subtitle mb-2 text-muted">
            <?php
                echo $_POST['specialty'];
            ?>
        </h6>
        <p class="card-text">
            <b>Date of Birth :</b> <?php echo $_POST['dob'];?> <br>
            <b>Email Address :</b> <?php echo $_POST['email'];?><br>
            <b>Contact Number :</b> <?php echo $_POST['phone'];?>
        </p>
    </div>
</div>

<br><br><br><br>

<!--Footer-->
<?php require_once 'includes/footer.php'?>
