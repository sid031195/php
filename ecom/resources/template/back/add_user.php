<div class="row">
  
  <div class="col-md-12">
<form action="" method="POST">
  <div class="container">
    <?php add_user(); ?>
   <h4 class="bg-success"> <?php display_msg(); ?></h4>
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    
    
    <label for="username"><b>username</b></label>
    <input type="text" placeholder="Enter Last Name" name="username" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" name="add_user" class="btn btn-success">Add User</button>
    <button type="submit" class="btn btn-danger">Delete User</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div>
</form>
</div>
</div>

