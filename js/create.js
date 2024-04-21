function valid() {
  var result = true;
  var name = document.getElementById("fname");
  var Email = document.getElementById("Email");
  var phone = document.getElementById("phone");

  if (name.value.length == 0) {
    alert("Please enter your name!");
    result = false;
    return result;
  }
  if (Email.value.length == 0) {
    alert("Please enter your Email!");
    result = false;
    return result;
  }
  if (phone.value.length == 0) {
    alert("Please enter your Phone Number!");
    result = false;
    return result;
  }

  //email validation
  var atindex = Email.value.indexOf("@");
  var dotindex = Email.value.lastIndexOf(".");
  if (atindex < 1 || dotindex > Email.length - 2 || dotindex - atindex < 3) {
    alert("Enter valid Email address!");
    result = false;
    return result;
  }

  //phone num validation
  if (phone.value == NaN || phone.value.length != 10) {
    alert("Enter valid Mobile Number!");
    result = false;
    return result;
  }
  return result;
}
