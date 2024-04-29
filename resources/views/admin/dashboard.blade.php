<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/dashboard.css">
</head>
    <style>

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

main {
    padding: 20px;
}

.main-sidebar {
    width: 200px;
    height: 100vh;
    background-color: #2c3e50;
    position: fixed;
    left: 0;
    top: 0;
}

#sidebar-wrapper {
    padding: 15px;
}

.sidebar-brand h4 {
    color: white;
    text-align: center;
}

.sidebar-menu {
    list-style-type: none;
    padding: 0;
}

.sidebar-menu li {
    margin: 10px 0;
}

.sidebar-menu a {
    text-decoration: none;
    color: white;
    display: block;
    padding: 10px;
    border-radius: 5px;
}

.sidebar-menu a:hover {
    background-color: #34495e;
}

.table-section {
    margin-left: 200px;
    padding: px;
}

.table {
    width: 100%;
    border-collapse: collapse;
}

.table th, .table td {
    padding: 12px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

.table th {
    background-color: #34495e;
    color: white;
}

.table-striped tr:nth-child(even) {
    background-color: #f2f2f2;
}

.table-dark {
    background-color: #2c3e50;
    color: white;
}

.edit-button, .delete-button {
    background: none;
    border: none;
    cursor: pointer;
}

.edit-button i, .delete-button i {
    color: #2980b9;
}

.delete-button i {
    color: #c0392b;
}

.edit-button:hover, .delete-button:hover {
    opacity: 0.8;
}

    </style>
</head>
<body>
  
    <div class="main-sidebar">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <h4>Dashboard</h4>
                </div>
                <div>
                <ul class="sidebar-menu">
                    <li class="dropdown">
                        <a href="#" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
                    </li>
                    <li><a class="nav-link" href="#"><i data-feather="grid"></i><span>Users</span></a></li>
                    <li><a class="nav-link" href="http://127.0.0.1:8000/"><i data-feather="grid"></i><span>Logout</span></a></li>
                </ul>
            </aside>
        </div>
    
        <main>
            <div class="User"></div>
            <h1>Users </h1>
            <section class="table-section">
                <table class="table table-striped table-dark">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name </th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody id="tablebody">
                      <tr>
    
                      </tr>
                    </tbody>
                  </table>
            </section>
        </div>
        </main>
        </body>
    </html>
        <script>
          fetch('http://localhost/dashboard_project/back_end/route/getAll.php')
    .then(res => res.json())
    .then(data => {
        console.log(data);
    
        const tablebody = document.getElementById('tablebody'); 
    
        tablebody.innerHTML = '';
    
        for(let i = 0; i < data.length; i++)
        {
            const body = `<td>${data[i].id}</td>        
                          <td>${data[i].first_name}</td>        
                          <td>${data[i].last_name}</td>        
                          <td>${data[i].email}</td> 
                          <td>
                            <button class="edit-button">
                                <i class="fas fa-edit"></i> <!-- Font Awesome edit icon -->
                            </button>
    
                            <button class="delete-button">
                                <i class="fas fa-trash-alt"></i> <!-- Font Awesome delete icon -->
                            </button>
                        </td>       
                       `;
                tablebody.innerHTML += body;
        }
    })
    .catch(error => console.error('error', error));
        </script>

</html>


