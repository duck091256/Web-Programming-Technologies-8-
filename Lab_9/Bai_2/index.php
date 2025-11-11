<!doctype html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP with PHP</title>

    <style>
        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: linear-gradient(135deg, #f9f9f9, #e6f0ff);
            margin: 0;
            padding: 0;
            color: #333;
        }

        h1 {
            text-align: center;
            margin-top: 40px;
            font-size: 2em;
            color: #0052cc;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        select {
            display: block;
            margin: 30px auto;
            padding: 10px 15px;
            font-size: 16px;
            border: 2px solid #0052cc;
            border-radius: 8px;
            background-color: #fff;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        select:hover {
            box-shadow: 0 0 10px rgba(0, 82, 204, 0.3);
        }

        hr {
            width: 80%;
            margin: 20px auto;
            border: 0;
            border-top: 2px solid #ddd;
        }

        #info {
            width: 85%;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #0052cc;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f4f7ff;
        }

        tr:hover {
            background-color: #e1ebff;
            transition: background-color 0.2s;
        }

        h3 {
            text-align: center;
            color: #0052cc;
            margin-top: 0;
        }
    </style>

    <script>
        function ajax() {
            const obj = document.getElementById("info");
            obj.style.display = "block";
            const value = document.getElementById("chon").value;
            const xml = new XMLHttpRequest();

            xml.onreadystatechange = function () {
                if (xml.readyState === 4 && xml.status === 200) {
                    obj.innerHTML = xml.responseText;
                }
            }

            const url = "showTable.php?chon=" + value;
            xml.open("GET", url, true); // Gửi bất đồng bộ
            xml.send();
        }
    </script>
</head>

<body>
    <h1>OOP with PHP</h1>

    <select id="chon" onchange="ajax();">
        <option value="">-- Chọn bảng dữ liệu --</option>
        <option value="giaovien">Giáo viên</option>
        <option value="sinhvien">Sinh viên</option>
        <option value="hocphan">Học phần</option>
    </select>

    <hr>

    <div id="info" style="display:none;"></div>
</body>

</html>
