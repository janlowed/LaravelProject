@extends('admin.dashboard')
@section('content')

        <div class="User">
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
                        <a href="/addUser">
                          <button type="button" class = "btn btn-primary" id = "addUser">Add User
</button>
                        </a>
                      </tr>
                    </tbody>
                  </table>
            </section>
            </div>
        </div>
    <script>
        const getAllapi='api/getAll';
        fetch(getAllapi)
        .then(res => res.json())
        .then(data => {
            // console.log(data);
        
            const tablebody = document.getElementById('tablebody'); 
        
            tablebody.innerHTML = '';
        
            for(let i = 0; i < data.length; i++)
            {
              console.log(data[i]);
                const body = `<td>${data[i].id}</td>        
                              <td>${data[i].first_name}</td>        
                              <td>${data[i].last_name}</td>        
                              <td>${data[i].email}</td> 
                              <td>
                                <a class="editBtn" href="/editUser/${data[i].id}">Edit</a>
                                <button class="deleteBtn" data-id="${data.id}">Delete</button>
                            </td>       
                           `;
                    tablebody.innerHTML += body;
            }
        })
        .catch(error => console.error('error', error));
    </script>

<script src="assets/sweetalert/sweetalert.min.js"></script>

@endsection