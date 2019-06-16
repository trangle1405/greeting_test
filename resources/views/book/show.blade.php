@extends('home')
@section('title', 'Thêm mới khách hàng')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Thêm mới khách hàng</h1>
            </div>
            <div class="col-12">
                <p style='color:green'>{{ (isset($success)) ? $success : '' }}</p>
                    <div class="form-group">
                        <p><label>Tên sách</label></p>
                        <p>{{$book->name}}</p>
                    </div>

                    <div class="form-group">
                        <p><label>Tác giả</label></p>
                        <input type="text" class="form-control input-width" name="author"
                               placeholder="Nhập ten tac gia" value="{{ $book->author }}"/>
                    </div>

                    <div class="form-group">
                        <p><label>Mô tả nội dung</label></p>
                        <textarea name="content" id="demo" class="form-control ckeditor" rows="3">
                                    {{$book->content }}
                                </textarea>
                    </div>

                    <div class="form-group">
                        <p><label> Hình Ảnh</label></p>
                        <img width="100px" src="{{asset('storage/images/'. $book->image)}}">
                    </div>

                    <div class="form-group">
                        <p><label>Năm xuất bản</label></p>
                        <input type="number" class="form-control input-width" name="year"
                               placeholder="Nhập nam xuat ban" value="{{ $book->year }}"/>
                    </div>

                    <div class="form-group">
                        <p><label>Số lượng</label></p>
                        <input type="number" class="form-control input-width" name="quantity"
                               placeholder="Nhập so luong" value="{{$book->quantity }}"/>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                    </div>
                <div class="error-message">
                    @if ($errors->any())
                        @foreach($errors->all() as $nameError)
                            <p style="color:red">{{ $nameError }}</p>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection