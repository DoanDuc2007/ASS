@extends('layout');
@section('content');
<div class="container">
    <div class="card" style="padding-top: 50px">
        <form action=" {{ route('product.store') }}" method="post"  enctype="multipart/form-data">
            @csrf

            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
            </div>
            <div class="mb-3 mt-3">
                <label for="img">Image:</label>
                <input type="file" class="form-control" id="img" name="img">
            </div>
            <div class="mb-3 mt-3">
                <label for="brand">Brand:</label> <br>
                <select class="form-control" aria-label="Default select example" name="brand_id" id="brand_id">
                    <option selected>Open this select menu</option>
                    @foreach($model as $item)
                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 mt-3">
                <label for="category">Category:</label>
                <select class="form-control" aria-label="Default select example" name="category_id">
                    <option selected>Open this select menu</option>
                    @foreach($data as $item)
                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 mt-3">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" name="price">
            </div>
            <div class="mb-3 mt-3">
                <label for="describe">Describe:</label>
                <textarea class="form-control" rows="5" id="describe" name="describe"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        {{--        </div>--}}
        {{--    </div>--}}
        {{--</div>--}}
    </div>
</div>

@endsection
