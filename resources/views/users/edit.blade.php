{{-- @extends('admin.dashboard')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/edit.css">
</head>
<body>
<div class="container">
    <h2>Edit User</h2>
    <form id="editUserForm">
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" class="form-control" id="first_name" name="first_name" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" class="form-control" id="last_name" name="last_name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<script>
    // Fetch user data and populate the form
    document.addEventListener('DOMContentLoaded', function() {
        let userId = new URLSearchParams(window.location.search).get('id');

        fetch(`http://127.0.0.1:8000/api/users/${userId}`, {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + localStorage.getItem('token'),
            }
        }).then(response => {
            return response.json();
        }).then(data => {
            document.getElementById('first_name').value = data.user.first_name;
            document.getElementById('last_name').value = data.user.last_name;
            document.getElementById('email').value = data.user.email;
            document.getElementById('address').value = data.user.address;
        }).catch(error => console.error('Error:', error));
    });

    document.getElementById('editUserForm').addEventListener('submit', function(event) {
        event.preventDefault();

        let userId = new URLSearchParams(window.location.search).get('id');
        let formData = new FormData(this);

        fetch(`http://127.0.0.1:8000/api/updateUser/${userId}`, {
            method: 'PUT',
            body: formData,
            headers: {
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + localStorage.getItem('token'),
            }
        }).then(response => {
            return response.json();
        }).then(data => {
            console.log(data.message);
            if(data.message == "User Updated Successfully"){
                window.location.href="/users";
            }
        }).catch(error => console.error('Error:', error));
    });
</script>

</body>
</html>
@endsection --}}
