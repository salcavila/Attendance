<?php
    require_once 'db/conn.php';
    if(!$_GET['id']){
        include 'includes/errorMessage.php';
        header("Location: viewRecords.php");
    }else{
        //Get the value ID
        $id = $_GET['id'];

        //Call delete function
        $result = $crud->deteleAttendee($id);

        //redirect to list
        if($result)
        {
            header("Location: viewRecords.php");
        }
        else
        {
            include 'includes/errorMessage.php';
        }

    }
?>