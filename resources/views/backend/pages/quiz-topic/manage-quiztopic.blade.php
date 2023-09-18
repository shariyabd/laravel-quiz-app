@extends('backend.layouts.master');
@include('backend.pages.quiz-topic.addEditForm')
@section('main-content')
    <!-- content @s
        -->
        <div class="container mt-5 ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-preview p-3">
                            <div class="card-head">
                                <h3>Quiz Topic</h3>
                                <!-- Button trigger modal -->
                                <a class="btn btn-primary" href="javascript:void(0)" id="createNewQuiz"> Add New <i
                                        class="fa-solid fa-plus pl-1"></i></a>
                            </div>
                            <div class="col-md-12">
                                <div class="card-inner">
                                    <table id="" class=" nowrap table data-table">
                                        <thead>
                                            <th>Id</th>
                                            <th>Name </th>
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
                    ajax: "{{ route('dashboard.quiz.topic') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ]
                });




                // $(document).on('click', '#savedata', function(e) {
                //     e.preventDefault();



                //     $('.loader-main').fadeIn(500);

                //     $('.message').empty();
                //     $.ajax({
                //         type: "POST",
                //         url: "{{ route('dashboard.quiz.topic.addedit') }}",
                //         data: $('#QuizTopicForm').serialize(),
                //         success: function(response) {
                //             $('.loader-main').fadeOut(500);
                //             if (response.message) {
                //                 // $('.message').text(response.message).addClass('text-success');
                //                 $('.message').append('<span class="text-success">' + response.message +
                //                     '</span>' + '</br>');

                //                 // $('#addEditModal').modal('hide');
                //                 $('#QuizTopicForm')[0].reset();
                //             }
                //         },
                //         error: function(error) {
                //             $('.loader-main').fadeOut(500);
                //             $('body').removeClass('.body-color');
                //             var errors = error.responseJSON.errors;
                //             $.each(errors, function(key, value) {
                //                 $('.message').append('<span class="text-danger">' + value + '</span>' +
                //                     '</br>');
                //             })
                //             console.log(response);
                //         }
                //     })
                // });

                $('#createNewQuiz').click(function() {
                    $('#id').val('');
                    $('#QuizTopicForm').trigger("reset");
                    $('#ModalHeading').html("Create New Topic");
                    $('#QuizTopicModal').modal('show');
                });

                $('body').on('click', '.quizTopicEdit-btn', function() {
                    $('.message').empty();

                    var id = $(this).data('id');
                    $.get("{{ route('dashboard.quiz.topic.edit') }}/" + id, function(data) {
                        $('.modal-title').html("Edit Quiz");
                        $('#saveBtn').html("edit-quiz");
                        $('#QuizTopicModal').modal('show');
                        $('#id').val(data.id);
                        $('#name').val(data.name);
                    });
                });

                $('#saveTopic').click(function(e) {
                    e.preventDefault();
                    $('.message').empty();

                    $.ajax({
                        type: "POST",
                        url: "{{ route('dashboard.quiz.topic.addedit') }}",
                        data: $('#QuizTopicForm').serialize(),
                        success: function(response) {
                            if (response.success) {
                                $('#QuizTopicForm')[0].reset();

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
                                $('#QuizTopicModal').modal('hide');
                            }
                        },
                        error: function(error) {
                            var errors = error.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('.message').append('<span class="text-danger alert">' +
                                    value +
                                    '</span>' + '<br>');
                            })
                        }
                    })

                })




                $(document).on('click', '.quizTopicDelete-btn', function(e) {
                    e.preventDefault();
                    let id = $(this).data('id');



                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {

                            $.ajax({
                                method: "POST",
                                url: "{{ route('dashboard.quiz-topic.delete') }}",
                                data: {
                                    id: id
                                },
                                success: function(response) {
                                    if (response.message) {

                                        Swal.fire({
                                            position: 'top-end',
                                            icon: 'success',
                                            toast: true,
                                            title: response.message,
                                            showConfirmButton: false,
                                            timer: 1500
                                        });
                                        table.draw();
                                    }
                                }
                            })
                        }
                    })


                });

            })
        </script>
    @endpush
