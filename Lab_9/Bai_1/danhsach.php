<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <title>Danh sách sinh viên theo lớp (AJAX)</title>

    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 40px;
            color: #333;
        }

        h3 {
            color: #0044cc;
            text-align: center;
            margin-bottom: 20px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        select {
            font-size: 14px;
            padding: 6px 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            outline: none;
            transition: 0.3s;
        }

        select:hover {
            border-color: #007bff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background-color: #fdfdfd;
            border-radius: 6px;
            overflow: hidden;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px 10px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f7faff;
        }

        tr:hover {
            background-color: #eaf3ff;
        }

        #ds {
            margin-top: 20px;
            font-size: 14px;
        }
    </style>

    <script>
        function sendajax() {
            const lop = document.getElementById("lop").value;
            const objds = document.getElementById("ds");

            const xml = new XMLHttpRequest();
            xml.onreadystatechange = function() {
                if (xml.readyState == 4 && xml.status == 200) {
                    objds.innerHTML = xml.responseText;
                }
            }
            const url = "ds.php?lop=" + encodeURIComponent(lop);
            xml.open("GET", url, true);
            xml.send();
        }

        // Hàm tự động load lớp đầu tiên khi trang mở
        function autoLoadFirstClass() {
            const select = document.getElementById("lop");
            if (select.options.length > 0) {
                select.selectedIndex = 0;
                sendajax();
            }
        }

        window.onload = autoLoadFirstClass;
    </script>
</head>

<body>
    <div class="container">
        <h3>In danh sách sinh viên theo từng lớp</h3>

        <?php
        include("inc/connect.inc");

        function initClass($conn)
        {
            $sql = "SELECT DISTINCT lop FROM sinhvien ORDER BY lop";
            $rs = mysqli_query($conn, $sql);

            echo "Chọn lớp: <select id='lop' onchange='sendajax();'>";
            while ($row = mysqli_fetch_assoc($rs)) {
                echo "<option value='" . htmlspecialchars($row['lop']) . "'>" . htmlspecialchars($row['lop']) . "</option>";
            }
            echo "</select>";
        }

        initClass($con);
        ?>

        <div id="ds">Đang tải danh sách...</div>
    </div>
</body>

</html>
