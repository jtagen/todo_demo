@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                        @foreach($users as $user)
                                <hr class="my-1">
                                  <ul class="list-group list-group-horizontal ">
                                    <li class="list-group-item px-3 py-1 d-flex align-items-center flex-grow-1 border-0">
                                      <p class="lead fw-normal mb-0 item-name">{{ $user->name }} ({{ $user->email }})</p>
                                    </li>
                                    <li class="list-group-item ps-3 pe-0 py-1 rounded-0 border-0">
                                      <div class="d-flex flex-row justify-content-end mb-1">
                                        <a class="btn btn-primary" href="{{ route('admin_user_view',[$user->id]) }}">view</a>
                                      </div>
                                    </li>
                                  </ul>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
