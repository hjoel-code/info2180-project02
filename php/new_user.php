<link rel="stylesheet" href="./php/css/new_user.css">
    
    <h1 class="page-title">New User</h1>
    <form id="new-user-form" method="post" action="#">
    
            <label for="firstname">Firstname</label>
            <input name= "firstname" type="text" id="fname"/>
    
            <label for="lastname">Lastname</label>
            <input name = "lastname" type="text" id="lname"/>
    
            <label for="password">Password</label>
            
            <div class="password-input-container">
                <input name = "password" type="password" id="pass"/>
                <button id="togglePassword"><span><i class='fa fa-eye-slash'></i></span></button>
            </div>
            
            <label for="email">Email</label>
            <input name = "email" type="email" id="email"/>

            <input type="hidden" name="content" value="new_user">

            <button type="submit" id="submit_form" value="Submit">Submit</button>
    </form>


<script src="./php/js/new_user.js"></script>