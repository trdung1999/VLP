@section('title')
    Cập nhật sản phẩm
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
                                <li class="breadcrumb-item active"><a href="{{ route('products') }}">Danh sách sản phẩm</a></li>
                                <li class="breadcrumb-item active">Cập nhật sản phẩm</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Cập nhật sản phẩm</h4>
                    </div>
                    <div class="card-body">
                        <div class="general-label">
                            <form wire:submit.prevent="updateProduct">
                                <div class="form-group row">
                                    <label for="horizontalInput1" class="col-sm-2 col-form-label">Tên sản phẩm</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" wire:model="name" wire:keyup="generateSlug">
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="horizontalInput1" class="col-sm-2 col-form-label">Đường dẫn</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" wire:model="slug">
                                        @error('slug')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row" wire:ignore>
                                    <label for="horizontalInput2" class="col-sm-2 col-form-label">Mô tả sản phẩm</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" rows="20" id="short_description" wire:model="short_description"></textarea>
                                        @error('short_description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="horizontalInput1" class="col-sm-2 col-form-label">Giá sản phẩm</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" wire:model="price">
                                        @error('price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="horizontalInput1" class="col-sm-2 col-form-label">Số lượng</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" wire:model="quantity">
                                        @error('quantity')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="horizontalInput1" class="col-sm-2 col-form-label">SKU</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" wire:model="SKU">
                                        @error('SKU')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="horizontalInput1" class="col-sm-2 col-form-label">Hình ảnh</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" wire:model="new_image">
                                        @error('new_image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        @if ($new_image)
                                            <p>Hình ảnh sản phẩm:</p>
                                            <img src="{{ $new_image->temporaryUrl() }}" width="240">
                                        @else
                                            <p>Hình ảnh sản phẩm:</p>
                                            <img src="{{ asset('assets/images/shop') }}/{{ $image }}" width="240">
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="horizontalInput1" class="col-sm-2 col-form-label">Tình trạng</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" wire:model="stock_status">
                                            <option value="Còn hàng">Còn hàng</option>
                                            <option value="Hết hàng">Hết hàng</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="horizontalInput1" class="col-sm-2 col-form-label">Danh mục sản phẩm</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" wire:model="category_id">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="ml-auto col-sm-10">
                                        @if (Session::has('message'))
                                            <p class="text-success">{{ Session::get('message') }}</p>
                                        @endif
                                        <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
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
@push('scripts')
    <script>
        $(function(){
            tinymce.init({
                selector:'textarea#short_description',
                setup:function(editor){
                    editor.on('Change',function(e){
                        tinyMCE.triggerSave();
                        var data = $('#short_description').val();
                        @this.set('short_description',data);
                    })
                }
            });
        });
    </script>
@endpush
