<!DOCTYPE html>
<head>
    <title>Task</title>
</head>
<body>
    <?php
        class calculator {
            function add($num1,$num2){
                return $num1 + $num2;
            }
            function subtract($num1,$num2){
                return $num1 - $num2;
            }
            function multiply($num1,$num2){
                return $num1 * $num2;
            }
            function divide($num1,$num2){
                return $num1 / $num2;
            }
        }
        $obj = new calculator();
        $result=$firstNumber=$secondNumber="";
        try{
            if(!empty($_POST['firstNumber']) || !empty($_POST['secondNumber'])){
                if(isset($_POST['firstNumber']) && isset($_POST['secondNumber'])){
                    $firstNumber=number_format($_POST['firstNumber']);
                    $secondNumber=number_format($_POST['secondNumber']);
                }
                if(isset($_POST['add'])){
                    $result = $obj->add($firstNumber,$secondNumber);
                }
                if(isset($_POST['subtract'])){
                    $result = $obj->subtract($firstNumber,$secondNumber);
                }
                if(isset($_POST['multiply'])){
                    $result = $obj->multiply($firstNumber,$secondNumber);
                }
                if(isset($_POST['divide'])){
                    $result = $obj->divide($firstNumber,$secondNumber);
                }
            }
        }
        catch(Exception $e) {
            echo "<span>$e->getMessage()</span>";
        }
        
        
    ?>
    <h1>Simple Calculator</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        Enter First Number:
        <input type="text" name="firstNumber" value="<?php echo $firstNumber; ?>"><br><br>
        Enter Second Number:
        <input type="text" name="secondNumber" value="<?php echo $secondNumber; ?>"><br><br>
        <button name="add">+</button>
        <button name="subtract">-</button>
        <button name="multiply">*</button>
        <button name="divide">/</button><br><br>
        Result: <input type="text" name="result" value="<?php echo $result; ?>">
    </form>
</body>
</html>