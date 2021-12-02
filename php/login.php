<link rel="stylesheet" href="./php/css/login.css">

<h1>Login</h1>

<form action="" id="login-form">
    <input id="email" type="email" name="email" placeholder="Email">
    <div class="password-input-container">
        <input id="password" type="password" name="password" placeholder="Password">
        <button id="togglePassword"><span><i class='fa fa-eye-slash'></i></span></button>
    </div>
    <input type="hidden" name="content" value="login">
    <div id= "double"></div>

    <button type="submit" id="login-btn">Sign In</button>
</form>



<script src="./php/js/login.js"></script>