<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Janlowed</title>
    <link rel="stylesheet" href="assets/style.css">
    <script src="https://kit.fontawesome.com/c4254e24aB.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="form-box">
            <h1 id="title">Sign In</h1>
            <form action="#">
                <div class="input-group">
                    <div class="input-field">
                        <i class="fa-solid fa-user"></i>
                        <input type="email" placeholder="Email" id="email">
                    </div>

                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Password" id="password">
                    </div>

                </div>
                <div class="btn-field">
                    <button type="button" id="signinBtn">Log In</button>
                </div>
            </form>
        </div>
    </div>
<script>
document.addEventListener('DOMContentLoaded', function(){
    function sendmessage(){
        const apikey = "{{ config('services.semaphore_key.key') }}"; 
        const number = "09639623877"; 
        const message = "You logged in successfully!"; 

        const parameters = {
            apikey: apikey,
            number: number,
            message: message,
        };

        fetch('https://api.semaphore.co/api/v4/messages', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams(parameters)
        })
        .then(response => response.text())
        .then(output => {
            console.log(output);
        })
        .catch(error => {
            console.error(error);
        });
    }

    let signinBtn = document.getElementById("signinBtn");

    signinBtn.addEventListener('click', function(){
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        const postapi = `api/login`;
        
        fetch(postapi, {
            method: 'POST',
            body: JSON.stringify({
                email: email,
                password: password,
            }),
            headers: {
                Accept: 'application/json',
                'Content-Type': 'application/json'
            }
        }).then(res => res.json())
        .then(res => {
            if (res.status == true) {
                alert('You Log In Successfully!');
                sendmessage(); // Send message on successful login
                window.location.href = `/dashboard`;
            } else {
                alert('Invalid credentials'); 
            }
            console.log(res);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});
</script>
</body>
</html>
