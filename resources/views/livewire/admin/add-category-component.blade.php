@section('title')
    Thêm danh mục
@endsection
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Danh mục</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tổng quan</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('categories') }}">Danh sách danh mục</a></li>
                                <li class="breadcrumb-item active">Thêm danh mục</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @if (session('message'))
                    <p class="text-success">{{ Session::get('message') }}</p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Thêm danh mục sản phẩm</h4>
                    </div>
                    <div class="card-body">
                        <div class="general-label">
                            <form wire:submit.prevent="storeCategory">
                                <div class="form-group row">
                                    <label for="horizontalInput1" class="col-sm-2 col-form-label">Tên danh mục</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" wire:model="name" wire:keyup="generateslug" placeholder="Nhập tên danh mục sản phẩm">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="horizontalInput2" class="col-sm-2 col-form-label">Đường dẫn</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" wire:model="slug"  placeholder="Đường dẫn tự sinh ra nhưng bạn có thể chỉnh sửa tùy ý !">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="ml-auto col-sm-10">
                                        <button type="submit" class="btn btn-primary">Thêm danh mục</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>