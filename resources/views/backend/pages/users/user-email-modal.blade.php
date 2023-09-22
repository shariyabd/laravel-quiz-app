<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalHeading"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="message px-3 pt-2"></div>

            {{-- Now you can use $id safely --}}

            @php
                $id = Auth::guard('user')->user()->id;
            @endphp
            <div class="modal-body">
                <form id="userForm" name="userForm" action="{{ route('dashboard.user.sendEmail', ['id' => $id]) }}"
                    method="POST">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{ $id }}">
                    <label for="greetings">Greeting's </label>
                    <input type="text" class="form-control mb-3" id="greetings" name="greetings"
                        placeholder="Greeting's">

                    <label for="bodyText">Body Text</label>
                    <textarea class="form-control mb-3" id="bodyText" name="bodyText" cols="10" rows="5"
                        placeholder="Body Text"></textarea>

                    <label for="endText">End Text :</label>
                    <input type="text" class="form-control mb-3" id="endText" name="endText"
                        placeholder="End Text :">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="send" value="create">Send</button>
            </div>
            </form>

            {{-- <div class="loader" style="display:none"></div> --}}
        </div>
    </div>
</div>
</div>
