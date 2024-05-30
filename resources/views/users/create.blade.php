@extends('admin.dashboard')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/usercreate.css">
</head>
<body>
<div class="container">
    <h2>Create User</h2>
    <form id="createUserForm">
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
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>

<script>
    document.getElementById('createUserForm').addEventListener('submit', function(event) {
        event.preventDefault();

        let formData = new FormData(this);

        fetch('http://127.0.0.1:8000/api/createUser', {
            method: 'POST',
            body: formData,
            headers: {
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + localStorage.getItem('token'),
            }
        }).then(response => {
            return response.json();
    }).then(data => {
         console.log(data.message);
         if(data.message == "User Created Successfully"){
            window.location.href="/users";
         }
    }).catch(error => console.error('Error:', error));
});
</script>

</body>
</html>
@endsection
