@extends('layouts.app')
@section('title', 'Edit Todo')
@section('content')
    <div class="container pt-5">
      <div class="row justify-content-center mt-5" >
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h1 class="text-center">Edit Todo</h1>
            </div>
            <div class="card-body">
              
              @if ($errors->any())
              <div class="alert alert-danger">
             <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
              <form action="/todos/{{ $todo->id }}" method="POST">
                @csrf
                <div class="mb-3">
                  <input type="text" class="form-control" name="todoTitle" placeholder=" Enter Todo Title" value="{{ $todo->title }}">
                  {{-- @error('todoTitle')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror --}}
                </div>
                <div class="form-floating">
                  <textarea name="todoDescription" class="form-control" placeholder="Enter todo Description" id="floatingTextarea"  >{{ $todo->description }}</textarea>
                  {{-- @error('todoDescription')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror --}}
                </div>
                <div class="mb-3 text-center">
                <button type="submit"
                 class="btn btn-success  mt-3" 
                 style="width:40%"
                 >
                 Update</button></div>
              </form>
             
                
            </div>
          </div>
        </div>
      </div>
    </div>





@endsection