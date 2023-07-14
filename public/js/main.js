  // window.addEventListener("DOMContentLoaded",function(){
  //   const password = document.getElementById("password");
  //   const HiddenButton = document.getElementById("hidden-password");
  
  //   HiddenButton.addEventListener("click", function () {
  //     if (password.type === "password") {
  //       password.type = "text";
  //       HiddenButton.innerHTML = '<i class="fa fa-eye"></i>';
  //     } else {
  //       password.type = "password";
  //       HiddenButton.innerHTML = '<i class="fa fa-eye-slash"></i>';
  //     }
  //   });
  // })


  console.log("dqwdqwqw");



function checkFormRegister() {
  var CheckEmail = /^\w+@[a-zA-Z]{3,}\.com$/i;
  var CheckPhone = /0\d{9,10}/;

  var email = document.getElementById("email");
  var phone = document.getElementById("phone");
  var address = document.getElementById("address");
  var fullname = document.getElementById("fullname");
  var password = document.getElementById("password");
  var passwordcheck = document.getElementById("passwordcheck");

  var msgErrorPass = document.getElementById("msg-error-pass");
  var msgErrorphone = document.getElementById("msg-error-phone");
  var msgErrorEmail = document.getElementById("msg-error-email");
  var msgErrorRePass = document.getElementById("msg-error-re-pass");
  var msgErroraddress = document.getElementById("msg-error-address");
  var msgErrorFullname = document.getElementById("msg-error-fullname");
  var msgErrorPassSame1 = document.getElementById("msg-error-re-pass-same-1");
  var msgErrorPassSame2 = document.getElementById("msg-error-re-pass-same-2");

  // Check email
  if (email.value != "") {
    if (!CheckEmail.test(email.value)) {
      msgErrorEmail.innerHTML =
        "<img class='h-[10px] w-[10px] mr-1' src='./public/images/logo/1200px-Nuvola_apps_error.svg.png'> Nhập sai định dạng email";
      email.focus();
      return false;
    } else {
      msgErrorEmail.innerHTML = "";
      email.focus();
    }
  } else {
    msgErrorEmail.innerHTML =
      "<img class='h-[10px] w-[10px] mr-1' src='./public/images/logo/1200px-Nuvola_apps_error.svg.png'> Nhập email";
    userName.focus();
    return false;
  }

  // Check họ và tên
  if (fullname.value != "") {
    if (fullname.value.length < 3) {
      msgErrorFullname.innerHTML =
        "<img class='h-[10px] w-[10px] mr-1' src='./public/images/logo/1200px-Nuvola_apps_error.svg.png'> Nhập họ và tên lớn hơn 3 kí tự";
      fullname.focus();
      return false;
    } else {
      msgErrorFullname.innerHTML = "";
      fullname.focus();
    }
  } else {
    msgErrorFullname.innerHTML =
      "<img class='h-[10px] w-[10px] mr-1' src='./public/images/logo/1200px-Nuvola_apps_error.svg.png'> Nhập họ và tên";
    fullname.focus();
    return false;
  }

  // Check mật khẩu
  if (password.value != "") {
    if (password.value.length < 3) {
      msgErrorPass.innerHTML =
        "<img class='h-[10px] w-[10px] mr-1' src='./public/images/logo/1200px-Nuvola_apps_error.svg.png'> Nhập mật khẩu lớn hơn 3 kí tự";
      password.focus();
      return false;
    } else {
      msgErrorPass.innerHTML = "";
      password.focus();
    }
  } else {
    msgErrorPass.innerHTML =
      "<img class='h-[10px] w-[10px] mr-1' src='./public/images/logo/1200px-Nuvola_apps_error.svg.png'> Nhập mật khẩu";
    password.focus();
    return false;
  }

  // Check nhập lại mật khẩu
  if (passwordcheck.value != "") {
    if (password.value != passwordcheck.value) {
      msgErrorRePass.innerHTML = "";
      msgErrorPassSame1.innerHTML =
        "<img class='h-[10px] w-[10px] mr-1' src='./public/images/logo/1200px-Nuvola_apps_error.svg.png'> Mật khẩu không trùng khớp";
      msgErrorPassSame2.innerHTML =
        "<img class='h-[10px] w-[10px] mr-1' src='./public/images/logo/1200px-Nuvola_apps_error.svg.png'> Mật khẩu không trùng khớp";
      passwordcheck.focus();
      return false;
    } else {
      msgErrorPassSame1.innerHTML = "";
      msgErrorPassSame2.innerHTML = "";
      passwordcheck.focus();
    }
  } else {
    msgErrorRePass.innerHTML =
      "<img class='h-[10px] w-[10px] mr-1' src='./public/images/logo/1200px-Nuvola_apps_error.svg.png'> Nhập lại mật khẩu";
    passwordcheck.focus();
    return false;
  }

  // Check số điện thoại
  if (phone.value != "") {
    if (phone.value.length < 3) {
      msgErrorphone.innerHTML =
        "<img class='h-[10px] w-[10px] mr-1' src='./public/images/logo/1200px-Nuvola_apps_error.svg.png'> Nhập số điện thoại lớn hơn 3 kí tự";
      phone.focus();
      return false;
    } else {
      msgErrorphone.innerHTML = "";
      phone.focus();
    }
  } else {
    msgErrorphone.innerHTML =
      "<img class='h-[10px] w-[10px] mr-1' src='./public/images/logo/1200px-Nuvola_apps_error.svg.png'> Nhập số điện thoại";
    phone.focus();
    return false;
  }

  // Check địa chỉ
  if (address.value != "") {
    if (address.value.length < 3) {
      msgErroraddress.innerHTML =
        "<img class='h-[10px] w-[10px] mr-1' src='./public/images/logo/1200px-Nuvola_apps_error.svg.png'> Nhập địa chỉ lớn hơn 3 kí tự";
      address.focus();
      return false;
    } else {
      msgErroraddress.innerHTML = "";
      address.focus();
    }
  } else {
    msgErroraddress.innerHTML =
      "<img class='h-[10px] w-[10px] mr-1' src='./public/images/logo/1200px-Nuvola_apps_error.svg.png'> Nhập địa chỉ";
    address.focus();
    return false;
  }
}

function checkFormLogin() {
  var CheckEmail = /^\w+@[a-zA-Z]{3,}\.com$/i;

  var email = document.getElementById("email");
  var password = document.getElementById("password");

  var msgErrorEmail = document.getElementById("msg-error-email");
  var msgErrorPass = document.getElementById("msg-error-pass");

  if (email.value != "") {
    if (!CheckEmail.test(email.value)) {
      msgErrorEmail.innerHTML =
        "<img class='h-[10px] w-[10px] mr-1' src='./public/images/logo/1200px-Nuvola_apps_error.svg.png'> Nhập sai định dạng email";
      email.focus();
      return false;
    } else {
      msgErrorEmail.innerHTML = "";
      email.focus();
    }
    msgErrorEmail.innerHTML = "";
    email.focus();
  } else {
    msgErrorEmail.innerHTML =
      "<img class='h-[10px] w-[10px] mr-1' src='./public/images/logo/1200px-Nuvola_apps_error.svg.png'> Nhập email";
    email.focus();
    return false;
  }

  if (password.value != "") {
    if (password.value.length < 3) {
      msgErrorPass.innerHTML =
        "<img class='h-[10px] w-[10px] mr-1' src='./public/images/logo/1200px-Nuvola_apps_error.svg.png'> Nhập mật khẩu lớn hơn 3 kí tự";
      password.focus();
      return false;
    } else {
      msgErrorPass.innerHTML = "";
      password.focus();
    }
  } else {
    msgErrorPass.innerHTML =
      "<img class='h-[10px] w-[10px] mr-1' src='./public/images/logo/1200px-Nuvola_apps_error.svg.png'> Nhập mật khẩu";
    password.focus();
    return false;
  }
}

function checkFormInfor() {
  var CheckEmail = /^\w+@[a-zA-Z]{3,}\.com$/i;
  var CheckPhone = /^\d{3}[-\s]?\d{3}[-\s]?\d{4}$/;

  var fullname = document.getElementById("fullname");
  var phone = document.getElementById("phone");
  var email = document.getElementById("email");
  var address = document.getElementById("address");

  var msgErrorFullname = document.getElementById("msg-error-fullname");
  var msgErrorPhone = document.getElementById("msg-error-phone");
  var msgErrorEmail = document.getElementById("msg-error-email");
  var msgErrorAddress = document.getElementById("msg-error-address");

  if (fullname.value != "") {
    if (fullname.value.length < 3) {
      msgErrorFullname.innerHTML =
        "<img class='h-[10px] w-[10px] mr-1' src='./public/images/logo/1200px-Nuvola_apps_error.svg.png'> Nhập họ và tên lớn hơn 3 kí tự";
      fullname.focus();
      return false;
    } else {
      msgErrorFullname.innerHTML = "";
      fullname.focus();
    }
  } else {
    msgErrorFullname.innerHTML =
      "<img class='h-[10px] w-[10px] mr-1' src='./public/images/logo/1200px-Nuvola_apps_error.svg.png'> Nhập họ và tên";
    fullname.focus();
    return false;
  }

  if (phone.value != "") {
    if (!CheckPhone.test(phone.value)) {
      msgErrorPhone.innerHTML =
        "<img class='h-[10px] w-[10px] mr-1' src='./public/images/logo/1200px-Nuvola_apps_error.svg.png'> Nhập dạng đúng số điện thoại";
      phone.focus();
      return false;
    } else {
      msgErrorPhone.innerHTML = "";
      phone.focus();
    }
  } else {
    msgErrorPhone.innerHTML =
      "<img class='h-[10px] w-[10px] mr-1' src='./public/images/logo/1200px-Nuvola_apps_error.svg.png'> Nhập só điện thoại";
    phone.focus();
    return false;
  }

  if (email.value != "") {
    if (!CheckEmail.test(email.value)) {
      msgErrorEmail.innerHTML =
        "<img class='h-[10px] w-[10px] mr-1' src='./public/images/logo/1200px-Nuvola_apps_error.svg.png'> Nhập sai định dạng email";
      email.focus();
      return false;
    } else {
      msgErrorEmail.innerHTML = "";
      email.focus();
    }
    msgErrorEmail.innerHTML = "";
    email.focus();
  } else {
    msgErrorEmail.innerHTML =
      "<img class='h-[10px] w-[10px] mr-1' src='./public/images/logo/1200px-Nuvola_apps_error.svg.png'> Nhập email";
    email.focus();
    return false;
  }

  if (address.value != "") {
    if (address.value.length < 3) {
      msgErrorAddress.innerHTML =
        "<img class='h-[10px] w-[10px] mr-1' src='./public/images/logo/1200px-Nuvola_apps_error.svg.png'> Nhập địa chỉ lớn hơn 3 kí tự";
      address.focus();
      return false;
    } else {
      msgErrorAddress.innerHTML = "";
      address.focus();
    }
  } else {
    msgErrorAddress.innerHTML =
      "<img class='h-[10px] w-[10px] mr-1' src='./public/images/logo/1200px-Nuvola_apps_error.svg.png'> Nhập địa chỉ";
    address.focus();
    return false;
  }
}
