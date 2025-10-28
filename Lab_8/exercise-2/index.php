<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email tới bạn</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional: CKEditor -->
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
        <style>
        .custom-alert {
            position: fixed;
            bottom: 20px;
            right: 20px;
            min-width: 300px;
            z-index: 1055;
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .custom-alert.show {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body class="bg-light">
    <?php if (isset($_GET['status'])): ?>
        <div id="alertBox" 
             class="custom-alert alert 
             <?php echo $_GET['status'] === 'success' ? 'alert-success' : 'alert-danger'; ?>">
            <?php echo $_GET['status'] === 'success' 
                ? '✅ Gửi email thành công!' 
                : '❌ Gửi email thất bại!'; ?>
        </div>
    <?php endif; ?>

    <div class="container mt-5">
        <div class="card shadow-sm mx-auto" style="max-width: 600px;">
            <div class="card-body">
                <h3 class="text-center mb-4 fw-bold">Email tới bạn</h3>
                
                <form action="mail.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                    </div>

                    <div class="mb-3">
                        <label for="tieude" class="form-label">Subject</label>
                        <input type="text" id="tieude" name="tieude" class="form-control" placeholder="Tiêu đề" required>
                    </div>

                    <div class="mb-3">
                        <label for="editor" class="form-label">Nội dung</label>
                        <textarea id="editor" name="content" class="form-control" rows="6" placeholder="Nhập nội dung..."></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="file" class="form-label">File đính kèm</label>
                        <input type="file" id="file" name="file" class="form-control">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-4">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        CKEDITOR.replace('editor'); // Kích hoạt trình soạn thảo

        // Hiển thị alert trượt lên + tự ẩn sau 3s
        const alertBox = document.getElementById('alertBox');
        if (alertBox) {
            setTimeout(() => alertBox.classList.add('show'), 100); // trễ nhẹ để animation mượt
            setTimeout(() => {
                alertBox.classList.remove('show');
                setTimeout(() => alertBox.remove(), 500); // xóa khỏi DOM sau khi ẩn
            }, 3500);
        }
    </script>
</body>
</html>