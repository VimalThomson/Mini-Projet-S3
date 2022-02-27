<?php 
include 'db2.php';
include 'side.php';
session_start();
if($_SESSION['login_admin']==""){
    header("location:index.php");
}
$result = mysqli_query($con, "SELECT * FROM `users` join `role_db` on users.role_id=role_db.role_id join `worker` on worker.role_id=role_db.role_id WHERE role_db.status=3");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="stylesheet.css" rel="stylesheet">
    <link rel="icon" href="favicon.png" type="image/png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worker Requests</title>
    <style>
        h3{
            font-family: "Raleway", Helvetica, sans-serif;
        }
        a{
          text-decoration:none;
        }
        table, th, td {
            color: aliceblue;
            
            border: 1px solid white;
        }   
        table{
            margin-left: auto;
            margin-right: auto;
           
        }

        .card-detail{
            background-color: rgb(240, 74, 56);
            font-family: verdana;
            width:350px;
            padding:3px;
            color:white;
        }
        .card-detail-two{
            font-family: verdana;
            width:350px;
            margin-top:-30px;
            padding:3px;
            background:white;
        }
        .blah{
            margin-right:20px;
        }
        h2{
            color: aliceblue;
        }
        input[type=submit] {
            width: 80px;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            margin: 0 0 0 80px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }


        input[type=reset] {
            width: 80px;
            height: 36px;
            background-color: #ff3939;
            color: white;
            padding: 10px;
            margin: 0 0 0 80px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }
        </style>
</head>


<body>
<?php include 'side.php'; ?>

<div class="common-div">
        <h3>Rejected Workers</h3>
    </div>
        
        
        <table style="width:700px" style="background-color:grey">


        <tr>
            <th style="text-align: center;">Name</th>
            <th style="text-align: center;">Phone</th>
            <th style="text-align: center;">Email</th>
            <th style="text-align: center;">Worker Service</th>
            <th style="text-align: center;">Aadhar No</th>
            <th style="text-align: center;">Action</th>
        </tr><?php
        $count = 0;
        while ($row = mysqli_fetch_assoc($result)) {  ?>
        <tr>
            <td><?php echo $row['fname']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td> <?php echo $row['email']; ?></td>
            <td><?php echo $row['profession']; ?></td>
            <td><?php echo $row['aadhar_no']; ?></td>
            <td><a href="accept_worker.php?s_id=<?php echo $row['role_id']; ?>" style="margin-left: -80px;">
                            <input type="submit" value="Approve"></a></td>
        
        </tr>
        <?php } ?>

        
    </table>
       

           
    </div>
</div>

</body>
</html>