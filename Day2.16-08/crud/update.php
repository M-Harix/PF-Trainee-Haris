<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head> 
<body>
    <?php
        require_once("conn.php");
        $name = $email = $gender = $address = "";
        $nameErr = $emailErr = $addressErr = $genderErr = NULL;     
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $address = $_POST['address'];    
            if (isset($id) && isset($name) && isset($email) && isset($address) && isset($gender))
            {
                $query1="UPDATE trainees SET name='$name', email='$email', address='$address', gender='$gender' WHERE id=$id";
                mysqli_query($conn,$query1);
                $query2="SELECT * FROM `trainees` WHERE id=$id";
                $data1=mysqli_query($conn,$query2);
                while($row = $data1->fetch_assoc()) {
                    $name = $row['name'];
                    $email = $row['email'];
                    $gender = $row['gender'];
                    $address = $row['address'];
                }
            }
        }
        else
        {
            $id = $_GET['id'];
            echo $id;
            $query2="SELECT * FROM `trainees` WHERE id=$id";
            $data2=mysqli_query($conn,$query2);
            while($row2 = $data2->fetch_assoc()) {
                $id = $row2['id'];
                $name = $row2['name'];
                $email = $row2['email'];
                $gender = $row2['gender'];
                $address = $row2['address'];
            }
        }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        Name: 
        <input type="text" name="name" value="<?php echo $name ?>"><br>
        <!-- <span><?php echo $nameErr; ?></span><br> -->
        E-mail: 
        <input type="text" name="email" value="<?php echo $email; ?>"><br>
        <!-- span><?php echo $emailErr; ?></span><br> -->
        Address:
        <textarea name="address" rows="4" cols="50"><?php echo $address; ?></textarea><br><br>
        Gender:
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other
        <br><input type="submit" value="Update">
        <?php
        $name = $email = $gender = $address = "";
        ?>
    </form>
</body>
</html>