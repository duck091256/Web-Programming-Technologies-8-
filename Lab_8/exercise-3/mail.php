<?php
require "../PHPMailer-master/src/PHPMailer.php";  
require "../PHPMailer-master/src/SMTP.php"; 
require "../PHPMailer-master/src/Exception.php"; 

if (isset($_POST)) {
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    try {
        // $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->CharSet = "utf-8";
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;

        // --- Cấu hình thông tin tài khoản Gmail ---
        $nguoigui = 'ductran091256@gmail.com';
        $matkhau = 'bsur vqle rebf ozgv'; // app password Gmail
        $tennguoigui = 'Trần Thanh Đức';
        $mail->Username = $nguoigui;
        $mail->Password = $matkhau;
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom($nguoigui, $tennguoigui);

        // --- Xử lý nhiều email (từ Tagify) ---
        // Tagify gửi dữ liệu JSON như: [{"value":"abc@gmail.com"},{"value":"xyz@gmail.com"}]
        $emailList = json_decode($_POST['email'], true);
        if (is_array($emailList)) {
            foreach ($emailList as $emailData) {
                $mail->addAddress(trim($emailData['value']), "Người nhận");
            }
        } else {
            // fallback nếu người dùng chỉ nhập 1 email thường
            $mail->addAddress(trim($_POST['email']), "Người nhận");
        }

        // --- Nội dung email ---
        $tieude = $_POST['tieude'];
        $noidungthu = '
        <div style="font-family: Arial; padding: 10px;">
            <h3>Xin chào bạn,</h3>
            <p>' . nl2br($_POST['content']) . '</p>
        </div>';
        $mail->isHTML(true);
        $mail->Subject = $tieude;
        $mail->Body = $noidungthu;

        // --- Xử lý file đính kèm ---
        if (!empty($_FILES['file']['name'])) {
            $uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['file']['name']));
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $mail->addAttachment($uploadfile, $_FILES['file']['name']);
            }
        }

        // --- Kết nối an toàn ---
        $mail->smtpConnect([
            "ssl" => [
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            ]
        ]);

        // --- Gửi và thông báo ---
        if ($mail->send()) {
            header("Location:index.php?status=success");
        } else {
            header("Location:index.php?status=error");
        }
        exit;
    } catch (Exception $e) {
        header("Location:index.php?status=error");
        exit;
    }
}
?>