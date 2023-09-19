@extends('backend.layouts.master');
@include('backend.pages.users.user-modal');
@section('main-content')
    <!-- content @s
        -->
        <div class="container mt-5 ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-preview p-3">
                            <div class="card-head">
                                <h3>User List</h3>
                                <!-- Button trigger modal -->
                                {{-- <a class="btn btn-primary" href="javascript:void(0)" id="createNewQuiz"> Add New <i
                                        class="fa-solid fa-plus pl-1"></i></a> --}}
                            </div>
                            {{-- @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif --}}
                            <div class="col-md-12">
                                <div class="card-inner">
                                    <table id="" class=" nowrap table data-table">
                                        <thead>
                                            <th>Id</th>
                                            <th>Name </th>
                                            <th>Email</th>
                                            {{-- <th>Image</th> --}}
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $user->id }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td> <img id="imageShow"
                                                            src="{{ asset('frontend/image/' . $user->image) }}"
                                                            class="rounded-circle" width="50px" alt="User Image"></td>
                                                    <td>
                                                        <a href="javascript:void(0)" class="btn btn-primary" id="sendMail">Send
                                                            Email</a>
                                                    </td>
                                                </tr>
                                            @endforeach --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    @endsection

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

                })



                $('body').on('click', '.send-email-btn', function() {

                    // $('#id').val('');
                    $('#userForm').trigger("reset");
                    $('#ModalHeading').html("Send Email To User");
                    $('#userModal').modal('show');
                });

                // $('#imageShow').click(function() {
                //     Swal.fire({
                //         title: 'Sweet!',
                //         text: 'Modal with a custom image.',
                //         imageUrl: 'https://unsplash.it/400/200',
                //         imageWidth: 500,
                //         imageHeight: 500,
                //         imageAlt: 'Custom image',
                //     })

                // })
            })
        </script>
    @endpush
