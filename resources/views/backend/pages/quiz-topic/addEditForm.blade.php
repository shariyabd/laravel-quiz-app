

<!-- Modal -->
<div class="modal fade" id="QuizTopicModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalHeading"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="message px-3 pt-2"></div>
      <div class="modal-body">
        <form id="QuizTopicForm" name="QuizTopicForm">
          @csrf
          <input type="hidden" name="id" id="id">
          <label for="name" id="quiz-title">Quiz Topic Name :</label>
          <input type="text" name="name" id="name" class="form-control"  placeholder="Quiz Topic Name :">
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="saveTopic" value="create">Save Topic</button>
          </div>
        </form>
        
        {{-- <div class="loader" style="display:none"></div> --}}
      </div>
    </div>
  </div>
</div>

