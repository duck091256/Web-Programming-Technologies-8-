<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thể loại thêm</title>
    <style>
        form {
            width: 60vh;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
        }
        .table-left {
            width: 40vh;
            text-align: right;
        }
    </style>
</head>
<body>
    <form action="theloai_them_xl.php" method="post" enctype="multipart/form-data" name="form1">
        <table>
            <tr>
                <td class="table-left">Ten The Loai</td>
                <td><input type="text" name="TenTL" value=""></td>
            </tr>
            <tr>
                <td class="table-left">Thu Tu</td>
                <td><input type="text" name="ThuTu" value=""></td>
            </tr>
            <tr>
                <td class="table-left">An Hien</td>
                <td>
                    <select name="An Hien">
                    <option value="0">An</option>
                    <option value="1">Hien</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="table-left">icon</td>
                <td><input type="file" name="image" id="anh"/></td>
            </tr>
            <tr>
                <td class="table-left">
                    <input type="submit" name="Them" value="Them" />
                </td>
                <td>
                    <input type="reset" name="Huy" value="Huy" />
                </td>
            </tr>
        </table>
    </form>
</body>
</html>