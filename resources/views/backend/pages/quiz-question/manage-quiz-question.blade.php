@extends('backend.layouts.master');

@include('backend.pages.quiz-question.addEditForm');
@section('main-content')
    <!-- content @s
        -->
        <div class="container mt-5 ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card p-3">
                            <div class="card-head">
                                <h3>Quiz Question</h3>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#quizQuestionPaperModal" id="addQuestionPaper">Add Quiz Question</button>
                            </div>
                            <div class="col-md-12">
                                <div class="card-body">
                                    <table id="" class="table table-bordered data-table">
                                        <thead>
                                            <th>Id</th>
                                            <th>Title </th>
                                            <th>Sub Title </th>
                                            <th>Duration</th>
                                            <th>Marks</th>
                                            <th>Total Quiz</th>
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

        <!-- content @e -->
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
                    ajax: "{{ route('dashboard.quiz.question') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {

                            data: 'title',
                            name: 'title'
                        },
                        {

                            data: 'subtitle',
                            name: 'subtitle'
                        },
                        {

                            data: 'duration',
                            name: 'duration'
                        },
                        {

                            data: 'full_marks',
                            name: 'full_marks'
                        }, {

                            data: 'quiz_id',
                            name: 'quiz_id'
                        },


                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ]
                });

                $('#addQuestionPaper').click(function() {
                    $('#id').val('');
                    $('#QuestionPaperForm').trigger("reset");
                    $('.modal-title').html("Create Quiz Question Paper");
                    $('#quizQuestionPaperModal').modal('show');
                });



                $('#create_question_paper').click(function(e) {
                    e.preventDefault();
                    $('.message').empty();

                    $('.create_question_paper').html("Create Question Paper");

                    $.ajax({
                        type: "POST",
                        url: "{{ route('dashboard.quizQuestionStore') }}",
                        data: $('#QuestionPaperForm').serialize(),
                        dataType: 'json',
                        success: function(response) {

                            console.log(response);
                            console.log("Ajax request success");

                            if (response && response.message != undefined) {
                                Swal.fire({
                                            position: 'top-end',
                                            icon: 'success',
                                            toast: true,
                                            title: response.message,
                                            showConfirmButton: false,
                                            timer: 1500
                                        });
                                $('#QuestionPaperForm')[0].reset();
                                $('#quizQuestionPaperModal').modal('hide');
                                table.draw();
                            }
                        },
                        error: function(error) {
                            console.log("Ajax request error");

                            var errors = error.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('.message').append('<span class="text-danger alert">' +
                                    value +
                                    '</span>' + '<br>');
                            })
                        }
                    });

                });

                $('body').on('click', '.questionPaperEdit-btn', function() {
                    $('.message').empty();

                    var id = $(this).data('id');
                    $.get("{{ route('dashboard.quizQuestionEdit')  }}/" + id, function(data) {
                        $('.modal-title').html("Edit Quiz Question Paper");
                        $('.create_question_paper').html("Edit Question Paper");
                        $('#quizQuestionPaperModal').modal('show');

                        $('#QuestionPaperForm [name="id"]').val(data.id);
                        $('#QuestionPaperForm [name="title"]').val(data.title);
                        $('#QuestionPaperForm [name="subtitle"]').val(data.subtitle);
                        $('#QuestionPaperForm [name="duration"]').val(data.duration);
                        $('#QuestionPaperForm [name="full_marks"]').val(data.full_marks);
                       // $('#id').val(data.id);
                       // $('#title').val(data.title);
                       // $('#subtitle').val(data.subtitle);
                       // $('#duration').val(data.duration);
                       // $('#full_marks').val(data.full_marks);
                        // $('#quizSelect').val(data.quiz_id);

                        var jsonData = JSON.parse(data.quiz_id);
                        $('#quizSelect').val(jsonData);
                    });
                });

                // $('#formId [name="ElementNameHere"]')

                $(document).on('click', '.questionPaperDelete-btn', function(e) {
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
                                url: "{{ route('dashboard.quizQuestionDelete') }}",
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
                                            timer: 1500,
                                        });
                                        table.draw();

                                    }
                                }
                            })
                        }
                    })
                });



            });
        </script>
    @endpush
