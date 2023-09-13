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
                                    data-bs-target="#quizQuestionPaperModal">Add Quiz Question</button>
                            </div>
                            <div class="col-md-12">
                                <div class="card-body">
                                    <table id="" class="table table-bordered">
                                        <thead>
                                            <th>Id</th>
                                            <th>Name </th>
                                            <th>Email </th>
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
            $('#createQuiz').click(function() {
                $('#quizQuestionPaperModal').modal('show');
                $('#id').val('');
                $('#QuestionPaperForm').trigger("reset");
                $('#modal-heading').html("Create New Question Paper");
            });

            $('.create_question_paper').click(function(e) {
                    e.preventDefault();
                    $('.message').empty();

                    $.ajax({
                        type: "POST",
                        url: "{{ route('dashboard.quizQuestionStore') }}",
                        data: $('#QuestionPaperForm').serialize(),
                        success: function(response) {
                            if (response.success) {
                                $('#QuestionPaperForm')[0].reset();

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
                                $('#quizQuestionPaperModal').modal('hide');
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
        </script>
    @endpush
