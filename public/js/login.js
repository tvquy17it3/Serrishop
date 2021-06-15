function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function validate(){
    var email = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    const $result = $("#result");
    if (email==="" || password==="") {
        $result.text("Vui lòng nhập đầy đủ email và mật khẩu!");
        $result.css("color", "red");
    }else{

          if (validateEmail(email)) {
              // $result.css("color", "green");
              var isAdmin = email == "admin@gmail.com" && password =="123456";
              var isUser = email == "thuthang@gmail.com" && password =="123456";
              var isMatched = isAdmin || isUser;
              if (isMatched){
                // setCookie("email",email,30);
                setCookie("email", email, 30);
                // alert ("Đăng nhập thành công");
                // window.location = "index.html";
                location.reload();
                return false;
              }
              else{
                  $result.text("Sai email hoặc mật khẩu!");
                  $result.css("color", "red");
              }
          } else {
              $result.text("Email không đúng định dạng!");
              $result.css("color", "red");
          }
  }
}

function setCookie(cname,cvalue,exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires=" + d.toGMTString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function checkCookie() {
  var user=getCookie("email");
  console.log(user);
  if (user != "") {
    $("#checkLogin1").hide();
    $("#checkLogin2").hide();
    $("#checkEmail2").show();
    $("#checkEmail1").show();
    $("#checkEmail1").text(user);
    // alert("Welcome again " + user);
  } else {
    $("#checkEmail2").hide();
    $("#checkEmail1").hide();
    $("#checkLogin1").show();
    $("#checkLogin2").show();
  }
}
function delete_cookie() {
  document.cookie = 'email' +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
  location.reload();
  return false;
}

