<!-- Modal -->
<div class="modal fade" id="quizQuestionPaperModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-heading"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="message px-3 pt-2"></div>
            <div class="modal-body">

                <form id="QuestionPaperForm"  name="QuestionPaperForm">
                    @csrf

                    <input type="hidden" id="id" name="id">

                    <label for="title">Quiz Title Name :</label>
                    <input type="text" name="title" id="title" class="form-control mb-3"
                        placeholder="Quiz Title Name :">

                    <label for="subtitle">Quiz SubTitle Name :</label>
                    <input type="text" name="subtitle" id="subtitle" class="form-control mb-3"
                        placeholder="Quiz SubTitle Name :">

                    <label for="duration">Quiz Duration</label>
                    <select name="duration" id="duration" class="form-control mb-3 ">
                        <option value="#">Select Quiz Duration</option>
                        <option value="5">5 Minutes</option>
                        <option value="10">10 Minutes</option>
                        <option value="20">20 Minutes</option>
                        <option value="30">30 Minutes</option>
                        <option value="40">40 Minutes</option>
                    </select>

                    <label for="full_marks">Quiz Full Marks :</label>
                    <input type="number" name="full_marks" id="full_marks" class="form-control mb-3"
                        placeholder="Quiz Full Marks :">

                        <label for="quizSelect">----Select Quiz---- </label>
                    <select name="quiz_id[]" id="quizSelect" multiple class="form-control select2-multiple mb-3">
                        {{-- <option value="#">---Select Quiz Id------</option> --}}
                        @foreach ($quiz as $item)
                            <option value="{{ $item->id }}">{{ $item->id }}</option>
                        @endforeach

                    </select>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary create_question_paper"
                            id="create_question_paper">Create Question Paper</button>
                    </div>
                </form>
                <div id="loader" class="loader" style="display: none;"></div>
                {{-- <div class="loader" style="display:none"></div> --}}
            </div>
        </div>
    </div>
</div>
