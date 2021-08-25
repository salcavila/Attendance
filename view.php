<?php 
        $title ='View Records';
        require_once 'includes/header.php';
        require_once 'db/conn.php';  
        
        //Get attendee by id
        if(!isset($_GET['id'])){
            echo "<h1 class='text-danger'>Please check details and try again</h1>";
            
        }
        else{
            $id = $_GET['id'];
            $result = $crud->getAttendeeDetails($id);
        
?>

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php
                    echo $result['firstName'] . ' ' . $result['lastName'];
                ?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php
                    echo $result['name'];
                ?>
            </h6>
            <p class="card-text">
                <b>Date of Birth :</b> <?php echo $result['dateOfBirth'];?> <br>
                <b>Email Address :</b> <?php echo $result['emailAddress'];?><br>
                <b>Contact Number :</b> <?php echo $result['contactNumber'];?>
            </p>
        </div>
    </div>
<?php }?>

<?php 
        require_once 'includes/footer.php';
?>