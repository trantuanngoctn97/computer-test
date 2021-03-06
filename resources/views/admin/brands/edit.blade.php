@extends('admin.layouts.dashboard')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chỉnh sửa hãng</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Chỉnh sửa</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <form action="{{ route('admin.brands.update', ['id' => $brand->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    @method('PUT')
                <div class="card-body">
                    <!--Main form-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                @foreach ($errors->all() as $error)
                                <label class="text text-danger">{{$error}}</label> <br>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="code">Mã hãng</label>
                            <input name="code" value="{{$brand->code}}" type="text" class="form-control" id="code" placeholder="Mã hãng">
                            </div>
                            <div class="form-group">
                                <label for="image">Ảnh đại diện</label>
                                <div class=" upload-image">
                                    <img src="{{asset($brand->image)}}" alt="">
                                    <input name="image" type="file" id="picture" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Tên hãng</label>
                                <input name="name" value="{{$brand->name}}" type="text" class="form-control" id="name" placeholder="Tên hãng">
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <!--Button -->
                    <div class="row">
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <a href="{{ route('admin.brands.index') }}">
                                <button type="button" class="btn  btn-danger">Hủy bỏ</button>
                            </a>
                        </div>
                    </div>
                    <!--End Button -->
                </div>
                </form>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push('scripts')
    <script>
        $('#picture').change(function(e){
            console.log(this.files);
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.upload-image img').attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            }else{
                $('.upload-image img').attr('src', '{{asset('images/480x300.png')}}');
            }
        });
    </script>
@endpush
