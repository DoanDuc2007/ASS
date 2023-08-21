@extends('layout')

@section('content')
    <div class="container" style="padding-top: 100px">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('brand.update', $model) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name"
                       value="{{ $model->name }}"
                       placeholder="Enter name"
                       name="name">
            </div>

            <div class="mb-3 mt-3">
                <label for="describe">Describe:</label>
                <textarea class="form-control" rows="5" id="describe"
                          name="describe">{{ $model->describe }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
