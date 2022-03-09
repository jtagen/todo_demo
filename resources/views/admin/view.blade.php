


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $user->name }}'s To-Do Items</div>

                <div class="card-body">



                    <div id="todo_items">
                        @foreach($items as $item)
                            <div class="todo_item">
                                <hr class="my-1">
                                  <ul class="list-group list-group-horizontal ">
                                    <li class="list-group-item px-3 py-1 d-flex align-items-center flex-grow-1 border-0">
                                      <p class="lead fw-normal mb-0 item-name">{{ $item->item }}</p>
                                    </li>
                                    <li class="list-group-item ps-3 pe-0 py-1 rounded-0 border-0">
                                      <div class="d-flex flex-row justify-content-end mb-1">
                                        @if ($item->is_deleted)
                                            deleted
                                        @endif
                                        @if ($item->is_complete)
                                            completed
                                        @endif
                                        
                                      </div>
                                    </li>
                                  </ul>
                            </div>
                        @endforeach
                        @if(count($items) == 0)

                            <hr class="my-3">

                            <p>No items on list</p>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
