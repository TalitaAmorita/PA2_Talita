<!DOCTYPE html>
<html>
<head>
  <title>Login Talita</title>
  <style type="text/css">
    @font-face {
  font-family: 'Lato';
  font-style: normal;
  font-weight: 400;
  src: local('Lato Regular'), local('Lato-Regular'), url(http://themes.googleusercontent.com/static/fonts/lato/v7/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
}

body {
  background: #448ed3 ;
  font-family: "Lato" ;
}
.wrap {
  width:250px;
  height: auto;
  margin: auto;
  margin-top: 10%;
}
.avatar {
  width: 100%;
  margin: auto;
  width: 65px;
  border-radius: 100px;
  height: 65px;
  background: #448ed3 ;
  position: relative;
  bottom: -15px;
}
.avatar img {
  width: 55px;
  height: 55px;
  border-radius: 100px;
  margin: auto;
  border:3px solid #fff;
  display: block;
}
.wrap input {
  border: none;
  background: #fff;
  font-family:Lato ;
  font-weight:700 ;
  display: block;
  height: 40px;
  outline: none;
  width: calc(100% - 24px) ;
  margin: auto;
  padding: 6px 12px 6px 12px;
}
.bar {
  width: 100%;
  height: 1px;
  background: #fff ;
}
.bar i {
  width: 95%;
  margin: auto;
  height: 1px ;
  display: block;
  background: #d1d1d1;
}
.wrap input[type="text"] {
  border-radius: 7px 7px 0px 0px ;
}
.wrap input[type="password"] {
  border-radius: 0px 0px 7px 7px ;
}
.forgot_link {
  color: #83afdf ;
  color: #83afdf;
  text-decoration: none;
  font-size: 11px;
  position: relative;
  left: 193px;
  top: -36px;
}
.wrap button {
  width: 100%;
  border-radius: 7px;
  background: #b6ee65;
  text-decoration: center;
  border: none;
  color: #51771a;
  margin-top:-5px;
  padding-top: 14px;
  padding-bottom: 14px;
  outline: none;
  font-size: 13px;  
  border-bottom: 3px solid #307d63;
  cursor: pointer;
}
  </style>
</head>
<body>
<div class="wrap">
  <form method="post" action="<?php echo base_url('index.php/C_login/do_login'); ?>">
    <div class="avatar">
      <img src="https://cdn.mos.cms.futurecdn.net/Tqq3BVZZAkbUyGvZmSfjQW.jpg">
    </div>
    <input type="text" name="email" placeholder="username" required>
    <div class="bar">
      <i></i>
    </div>
    <input type="password" name="password" placeholder="password" required>
    <a href="" class="forgot_link">forgot ?</a>
    <button type = 'submit'>Sign in</button>
  </form>
  </div>
</body>
</html>