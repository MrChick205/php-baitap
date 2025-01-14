<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/buoi-2/baitap/diem.css">
    <title>Bảng Điểm</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}

h1 {
    text-align: center;
    color: #333;
}

form {
    background: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    margin: auto;
}

#input {
    margin-bottom: 15px;
}

#input span {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
select {
    width: calc(100% - 20px); 
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

input[type="text"]:disabled {
    background-color: #e9ecef;
}

input[type="submit"],
input[type="reset"] {
    background-color: #28a745; 
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    margin-top: 10px;
}

input[type="submit"]:hover {
    background-color: #218838;
}

input[type="reset"] {
    background-color: #dc3545; 
}

input[type="reset"]:hover {
    background-color: #c82333; 
}

@media (max-width: 600px) {
    form {
        padding: 15px;
    }

    input[type="text"],
    select {
        font-size: 14px;
    }

    input[type="submit"],
    input[type="reset"] {
        width: 100%;
        margin-top: 5px;
    }
}
    </style>
</head>
<body>
    <?php
    $s1 = "";
    $s2 = "";
    $tong = "";
    $yr = 1;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $s1 = isset($_POST['inputs1']) ? (float)$_POST['inputs1'] : 0;
        $s2 = isset($_POST['inputs2']) ? (float)$_POST['inputs2'] : 0;
        $yr = isset($_POST['year']) ? (int)$_POST['year'] : 1;

        function tinhdiem($a, $b, $yr) {
            if ($yr == 1) {
                return ($a + $b) / 2;
            } else {
                return ($a + ($b * 2)) / 3;
            }
        }
        $tong = tinhdiem($s1, $s2, $yr);
    }
    ?>

    <form action="tinhtong.php" method="post">
        <h1>BẢNG ĐIỂM CỦA EM</h1>
        <div id="input">
            <span>Semester 1:</span>
            <input type="text" name="inputs1" id="text1" size="40px" value="<?php echo $s1; ?>" required>
        </div>
        <div id="input">
            <span>Semester 2:</span>
            <input type="text" name="inputs2" id="text2" size="40px" value="<?php echo $s2; ?>" required>
        </div>
        <div id="input">
            <div id="horizontal">
                <div class="row">
                    <div class="col-sm-2">
                        <span>Year:</span>
                    </div>
                    <div class="col-sm-2">
                        <select style="width: 50px; color: red" id="select" name="year">
                            <option value="1" <?php echo ($yr == 1) ? 'selected' : ''; ?>>1</option>
                            <option value="2" <?php echo ($yr == 2) ? 'selected' : ''; ?>>2</option>
                        </select>
                    </div>
                    <div class="col-sm-8"></div>
                </div>
            </div>
        </div>
        <div id="input">
            <div id="form-horizontal">
                <div class="row">
                    <div class="col-sm-2">
                        <span>Summarizes:</span>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" name="result" id="result" size="40px" value="<?php echo $tong; ?>" disabled>
                    </div>
                </div>
            </div>
        </div>
        <div class="input">
            <div id="form-horizontal">
                <div class="row">
                    <div class="col-sm-10">
                        <p id="display"></p>
                    </div>
                </div>
            </div>
        </div>
        <div id="form-horizontal">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-2">
                    <input type="submit" name="ok" id="ok" value="OK">
                </div>
                <div class="col-sm-2">
                    <input type="button" onclick=reset() name="cancel" id="cancel" value="Cancel">
                </div>
            </div>
        </div>
    </form>
    <script>
        function reset() {
            document.getElementById("text1").value = "";
            document.getElementById("text2").value = "";
            document.getElementById("select").selectedIndex = 0; 
            document.getElementById("result").value = ""; 
        }
    </script>
</body>
</html>