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
                <form method="post" action="{{ route('book.store') }}"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <p><label>Tên sách</label></p>
                        <input type="text" class="form-control input-width" name="name"
                               placeholder="nhap ten sach" value="{{ old('name') }}"/>
                    </div>

                    <div class="form-group">
                        <p><label>Tác giả</label></p>
                        <input type="text" class="form-control input-width" name="author"
                               placeholder="Nhập ten tac gia" value="{{ old('author') }}"/>
                    </div>

                    <div class="form-group">
                        <p><label>Mô tả nội dung</label></p>
                        <textarea name="content" id="demo" class="form-control ckeditor" rows="3">
                                    {{ old('content') }}
                                </textarea>
                    </div>

                    <div class="form-group">
                        <p><label> Hình Ảnh</label></p>
                        <input type="file" class="form-control" name="image">
                    </div>

                    <div class="form-group">
                        <p><label>Năm xuất bản</label></p>
                        <input type="number" class="form-control input-width" name="year"
                               placeholder="Nhập nam xuat ban" value="{{ old('year') }}"/>
                    </div>

                    <div class="form-group">
                        <p><label>Số lượng</label></p>
                        <input type="number" class="form-control input-width" name="quantity"
                               placeholder="Nhập so luong" value="{{ old('quantity') }}"/>
                    </div>



                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                    </div>
                </form>
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