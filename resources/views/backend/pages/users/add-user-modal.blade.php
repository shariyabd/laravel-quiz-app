<!-- Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalHeading"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="message px-3 pt-2"></div>
            <div class="modal-body">
                <form id="addUserForm" name="addUserForm">
                    @csrf
                    <label for="name">User Name : </label>
                    <input type="text" class="form-control mb-3" id="name" name="name"
                        placeholder="User Name ">

                    @error('name')
                       <p class="text-danger"> {{$message}}</p>
                    @enderror
                    <label for="email">User Email :</label>
                    <input type="email" class="form-control mb-3" id="email" name="email" 
                        placeholder="User Email"></input>
                        @error('email')
                        <p class="text-danger"> {{$message}}</p>
                     @enderror
                    <label for="password">Password :</label>
                    <input type="password" class="form-control mb-3" id="password" name="password"
                        placeholder="Password :">
                        @error('password')
                        <p class="text-danger"> {{$message}}</p>
                     @enderror
                        <label for="password_confirmation">Confirm Password :</label>
                        <input type="password" class="form-control mb-3" id="password_confirmation" name="password_confirmation"
                            placeholder="Confirm Password :">
                            @error('password_confirmation')
                            <p class="text-danger"> {{$message}}</p>
                         @enderror
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="addUser" value="create">Add</button>
            </div>
            </form>

            {{-- <div class="loader" style="display:none"></div> --}}
        </div>
    </div>
</div>
</div>
