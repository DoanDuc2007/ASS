@extends('layout')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

{{--    @if(session()->has('msg'))--}}
{{--        <div class="alert--}}
{{--            @if(session()->get('status') == \Illuminate\Http\Response::HTTP_OK)--}}
{{--                alert-success--}}
{{--            @else--}}
{{--                alert-danger--}}
{{--            @endif--}}
{{--         ">--}}
{{--            <p>{{ session()->get('msg') }}</p>--}}
{{--        </div>--}}
{{--    @endif--}}
    <div class="page-header">
        <h1 style=" text-align: right;padding-top: 100px">
            <a href="{{ route('categories.create') }}"
               class="btn btn-primary">Thêm mới danh mục</a>
        </h1>
    </div>
    <div class="table-responsive">
        <table class="table table-hover e-commerce-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Describe</th>
{{--                <th>Create date</th>--}}
{{--                <th>Update date</th>--}}
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->describe }}</td>
{{--                    <td>{{ $item->created_at }}</td>--}}
{{--                    <td>{{ $item->updated_at }}</td>--}}
                    <td>
                        <a class="btn btn-success" href="{{ route('categories.edit', $item) }}">Sửa</a>

                        <button class="btn btn-danger"
                                onclick="document.getElementById('item-{{ $item->id }}').submit();">Xóa</button>

                        <form action="{{ route('categories.destroy', $item) }}"
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
