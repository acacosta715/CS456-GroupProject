function validateForm(event)
{
  var user = document.getElementById("user");
  var pass1 = document.getElementById("newPassword");
  var pass2 = document.getElementById("confirmNewPassword");

  var msg1 = document.getElementById("msg1");
  var msg2 = document.getElementById("msg2");
  var msg3 = document.getElementById("msg3");

  if(user.value.length == 0)
  {
    msg1.innerHTML = "Username field cannot be empty.";
    event.preventDefault();
  }
  if(pass1.value.length == 0)
  {
    msg2.innerHTML = "Password field cannot be empty.";
    event.preventDefault();
  }
  if(pass2.value.length == 0)
  {
    msg3.innerHTML = "Confirm Password field cannot be empty.";
    event.preventDefault();
  }
}
