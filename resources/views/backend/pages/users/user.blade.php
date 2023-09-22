@extends('backend.layouts.master')
@include('backend.pages.users.user-email-modal')
@include('backend.pages.users.add-user-modal')
@section('main-content')
 
        <div class="container mt-5 ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-preview p-3">
                            <div class="card-head">
                                <h3>User List</h3>
                                <!-- Button trigger modal -->
                                <a class="btn btn-primary" href="javascript:void(0)" id="addNewUser"> Add New <i
                                        class="fa-solid fa-plus pl-1"></i></a>
                            </div>
                            <div class="col-md-12">
                                <div class="card-inner">
                                    <table id="" class=" nowrap table data-table">
                                        <thead>
                                            <th>Id</th>
                                            <th>Name </th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    @endsection
    @if (session('success'))
    @push('js')
        <script>
            Swal.fire({
                position: 'top-end',
                icon: '{{ session('cls') }}',
                toast: true,
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @endpush
@endif
    @push('js')
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>

        <script>
            $(function() {
                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('dashboard.user.show') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'status_toggle',
                            name: 'status_toggle', 
                            orderable: false,
                            searchable: false
                        },
                        // {
                        //     data: 'image',
                        //     name: 'image'
                        // },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ]

                });


                $('#addNewUser').on('click', function(e) {
                    e.preventDefault();
                    $('#addUserModal').modal('show');
                    $('.modal-title').html("Create New User");
                });


                $('#addUser').on('click', function(e) {
                    e.preventDefault();

                    $.ajax({
                        type: "POST",
                        url: "{{ route('dashboard.user.post') }}",
                        data: $('#addUserForm').serialize(),
                        success: function(response) {
                            if (response.success) {
                                $('#addUserForm')[0].reset();

                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    toast: true,
                                    title: response.success,
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                // $('.data-table').load(location.href + ' .data-table');
                                table.draw();
                                $('#addUserModal').modal('hide');
                            }
                        },
                        error: function(error) {
                            var errors = error.responseJSON.errors;
                            $.each(errors, function($key, $value) {
                                $('.message').append('<span class="text-danger alert">' +
                                    $value +
                                    '</span>' + '<br>');
                            })
                        }
                    });
                });
                $('body').on('click', '.send-email-btn', function(e) {

                    e.preventDefault();

                    // $('#id').val('');
                    $('#userForm').trigger("reset");
                    $('#ModalHeading').html("Send Email To User");
                    $('#userModal').modal('show');
                });

            });
        </script>
    @endpush
