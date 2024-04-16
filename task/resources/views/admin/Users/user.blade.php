@extends('admin/layout/layout')

@section('title', 'User')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> User</h3>
            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card ">
                    <div class="card">
                        <div class="card-body">
                            <a href="" class="btn btn-primary my-3" data-bs-toggle="modal"
                                data-bs-target="#addModalUser">Add User</a>
                                <input type="text" name='search_user' id='search_user' class='mb-3 form-control' placeholder='Search Here...'>
                                <hr style="background:#8080ff;">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>email</th>
                                            <th>phone</th>
                                            <th>address</th> 
                                            <th>role</th> 

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key => $user)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>{{ $user->address }}</td>
                                                <td>{{ $user->role }}</td>



                                                <td>
                                                <a href="#" class="btn btn-success update_user_form"
                                                   data-bs-toggle="modal" data-bs-target="#updateUserModal"
                                                   data-id="{{ $user->id }}"
                                                   data-name="{{ $user->name }}"
                                                   data-email="{{ $user->email }}"
                                                   data-password="{{ $user->password }}"
                                                   data-phone="{{ $user->phone }}"
                                                   data-address="{{ $user->address }}"
                                                   data-role="{{ $user->role }}">
                                                   <i class="fa-solid fa-pen-to-square"></i>
                                                </a>

                                                    <a href="" class="btn btn-danger delete_user"
                                                        data-id="{{ $user->id }}">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Hasan Abu-Khalil
                    2024</span>

            </div>
        </footer>
        <!-- partial -->

        @include('admin/Users/update_user_modal')
        @include('admin/Users/add_user_modal')
        @include('admin/Users/user_js')
    </div>

   
   
@endsection
