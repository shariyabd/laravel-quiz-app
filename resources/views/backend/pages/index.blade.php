@extends('backend.layouts.master');
@section('main-content');

<div class="container p-5">
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-6">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Quiz Topic
                            </div>
                            <div class="h5">{{$totalQuizTopic}}</div>
                            <div class="col-auto">
                                <i class="fa-solid fa-user-graduate fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-6">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                               Total Quiz
                            </div>
                            <div class="h5">{{$totalQuiz}}</div>
                            <div class="col-auto">
                                <i class="fa-solid fa-user-graduate fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-6">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Users
                            </div>
                            <div class="h5">{{$totalUsers}}</div>
                            <div class="col-auto">
                                <i class="fa-solid fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-6">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Question Paper
                            </div>
                            <div class="h5">{{$totalQuizQuestionPaper}}</div>
                            <div class="col-auto">
                                <i class="fa-solid fa-file-circle-question fa-2x text-gray-300"></i>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <h1 class="mb-4">Leaderboard</h1>
            <div class="col-md-12">
                <div class="leaderboard-card p-4">
                    <table class="table table-striped table-bordered shadow-sm">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Username</th>
                                <th>Score</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>User1</td>
                                <td>100</td>
                                <td>
                                    <button class="btn btn-primary btn-sm">View Profile</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>User2</td>
                                <td>90</td>
                                <td>
                                    <button class="btn btn-primary btn-sm">View Profile</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>User2</td>
                                <td>90</td>
                                <td>
                                    <button class="btn btn-primary btn-sm">View Profile</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>User2</td>
                                <td>90</td>
                                <td>
                                    <button class="btn btn-primary btn-sm">View Profile</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>User2</td>
                                <td>90</td>
                                <td>
                                    <button class="btn btn-primary btn-sm">View Profile</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>User2</td>
                                <td>90</td>
                                <td>
                                    <button class="btn btn-primary btn-sm">View Profile</button>
                                </td>
                            </tr>
                            <!-- Add more rows for other users -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session('success')){
    @push('js')
    <script>
  Swal.fire({
    position: 'top-end',
    icon: '{{session('cls')}}',
    toast: true,
    title: '{{session('success')}}',
    showConfirmButton: false,
    timer: 2000
  })
    </script>
  @endpush
  }
  @endif
@endsection