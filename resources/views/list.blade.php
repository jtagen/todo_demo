@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My To-Do Items</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                    <form action="{{route('todo_create')}}" method="POST">
                        @csrf
                        <div class="d-flex flex-row align-items-center">
                          <input type="text" name="item" class="form-control form-control-lg" placeholder="Add new..."> 
                          
                          <div>
                            <button type="submit" id="new_add" class="btn btn-primary mx-2">Add</button>
                          </div>
                        </div>
                    </form>                    
                    <div id="todo_items">
                        @foreach($items as $item)
                            <div class="todo_item">
                                <hr class="my-1">
                                  <ul class="list-group list-group-horizontal ">
                                    <li class="list-group-item d-flex align-items-center ps-0 pe-3 py-1 rounded-0 border-0">
                                      <div class="form-check">
                                        <input class="item_complete" type="checkbox" value="{{ $item->id }}">
                                      </div>
                                    </li>
                                    <li class="list-group-item px-3 py-1 d-flex align-items-center flex-grow-1 border-0">
                                      <p class="lead fw-normal mb-0 item-name">{{ $item->item }}</p>
                                    </li>
                                    <li class="list-group-item ps-3 pe-0 py-1 rounded-0 border-0">
                                      <div class="d-flex flex-row justify-content-end mb-1">
                                        <a href="#!" class="item_delete" data-id="{{ $item->id }}" class="text-danger"><i class="fas fa-trash-alt"></i></a>
                                      </div>
                                    </li>
                                  </ul>
                            </div>
                        @endforeach
                        @if(count($items) == 0)

                            <hr class="my-3">

                            <p>You do not have any items on your list</p>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

