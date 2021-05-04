<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
        .warning {
            color: #ff0000;
        }
    </style>
</head>

<body>
    <?php
    $error_nama = "";
    $error_email = "";
    $error_web = "";
    $error_pesan = "";
    $error_telp = "";

    $nama = "";
    $email = "";
    $web = "";
    $pesan = "";
    $telp = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nama"])) {
            $error_nama = "Nama tidak boleh kosong";
        } else {
            $nama = cek_input($_POST["nama"]);
            if (!preg_match("/^[a-zA-Z ]*S/", $nama)) {
                $error_nama = "Inputan Hanya boleh huruf dan spasi";
            }
        }
        if (empty($_POST["email"])) {
            $error_email = "Email tidak boleh kosong";
        } else {
            $email = cek_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error_email = "Format email Invalid";
            }
        }
        if (empty($_POST["pesan"])) {
            $error_pesan = "pesan tidak boleh kosong";
        } else {
            $pesan = cek_input($_POST["pesan"]);
        }
        if (empty($_POST["web"])) {
            $error_web = "website tidak boleh kosong";
        } else {
            $web = cek_input($_POST["web"]);
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%=~_|]/i", $web)) {
                $error_web = "URL tidak valid";
            }
        }
        if (empty($_POST["telp"])) {
            $error_telp = "telp tidak boleh kosong";
        } else {
            $telp = cek_input($_POST["telp"]);
            if (!is_numeric($telp)) {
                $error_telp = "Nomor HP hanya boleh angka";
            }
        }
    }
    function cek_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Contoh validasi form dengan php</div>
            </div>
            <div class="card-body">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                    <div class="form-group row"><label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama" id="nama" class="form-control <?php echo ($error_nama != "" ? "is-invalid" : ""); ?>" value="<?php echo $nama; ?>"><span class="warning"><?php echo $error_nama ?></span>
                        </div>
                    </div>
                    <div class="form-group row"><label for="email" class="col-sm-2 col-form-label">email</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" id="email" class="form-control <?php echo ($error_email != "" ? "is-invalid" : ""); ?>" value="<?php echo $email; ?>"><span class="warning"><?php echo $error_email ?></span>
                        </div>
                    </div>
                    <div class="form-group row"><label for="web" class="col-sm-2 col-form-label">web</label>
                        <div class="col-sm-10">
                            <input type="text" name="web" id="web" class="form-control <?php echo ($error_web != "" ? "is-invalid" : ""); ?>" value="<?php echo $web; ?>"><span class="warning"><?php echo $error_web ?></span>
                        </div>
                    </div>
                    <div class="form-group row"><label for="telp" class="col-sm-2 col-form-label">telp</label>
                        <div class="col-sm-10">
                            <input type="text" name="telp" id="telp" class="form-control <?php echo ($error_telp != "" ? "is-invalid" : ""); ?>" value="<?php echo $telp; ?>"><span class="warning"><?php echo $error_telp ?></span>
                        </div>
                    </div>
                    <div class="form-group row"><label for="pesan" class="col-sm-2 col-form-label">pesan</label>
                        <div class="col-sm-10">
                            <input type="text" name="pesan" id="pesan" class="form-control <?php echo ($error_pesan != "" ? "is-invalid" : ""); ?>" value="<?php echo $pesan; ?>"><span class="warning"><?php echo $error_pesan ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10"><button type="submit" class="btn btn-primary">Sign in</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    echo "<h2>Your Input:</h2>";
    echo "Nama = " . $nama;
    echo "<br>";
    echo "email = " . $email;
    echo "<br>";
    echo "website = " . $web;
    echo "<br>";
    echo "telp = " . $telp;
    echo "<br>";
    echo "pesan = " . $pesan;
    ?>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>