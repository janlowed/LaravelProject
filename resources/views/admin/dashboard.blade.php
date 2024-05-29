<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/dashboard.css">
    
    <script>
        let token = localStorage.getItem('tokenSaBuang');

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
                        <a href="/dashboard" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
                    </li>
                    <li><a class="nav-link" href="/users"><i data-feather="grid"></i><span>Users</span></a></li>
                    {{-- <li><a class="nav-link" href="#"><i data-feather="grid"></i><span>Posts</span></a></li> --}}
                    <li><a class="nav-link" href="/profile"><i data-feather="grid"></i><span>Profile</span></a></li>
                    <li><a class="nav-link" onclick="logoutFunction()"><i data-feather="grid"></i><span>Logout</span></a></li>
                </ul>
            </aside>
        </div>
    
        <main>
@yield('content')
    </main>

<script>
    function logoutFunction() {
        swal({
                title: "Are you sure?",
                text: "You will be logged out!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willLogout) => {
                if (willLogout) {
                    
                    localStorage.removeItem('tokenSaBuang');  
                    swal("Logged out successfully!", {
                        icon: "success",
                    }).then(() => {
                        
                        window.location.href = `/`; 
                    });
                }
            });
    }
</script>



<script src="assets/sweetalert/sweetalert.min.js"></script>
</body>      
</html>

@include('layouts.footer')

