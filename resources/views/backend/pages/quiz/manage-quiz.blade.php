@extends('backend.layouts.master')
@include('backend.pages.quiz.addEdit');
@section('main-content')
        <div class="container mt-5 ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-preview p-3">
                            <div class="card-head">
                                <h3>Quiz</h3>
                                <a class="btn btn-primary" href="javascript:void(0)" id="createQuiz"> Add New <i
                                        class="fa-solid fa-plus pl-1"></i></a>
                            </div>
                            <div class="col-md-12">
                                <div class="card-inner">
                                    <table id="" class="  table data-table">
                                        <thead>
                                            <th>Id</th>
                                            <th>Quiz Topic</th>
                                            <th>Title </th>
                                            <th>Option One</th>
                                            <th>Option Two</th>
                                            <th>Option Three</th>
                                            <th>Option Four</th> 
                                            <th>Corrrect Answer </th>
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
                    ajax: "{{ route('dashboard.quiz') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        }, 
                        {

                            data:'quiz_topic_id',
                            name:'quiz_topic_id'
                        },
                        {
                            data: 'title',
                            name: 'title'
                        },
                        {
                            data: 'option_1',
                            name: 'option_1'
                        },
                        {
                            data: 'option_2',
                            name: 'option_2'
                        },
                        {
                            data: 'option_3',
                            name: 'option_3'
                        },
                        {
                            data: 'option_4',
                            name: 'option_4'
                        },
                        {
                            data: 'correct_answer',
                            name: 'correct_answer'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ]
                });



        $('#createQuiz').click(function() {
            $('#save').html("Create");
            $('#id').val('');
            $('#QuizForm').trigger("reset");
            $('#quizModalTitle').html("Create New Quiz");
            $('#quizModal').modal('show');
        });

        $('body').on('click', '.quizEdit-btn', function() {
                    $('.message').empty();

                    var id = $(this).data('id');
                    $.get("{{ route('dashboard.quizEdit') }}/" + id, function(data) {
                        $('#quizModalTitle').html("Edit Quiz");
                        $('#save').html("Edit-quiz");
                        $('#quizModal').modal('show');
                        $('#id').val(data.id);
                        $('#title').val(data.title);
                        $('#option_1').val(data.option_1);
                        $('#option_2').val(data.option_2);
                        $('#option_3').val(data.option_3);
                        $('#option_4').val(data.option_4);
                        $('#correct_answer').val(data.correct_answer);
                        $('#quiz_topic_id').val(data.quiz_topic_id);
                        
                    });
                });


        $('#save').click(function(e) {
            e.preventDefault();
            $('.message').empty();

            $.ajax({
                type: "POST",
                url: "{{ route('dashboard.quizStore') }}",
                data: $('#QuizForm').serialize(),
                success: function(response) {
                    if (response.success) {
                        $('#QuizForm')[0].reset();

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
                        $('#quizModal').modal('hide');
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



        $(document).on('click', '.quizDelete-btn', function(e) {
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
                                url: "{{ route('dashboard.quizDelete') }}",
                                data: {
                                    id: id
                                },
                                success: function(response) {
                                    if (response.success) {

                                        Swal.fire({
                                            position: 'top-end',
                                            icon: 'success',
                                            toast: true,
                                            title: response.success,
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
