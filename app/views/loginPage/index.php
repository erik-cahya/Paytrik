<!DOCTYPE html>
<html>

<head>
    <title> <?= $data["judul"]; ?> </title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" type="text/css" href="<?= ROOT; ?>/dist/css/style.css">
</head>

<body>
    <div class="login bflex">
        <div class="llogin">
            <img src="<?= ROOT; ?>/dist/img/bg2.jpg">
        </div>
        <div class="rlogin cflex">

            <!-- Form Login -->
            <form method="POST" action="<?= ROOT ?>/login/setSession">
                <p class="error"></p>
                <p style="text-align:center;">HALAMAN LOGIN</p>
                <div class="winput">
                    <input type="text" name="username" autocomplete="off" placeholder="Masukan username . . .">
                </div>
                <div class="winput" style="margin-top: 15px">
                    <input type="password" name="password" autocomplete="off" placeholder="Masukan password . . .">

                    <div class="winput" style="margin-top: 25px;">
                        <button type="submit" name="login" style="width: 100%;"> LOGIN </button>
                    </div>
            </form>
            <!-- /. Form Login -->

        </div>
    </div>
</body>

</html>