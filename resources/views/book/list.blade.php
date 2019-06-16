@extends('home')
@section('title', 'Danh sách khách hàng')

@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h1>Quan ly sach</h1>
            </div>
            <div class="col-12">

                <div class="row">
                    <div class="col-6">
                        @if (Session::has('success'))
                            <p class="text-success">
                                <i class="fa fa-check" aria-hidden="true"></i>
                                {{ Session::get('success') }}
                            </p>
                        @endif

                    </div>

                    {{--                    tim kiem theo ten--}}

                    <div class="col-6">
                        <form class="navbar-form navbar-left" action="{{ route('book.search') }}" method="get">
                            @csrf
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="keyword" placeholder="Search"
                                               value="{{ (isset($_GET['keyword'])) ? $_GET['keyword'] : '' }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-default">Tìm kiếm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{--                bang danh sach khach hang--}}
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên</th>
                    <th scope="col">tac gia</th>
                    <th scope="col">Hinh anh</th>
                    <th scope="col">Nam xuat ban</th>
                    <th scope="col">So luong</th>
                    <th scope="col">Sua</th>
                    <th scope="col">Xoa</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($book) == 0)
                    <tr>
                        <td colspan="7" class="text-center">Không có dữ liệu</td>
                    </tr>
                @else
                    @foreach($book as $key=>$value)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td><a href="{{route('book.show', $value->id)}}">{{ $value->name }}</a></td>
                            <td>{{ $value->author }}</td>
                            <td><img width="100px" src="{{asset('storage/images/'. $value->image)}}"></td>
                            <td>{{ $value->year }}</td>
                            <td>{{ $value->quantity }}</td>
                            <td><a href="{{ route('book.edit', $value->id) }}">sửa</a></td>
                            <td><a href="{{ route('book.destroy', $value->id) }}" class="text-danger"
                                   onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <a class="btn btn-primary" href="{{ route('book.create') }}">Thêm mới</a>
                    </div>
                    <div class="col-6">
                        <div class="pagination float-right">
                            {{ $book->appends(request()->query()) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection