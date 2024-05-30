<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OTP</title>
</head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
    <script>
        if (localStorage.getItem('status') != 'true') {
            window.location.href = `/`;
        }
    </script>
<body>
    <form id="submit">
        <input type="text" placeholder="OTP nimo buang" id="otp">
        <button type="submit">verify</button>
    </form>
    <script>
        const submitOtp = document.querySelector('#submit');

        submitOtp.addEventListener('submit', function(event) {
            event.preventDefault();

            let otp = document.querySelector('#otp').value;
            const verifyOtpApi = `api/verifyOTP`
            fetch(verifyOtpApi, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    otp_code: otp,
                })
            }).then(res => res.json())
            .then(res => {
                if (res.status != true) {
                    alert('Uy pataka!')
                } else {
                    localStorage.setItem('tokenSaBuang', res.token);
                    localStorage.removeItem('status');
                    window.location.href = `dashboard`;
                }
            });
        })
    </script>
</body>
</html>