@extends('admin.dashboard')
@section('content')

<link rel="stylesheet" href="assets/css/profiles.css">
<div class="container">
    <h2>User Profile</h2>
    <div class="profile-info">
        <div class="profile-picture">
            <img id="profile-pic" src="assets/img/meeee.jpg" alt="Profile Picture">
        </div>
        <div class="profile-details">
            <p><strong>First Name:</strong> <span id="first_name"></span></p>
            <p><strong>Last Name:</strong> <span id="last_name"></span></p>
            <p><strong>Course:</strong> <span id="course"></span></p>
            <p><strong>Email Address:</strong> <span id="email"></span></p>
        </div>
        <button type="button" id="edtBtn">Edit Profile</button>

<script>
    document.getElementById('edtBtn').addEventListener('click', function() {
        window.location.href = '/editProfile';
    });
</script>
    </div>
</div>



<script>
document.addEventListener('DOMContentLoaded', (event) => {
    fetch('http://127.0.0.1:8000/api/getAll', {
        method: 'GET',
        headers: {
            Accept: 'application/json',
            Authorization: 'Bearer ' + localStorage.getItem('token'),   
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.json();
    })
    .then(data => {
        document.getElementById('first_name').textContent = data.first_name;
        document.getElementById('last_name').textContent = data.last_name;
        document.getElementById('course').textContent = data.course;
        document.getElementById('email').textContent = data.email;

    })
    .catch(error => console.error('Error:', error));
   

});
</script>


@endsection
