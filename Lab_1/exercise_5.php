<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giải phương trình bậc 2</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 20px auto;
            font-family: Arial, sans-serif;
        }
        td {
            padding: 10px;
        }
        input[type="text"] {
            width: 60px;
            text-align: center;
        }
        input[type="submit"] {
            padding: 8px 20px;
            background-color: #336699;
            border: none;
            color: white;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
        }
        input[type="submit"]:hover {
            background-color: #224466;
        }
        .title {
            background-color: #336699;
            color: white;
            text-align: center;
            font-weight: bold;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <?php
    $result = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = (float)$_POST["a"];
        $b = (float)$_POST["b"];
        $c = (float)$_POST["c"];

        if ($a == 0) {
            if ($b == 0) {
                $result = ($c == 0) ? "Phương trình có vô số nghiệm" : "Phương trình vô nghiệm";
            } else {
                $x = -$c / $b;
                $result = "Phương trình bậc nhất, nghiệm: x = $x";
            }
        } else {
            $delta = $b * $b - 4 * $a * $c;
            if ($delta < 0) {
                $result = "Phương trình vô nghiệm";
            } elseif ($delta == 0) {
                $x = -$b / (2 * $a);
                $result = "Nghiệm kép: x1 = x2 = $x";
            } else {
                $x1 = (-$b + sqrt($delta)) / (2 * $a);
                $x2 = (-$b - sqrt($delta)) / (2 * $a);
                $result = "x1 = $x1 ; x2 = $x2";
            }
        }
    }
    ?>

    <form   method="post">
        <table border="1" width="600">
            <tr>
                <td colspan="4" class="title">Giải phương trình bậc 2</td>
            </tr>
            <tr>
                <td>Phương trình</td>
                <td>
                    <input type="text" name="a" value="<?php if(isset($_POST['a'])) echo $_POST['a']; ?>"> X² +
                </td>
                <td>
                    <input type="text" name="b" value="<?php if(isset($_POST['b'])) echo $_POST['b']; ?>"> X +
                </td>
                <td>
                    <input type="text" name="c" value="<?php if(isset($_POST['c'])) echo $_POST['c']; ?>"> = 0
                </td>
            </tr>
            <tr>
                <td>Nghiệm</td>
                <td colspan="3">
                    <input type="text" name="ketqua" value="<?php echo $result; ?>" style="width:95%">
                </td>
            </tr>
            <tr>
                <td colspan="4" align="center">
                    <input type="submit" value="Giải">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>