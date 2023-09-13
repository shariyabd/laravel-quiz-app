@extends('backend.layouts.master');

@section('main-content')
 <!-- content @s -->
 <div class="container mt-5 ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3">
                    <div class="card-head">
                        <h3>Quiz Question</h3>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#quizQuestionModal">Add Quiz Question</button>
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
                                    <tr>
                                        <td>1</td>
                                        <td>Akash</td>
                                        <td>shariya873@gmail.com</td>
                                        <td>
                                            <a href="">Delete</a>
                                            <a href="">Edit</a>
                                        </td>
                                    </tr>  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        $(document).ready(function() {
           
        });
    </script>
@endpush
<!-- content @e -->

@endsection