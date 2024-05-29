@extends('admin.dashboard')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link rel="stylesheet" href="assets/css/post.css">

</head>
<body>
    <div class="main-sidebar">
        <div id="sidebar-wrapper">
            <div class="sidebar-brand">
                <h4>My Brand</h4>
            </div>
            <ul class="sidebar-menu">
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </div>
    </div>
    <main>
        <h1>Main Heading</h1>
        <h2>Subheading</h2>
        <div class="table-section">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>30</td>
                        <td>
                            <button class="edit-button"><i class="fas fa-edit"></i></button>
                            <button class="delete-button"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Jane Smith</td>
                        <td>25</td>
                        <td>
                            <button class="edit-button"><i class="fas fa-edit"></i></button>
                            <button class="delete-button"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
