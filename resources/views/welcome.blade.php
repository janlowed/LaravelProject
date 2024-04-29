<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
    <link rel="stylesheet" href="assets/style.css">
    <script src="https://kit.fontawesome.com/c4254e24aB.js" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">
        <div class="form-box">
            <h1 id="title">Sign Up</h1>
            <form action="#">
                <div class="input-group">
                    <div class="input-field" id="nameField">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="Name">
                    </div>

                    <div class="input-field">
                        <i class="fa-solid fa-user"></i>
                        <input type="email" placeholder="Email">
                    </div>

                    <div class="input-field">
                        <i class="fa-solid fa-user"></i>
                        <input type="password" placeholder="Password">
                    </div>

                    <p>Lost Password <a href="#">Click Here!</a></p>
                </div>
                <div class="btn-field">
                    <button type="button" id="signupBtn">Sign Up</button>
                    <button type="button" id="signinBtn" class="disable">Sign In</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        
    </script>

<script>

let signupBtn = document.getElementById("signupBtn");
let signinBtn = document.getElementById("signinBtn");
let nameField = document.getElementById("nameField");
let title = document.getElementById("title");


signinBtn.onclick = function(){
    nameField.style.maxHeight = "0";
    title.innertHTML = "Sign In";
    signupBtn.classList.add("disable");
    signinBtn.classList.remove("disable");

}

signupBtn.onclick = function(){
    nameField.style.maxHeight = "60px";
    title.innertHTML = "Sign Up";
    signupBtn.classList.remove("disable");
    signinBtn.classList.add("disable");

}

</script>
</body>
</html>