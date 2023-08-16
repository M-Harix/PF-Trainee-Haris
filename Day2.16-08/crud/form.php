<html>
    <head>
        <style>
            .red{
                color:red;
            }
        </style>
    </head>
<body>
<?php
    require_once("conn.php");
    $nameErr = $emailErr = $addressErr = $genderErr = NULL;
    $name = $email = $gender = $address = NULL;
 
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        function test($data) {
            $data=trim($data);
            $data=stripslashes($data);
            $data=htmlspecialchars($data);
            return $data;
        }

        if(empty($_POST["name"])){
            $nameErr="Name is required";
        }
        elseif (!preg_match("/^[a-zA-Z-' ]*$/",$_POST["name"])) {
            $nameErr = "Only letters and white space allowed";
        }
        else{
            $name=test($_POST["name"]);
        }

        if(empty($_POST["email"])){
            $emailErr="Email is required";
        }
        elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
        else{
            $email=test($_POST["email"]);
        }

        if(empty($_POST["address"])){
            $addressErr="Address is required";
        }
        else{
            $address=test($_POST["address"]);
        }

        if(empty($_POST["gender"])){
            $genderErr="Gender is required";
        }
        else{
            $gender=test($_POST["gender"]);
        }

        if (isset($name) && isset($email) && isset($address) && isset($gender))
        {
            $query1 = "INSERT INTO `trainees`(`id`, `name`, `email`, `address`, `gender`, `intrest`) VALUES ('NULL','$name','$email','$address','$gender','NULL')";
            mysqli_query($conn,$query1);
            $name = $email = $gender = $address = NULL;
        }
    }
    $query2 = "SELECT * FROM `trainees` ORDER BY `id` DESC";
    $data = mysqli_query($conn,$query2);

    if(isset($_GET['delete'])){
        $id = $_GET['id'];
        $query="DELETE FROM `trainees` WHERE id=$id";
        mysqli_query($conn,$query);
    }
?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        Name: 
        <input type="text" name="name" value="<?php echo $name ?>"><br>
        <span class="red"><?php echo $nameErr; ?></span><br><br>
        E-mail: 
        <input type="text" name="email" value="<?php echo $email ?>"><br>
        <span class="red"><?php echo $emailErr; ?></span><br><br>
        Address:
        <textarea name="address" rows="4" cols="50"><?php echo $address ?></textarea><br>
        <span class="red"><?php echo $addressErr; ?></span><br><br>
        Gender:<br>
        <input type="radio" name="gender" <?php if (isset($gender) && $gender==".male.") echo "checked";?> value="male">Male
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other<br>
        <span class="red"><?php echo $genderErr; ?></span><br><br>
        <input type="submit">
    </form> 
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Gender</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($row = $data->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td>
                        <form method="GET">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button name="delete">DELETE</button>
                        </form>
                        <?php
                        echo  "<button><a href=update.php?id=".$row['id'].">Edit</a></button>";
                        ?>
                    </td>
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>