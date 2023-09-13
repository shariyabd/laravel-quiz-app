

<!-- Modal -->
<div class="modal fade" id="quizQuestionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create A Quiz Question</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="message px-3 pt-2"></div>
        <div class="modal-body">
          <form  method="post" id="QuizQuestionForm">
            @csrf
            <label for="quiz_title">Quiz Title Name :</label>
            <input type="text" name="title" id="quiz_title" class="form-control mb-3"  placeholder="Quiz Title Name :">

            <label for="quiz_subtitle">Quiz SubTitle Name :</label>
            <input type="text" name="sub-title" id="quiz_subtitle" class="form-control mb-3"  placeholder="Quiz SubTitle Name :">

            <label for="quiz_duration">Quiz Duration</label>
            <input type="text" name="duration" id="quiz_duration" class="form-control mb-3"  placeholder="Quiz Duration :">

            <label for="quiz_marks">Quiz Full Marks :</label>
            <input type="text" name="full_marks" id="quiz_marks" class="form-control mb-3"  placeholder="Quiz Full Marks :">

            <select name="quiz_id" id="" class="form-control mb-3">
                <option value="">Select Quiz Id []</option>
            </select>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary create_question" id="create_question">Create Question</button>
            </div>
          </form>
          <div id="loader" class="loader" style="display: none;"></div>
          {{-- <div class="loader" style="display:none"></div> --}}
        </div>
      </div>
    </div>
  </div>
  
  