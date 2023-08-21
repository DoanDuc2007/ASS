@extends('layout');
@section('content');
<div class="container">
    <div class="card" style="padding-top: 50px">
{{--        <div class="card-body">--}}
{{--            <div class="row m-b-30">--}}
{{--                <button class="btn btn-primary" >--}}
{{--                    <a href="{{route('categories.create')}}"> <span>Thêm Mới Danh Mục</span></a>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="table-responsive">
            <form action="{{ route('categories.store') }}" method="post">
                @csrf

                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                </div>

                <div class="mb-3 mt-3">
                    <label for="describe">Describe:</label>
                    <textarea class="form-control" rows="5" id="describe" name="describe"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
