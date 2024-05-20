document.getElementById('loginFormElement').addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(this);

    fetch("http://127.0.0.1:8000/api/login", {
        method: 'POST',
        body: formData,
        headers: {
            Accept: 'application/json',
            Authorization: 'Bearer ' + localStorage.getItem('token'),
        }
    }).then(response => {
        return response.json();
    }).then(data => {
        if (data.token) {
            localStorage.setItem('token', data.token);
            document.getElementById('loginFormElement').style.display = 'none'; // Hide login form
            document.querySelector('.otp-container').style.display = 'block'; // Show OTP form
        } else {
            document.getElementById('message').innerText = data.message;
            document.getElementById('message').style.color = "red";
        }
    }).catch(error => {
        console.error("Something went wrong with your fetch", error);
    });
});


document.getElementById('otp-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(this);
    const token = localStorage.getItem('token'); 

    formData.append('token', token); 

    fetch("http://127.0.0.1:8000/api/verifyOTP", {
        method: 'POST',
        body: formData,
        headers: {
            Accept: 'application/json',
            Authorization: 'Bearer ' + token, 
        }
    }).then(response => {
        return response.json();
    }).then(data => {
        if (data.status) {
            localStorage.setItem('accessToken', data.accessToken); 
            window.location.href = '/dashboard'; 
        } else {
            document.getElementById('otpmessage').textContent = data.message;
            document.getElementById('otpmessage').style.color = "red";
        }
    }).catch(error => {
        console.error('Error:', error);
    });
});