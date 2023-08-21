@extends('layout')

@section('content')
    <div class="page-header">
        <h1 style=" text-align: right;padding-top: 100px">
            <a href="{{ route('product.create') }}"
               class="btn btn-primary">Thêm mới danh mục</a>
        </h1>
    </div>
    <div class="table-responsive">
        <table class="table table-hover e-commerce-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Brand</th>
                <th>Category</th>
                <th>Price</th>
                <th>Describe</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td> <img width="70px" src="{{ asset($item->img) }}" alt=""></td>
                    <td>{{ $item->brand_id}}</td>
                    <td>{{ $item->category_id }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->describe }}</td>
                    {{--                    <td>{{ $item->created_at }}</td>--}}
                    {{--                    <td>{{ $item->updated_at }}</td>--}}
                    <td>
                        <a class="btn btn-success" href="{{ route('product.edit', $item) }}">Sửa</a>

                        <button class="btn btn-danger"
                                onclick="document.getElementById('item-{{ $item->id }}').submit();">Xóa</button>

                        <form action="{{ route('product.destroy', $item) }}"
                              id="item-{{ $item->id }}"
                              method="post">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
    </div>
@endsection
