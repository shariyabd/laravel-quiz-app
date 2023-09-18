<!-- Modal -->
<div class="modal fade p-3 bg-primary" id="quizModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="quizModalTitle"> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="message px-3 pt-2"></div>
            <div class="modal-body ">
                <form action="{{route('dashboard.quizStore')}}" method="POST" id="QuizForm" class="row" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" id="id">
                    <div class="col-md-12 mb-2">
                        <label for="title" class="pl-2">Title :</label>
                        <input type="text" name="title" id="title" class="form-control ml-2">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="option_1" class="pl-2">Option One :</label>
                        <div class="d-flex ml-4 pl-2">
                            <input type="radio" class="form-check-input p-2" name="correct_answer" value="option_1">
                            <input type="text" name="option_1" id="option_1" class="form-control ml-2">
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="option_2" class="pl-2">Option Two :</label>
                        <div class="d-flex ml-4 pl-2">
                            <input type="radio" class="form-check-input p-2" name="correct_answer" value="option_2">
                            <input type="text" name="option_2" id="option_2" class="form-control ml-2">
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="option_3" class="pl-2">Option Three :</label>
                        <div class="d-flex ml-4 pl-2">
                            <input type="radio" class="form-check-input p-2" name="correct_answer" value="option_3">
                            <input type="text" name="option_3" id="option_3" class="form-control ml-2">
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="option_4" class="pl-2">Option Four :</label>
                        <div class="d-flex ml-4 pl-2">
                            <input type="radio" class="form-check-input p-2" name="correct_answer" value="option_4">
                            <input type="text" name="option_4" id="option_4" class="form-control ml-2">
                        </div>
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="quiz_topic_id" class="pl-2">Select Topic</label>
                        <div class="d-flex ml-2">
                            <select name="quiz_topic_id" id="quiz_topic_id" class="form-control">
                                <option value="#">Select Topic</option>
                                @foreach ($quizTopics as $quizTopic)
                                    <option value="{{ $quizTopic->id }}">{{ $quizTopic->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="image" class="pl-2">Image :</label>
                        <input type="file" name="image" id="image" class="form-control ml-2">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary saveQuiz" id="save">Save</button>
                    </div>
                </form>
                <div class="loader-main">
                    <div id="loader" class="loader" style="display: none;"></div>
                </div>
                {{-- <div class="loader" style="display:none"></div> --}}
            </div>
        </div>
    </div>
</div>
