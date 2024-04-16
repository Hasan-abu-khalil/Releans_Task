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