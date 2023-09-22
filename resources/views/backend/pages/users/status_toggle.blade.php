@extends('backend.layouts.master')
@section('main-content')
    <div class="form-check form-switch">
        <input disabled class="form-check-input toggle-user-status" type="checkbox" data-user-id="{{ $row->id }}"
            {{ $row->is_active ? 'checked' : '' }}>
        @if ($row->is_active)
            <form action="{{ route('dashboard.user.deactivate', $row) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-success btn-sm btn-deactivate">Deactivate</button>
            </form>
        @else
            <form action="{{ route('dashboard.user.activate', $row) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-primary btn-sm  btn-activate">Activate</button>
            </form>
        @endif

    </div>
@endsection
