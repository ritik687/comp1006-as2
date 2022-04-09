function deletingShoes(){

  // using the js confirm() function: if press OK, it will return true, for cancel return false
  return confirm('Confirming again to delete?');
} 

// toggle password input on register form
function showHidePasswordRegister() // or function showHidePassword(txt)
{
  
  let password = document.getElementById('password') // or let password = document.getElementById('txt')
  let confirmPassword =document.getElementById('confirmPassword')

  //if input type is password, change to text 
  if(password.type == 'password' || confirmPassword.type == 'password'){
   password.type = 'text';
   confirmPassword.type = 'text';
   
   }

  else {
    password.type = 'password';
    confirmPassword.type = 'password';
  }

}

// password show for login page
function showHidePasswordLogin() // or function showHidePassword(txt)
{
  
  let password = document.getElementById('password') // or let password = document.getElementById('txt')
  

  //if input type is password, change to text 
  if(password.type == 'password')
  {
   password.type = 'text';
   
  }

  else {
    password.type = 'password';
    
  }

}



// simple script to validate in javascript that the passwords are the same when the user clicks the register. Adding the click handlers.....
function comparePasswords() {
  let password = document.getElementById('password').value
  let confirmPassword = document.getElementById('confirmPassword').value

  if (password == confirmPassword) {
      return true
  }
  else {
      alert('Passwords do not match')
      return false
  }
}

