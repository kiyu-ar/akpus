<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Akpus UPT Perpustakaan UNS</title>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="login-page">
  <div class="form">
    <form class="login-form" method="post" action="<?php echo base_url().'user/proses_login'; ?>">
      <input type="text" name="uname" placeholder="username">
      <input type="password" name="pass" placeholder="password">
      <button type="submit">login</button>
      <p class="message">Untuk membuat akun, hubungi bagian IT UPT Perpustakaan</p>
    </form>
    <form action="<?= base_url()?>"><button type="submit" class="back" style="margin-top:30px">Kembali ke Website</button></form>
  </div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="<?php echo base_url() ?>assets/scripts/script.js"></script>

</body>
</html>
