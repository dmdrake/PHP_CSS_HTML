
<script>function checkPass()
 {
  var pass1 = document.getElementById('password');
  var pass2 = document.getElementById('password2');
  var message = document.getElementById('confirmMessage');
  var badColor = "#ff6666";
  var goodColor = "#66cc66";
  if(pass1.value == pass2.value){
   pass2.style.backgroundColor = goodColor;
   message.style.color = goodColor;
   message.innerHTML = "Passwords Match!"
   document.getElementById("submit").disabled = false;
  }else{
   pass2.style.backgroundColor = badColor;
   message.style.color = badColor;
   message.innerHTML = "Passwords Do Not Match!"
   document.getElementById("submit").disabled = true;

  }
 }</script>
<form action="<?php echo BASE_URL?>register/add" method="post" required>

 <fieldset>
 <legend>Register Today!</legend>
 <label for="first_name">First Name: <font color="#FF0000">*</font></label>
 <input type="text" id="first_name" name="first_name" value="" maxlength="20" required />
 <br />

 <label for="last_name">Last Name: <font color="#FF0000">*</font></label>
 <input type="text" class="txt" id="last_name" name="last_name" value="" maxlength="20" required />
 <br />

 <label for="email">E-mail Address: <font color="#FF0000">*</font></label>
 <input type="text" class="txt" id="email" name="email" value="" maxlength="100" required/>
 <br />

 <label for="password">Password: <font color="#FF0000">*</font></label>
 <input type="password" class="txt" id="password" name="password" value="" maxlength="100" required/>

 <br />

 <label for="password2">Retype Password: <font color="#FF0000">*</font></label>
 <input type="password" class="txt" id="password2" name="password2" value="" maxlength="100" required onkeyup="checkPass(); return false;"/>
 <span id="confirmMessage" class="confirmMessage"></span>
 <br />

 <input type="hidden" name="uID" value=""/>
 <input type="hidden" name="active" value="0"/>
 <button id="submit" type="submit" class="btn btn-primary" disabled>Sign Up</button>
 </fieldset>
 </form>
