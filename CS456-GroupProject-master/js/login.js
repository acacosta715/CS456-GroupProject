function validateForm(event)
{
  var uname = document.getElementById("username");
  var pword = document.getElementById("pass");
  var msg1 = document.getElementById("msg1");
  var msg2 = document.getElementById("msg2");

  if(uname.value.length == 0)
  {
    msg1.innerHTML = "Username field cannot be empty.";
    event.preventDefault();
  }
  if(pword.value.length == 0)
  {
    msg2.innerHTML = "Pasword field cannot be empty.";
    event.preventDefault();
  }
}
