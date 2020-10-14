@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if (Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                        All Foods
                        <a href="{{ route('food.create') }}" class="float-right">
                            <button class="btn btn-outline-success">Add Food</button>
                        </a>

                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Category</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if(count($foods) > 0)
                                @foreach ($foods as $key => $food)
                                    <tr>
                                    <td><img src="{{ asset('images')}}/{{ $food->image}}" width="100" height="70"></td>
                                    <td>{{$food->name}}</td>
                                    <td>{{$food->description}}</td>
                                    <td>{{$food->price}}</td>
                                    <td>{{$food->category->name}}</td>
                                    <td>
                                        <a href="{{ route('food.edit', [$food->id]) }}">
                                            <button class="btn btn-outline-success">Edit</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="">
                                            <form action="{{ route('food.destroy',[$food->id]) }}" method="post">
                                                @csrf
                                                {{ @method_field('DELETE') }}

                                                <button class="btn btn-outline-danger" onclick="return confirm('Are You Sure? Want to Delete It.');">Delete</button>
                                            </form>
                                        </a>
                                    </td>
                                    </tr>
                                @endforeach
                            @else
                            <td>No food to display</td>
                          @endif
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
