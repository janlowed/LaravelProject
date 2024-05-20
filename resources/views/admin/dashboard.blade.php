<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <script>
        $token = localStorage.getItem('token');

        if(!token) {
            window.location.href = '/';
        }
    </script>
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
                    <li><a class="nav-link" href="#"><i data-feather="grid"></i><span>Posts</span></a></li>
                    <li><a class="nav-link" onclick="logout()"><i data-feather="grid"></i><span>Logout</span></a></li>
                </ul>
            </aside>
        </div>
    
        <main>
            <div class="User">
            <h1>Welcome to Dashboard</h1>
            <h2>Users Data</h2>
            <section class="table-section">
                <table class="table table-striped table-dark">
                    <caption>Table Users</caption>
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
        </div>
        </main>
        </body>
    </html>
        <script>
            const getAllapi='api/getAll';
        fetch(getAllapi)
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
                                <i class="fas fa-edit"></i>
                            </button>
    
                            <button class="delete-button">
                                <i class="fas fa-trash-alt"></i
                            </button>
                        </td>       
                       `;
                tablebody.innerHTML += body;
        }
    })
    .catch(error => console.error('error', error));
        </script>

</html>

@include('layouts.footer')