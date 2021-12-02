    <link rel="stylesheet" href="./php/css/new_user.css">
    <script src="./php/new_user.js"></script>
    <h1>New User</h1>
    <form method="post" action="#" onsubmit="return validateform();">
    
        <div class = "labels">
            <label for="firstname">Firstname</label><br/>
            <input name= "firstname" type="text" id="fname"/><br/> 
    
            <label for="lastname">Lastname</label><br/>
            <input name = "lastname" type="text" id="lname"/><br/>
    
            <label for="password">Password</label><br/>
            <input name = "password" type="password" id="pass"/><br/> 

            <label for="email">Email</label><br/>
            <input name = "email" type="email" id="email"/><br/>

            <input type="hidden" name="content" value="new_user">

            <input type="submit" id="submit_form" value="Submit" />

        </div>
    </form>

