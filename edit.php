<?php 
        $title ='Edit Record';
        require_once 'includes/header.php';
        require_once 'includes/auth_check.php';
        require_once 'db/conn.php';

        $results = $crud->getSpecialties(); 

        if(!isset($_GET['id']))
        {
            //echo 'error';
            include 'includes/errorMessage.php';
            header('Location: viewRecords.php');
        }
        else
        {
            $id = $_GET['id'];
            $attendee = $crud->getAttendeeDetails($id);
        

?>

<h1 class="text-center">Edit Record</h1>

<!--Form Starts-->
<form method="post" action="editPost.php">
    <input type="hidden" name="id" value="<?php echo $attendee['attendee_id'] ?>"/>
    <div class="mb-3">
        <label for="firstName" class="form-label">First Name</label>
        <input type="text" class="form-control" value="<?php echo $attendee['firstName'] ?>" id="firstName" name="firstName" placeholder="Enter first name">
    </div>
    <div class="mb-3">
        <label for="lastName" class="form-label">Last Name</label>
        <input type="text" class="form-control" value="<?php echo $attendee['lastName'] ?>" id="lastName" name="lastName" placeholder="Enter last name">
    </div>
    <div class="mb-3">
        <label for="dob" class="form-label">Date of Birth Name</label>
        <input type="text" class="form-control" value="<?php echo $attendee['dateOfBirth'] ?>" id="dob" name="dob">
    </div>
    <div class="mb-3">
        <label for="dob" class="form-label">Area of Expertise</label>
        <select class="form-control" for="specialty" id="specialty" name="specialty">
            <?php
                while($r=$results->fetch(PDO::FETCH_ASSOC)){   
            ?>
                <option value="<?php echo $r['specialty_id'] ?>" <?php if($r['specialty_id'] == $attendee['specialty_id']) echo 'selected' ?>>
                    <?php echo $r['name'] ?>
                </option>
            <?php 
                }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" value="<?php echo $attendee['emailAddress'] ?>" id="email" name="email" placeholder="Enter Email" aria-describedby="phoneHelp">
        <div id="phoneHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" value="<?php echo $attendee['contactNumber'] ?>" id="phone" name="phone" placeholder="Enter phone number">
        <div id="emailHelp" class="form-text">We'll never share your number with anyone else.</div>
    </div>

    <a href="viewRecords.php" class="btn btn-default">Back to the list</a>
    <button type="submit" name="submit" class="btn btn-success btn">Save Changes</button>
</form>
<?php } ?>
<!--Form Ends-->
<br><br><br><br>

<!--Footer-->
<?php require_once 'includes/footer.php'?>
