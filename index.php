<?php 
        $title ='Index';
        require_once 'includes/header.php';
        require_once 'db/conn.php';

        $results = $crud->getSpecialties(); 
?>

<h1 class="text-center">Registration for IT Conference</h1>

<!--Form Starts-->
<form method="post" action="success.php">
    <div class="mb-3">
        <label for="firstName" class="form-label">First Name</label>
        <input required type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter first name">
    </div>
    <div class="mb-3">
        <label for="lastName" class="form-label">Last Name</label>
        <input required type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter last name">
    </div>
    <div class="mb-3">
        <label for="dob" class="form-label">Date of Birth Name</label>
        <input type="text" class="form-control" id="dob" name="dob">
    </div>
    <div class="mb-3">
        <label for="dob" class="form-label">Area of Expertise</label>
        <select class="form-control" for="specialty" id="specialty" name="specialty">
            <?php
                while($r=$results->fetch(PDO::FETCH_ASSOC)){   
            ?>
                <option value="<?php echo $r['specialty_id'] ?>"><?php echo $r['name'] ?></option>
            <?php 
                }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input required type="email" class="form-control" id="email" name="email" placeholder="Enter Email" aria-describedby="phoneHelp">
        <div id="phoneHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number">
        <div id="emailHelp" class="form-text">We'll never share your number with anyone else.</div>
    </div>

    <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
</form>
<!--Form Ends-->
<br><br><br><br>

<!--Footer-->
<?php require_once 'includes/footer.php'?>
