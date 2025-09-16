<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $error = "";
    $tong = $tich = $tong_chan = $tong_le = null;

    if (isset($_POST["so_dau"]) && isset($_POST["so_cuoi"])) {
        $so_dau = (int)$_POST["so_dau"];
        $so_cuoi = (int)$_POST["so_cuoi"];

        if ($so_dau > $so_cuoi) {
            $error = "Lỗi: Số bắt đầu phải nhỏ hơn hoặc bằng số kết thúc.";
        } else {
            $tong = 0;
            $tich = 1;
            $tong_chan = 0;
            $tong_le = 0;

            for ($i = $so_dau; $i <= $so_cuoi; $i++) {
                $tong += $i;
                $tich *= $i;
                if ($i % 2 == 0) {
                    $tong_chan += $i;
                } else {
                    $tong_le += $i;
                }
            }
        }
    }
    ?>

    <form method="post">
        <table width="728" border="1">
            <tr>
                <td width="122">&nbsp;</td>
                <td width="76">Số bắt đầu</td>
                <td width="169">
                    <input type="text" name="so_dau" value="<?php if (isset($_POST['so_dau'])) echo $_POST['so_dau']; ?>" />
                </td>
                <td width="152">Số kết thúc</td>
                <td width="175">
                    <input type="text" name="so_cuoi" value="<?php if (isset($_POST['so_cuoi'])) echo $_POST['so_cuoi']; ?>" />
                </td>
            </tr>

            <?php if ($error != ""): ?>
                <tr>
                    <td colspan="5" style="color: red; font-weight: bold;">
                        <?php echo $error; ?>
                    </td>
                </tr>
            <?php endif; ?>

            <?php if ($error == "" && $tong !== null): ?>
                <tr>
                    <td colspan="5">Kết quả</td>
                </tr>
                <tr>
                    <td>Tổng các số</td>
                    <td colspan="4">
                        <input type="text" name="tong" value="<?php echo $tong; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Tích các số</td>
                    <td colspan="4">
                        <input type="text" name="tich" value="<?php echo $tich; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Tổng các số chẵn</td>
                    <td colspan="4">
                        <input type="text" name="tong_chan" value="<?php echo $tong_chan; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Tổng các số lẻ</td>
                    <td colspan="4">
                        <input type="text" name="tong_le" value="<?php echo $tong_le; ?>" />
                    </td>
                </tr>
            <?php endif; ?>

            <tr>
                <td colspan="5">
                    <input type="submit" name="button" value="Tính toán" />
                </td>
            </tr>
        </table>
    </form>
</body>
</html>