@vite('resources/css/app.css')

{{-- <x-layout-admin>
    <x-slot:title>
        Thêm Banner
    </x-slot:title>
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản Lý Banner</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Quản lý banner</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 text-right">
                     
                        <a href="{{route('banner.index')}}" class="btn btn-sm btn-warning">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
               
                    <form action="{{ route('banner.update',['id'=>$banner->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="mb-3">
                                    <label>Tên banner (*)</label>
                                    <input type="text" name="name" id="name" placeholder="Nhập tên banner"value="{{ old('name',$banner->name) }}"
                                        class="form-control">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </div> 
                                <div class="mb-3">
                                    <label>Liên kết</label>
                                    <input type="text" name="link" id="link" placeholder="Nhập link" class="form-control" value="{{ old('link',$banner->link) }}"> 
                                </div>
                                 <div class="mb-3">
                                    <label for="description">Mô tả (*)</label>
                                    <textarea type="text" id="description" name="description" id="description" placeholder="Nhập mô tả danh mục"
                                        class="form-control" onkeydown="handle_slug(this.value);"value="">{{ old('description',$banner->description) }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="image">Position</label>
                                    <input type="text" name="position" id="position" value="{{ old('position',$banner->position) }}"
                                        class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="image">Hình ảnh</label>
                                    <input type="file" name="image" id="image" placeholder="Nhập Image"
                                        class="form-control">
                                </div>
                       
                                 <div class="mb-3">
                            <label>Sắp xếp</label>
                            <select name="sort_order" class="form-control">
                                <option value="0">Chọn vị trí </option>
                                      {!!$htmlsortorder!!}
                            </select>
                        </div> 
                                <div class="mb-3">
                                    <label for="status">Trạng thái</label>
                                    <select name="status" id="status" class="form-control">
                                    <option value="1" {{($banner->status==1)?'selected':''}}>Xuất bản</option>
                                    <option value="2" {{($banner->status==2)?'selected':''}}>Chưa xuất bản</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-sm btn-success">
                                    Cập nhật
                                </button>
                            </form>
                         
        </div>
    </section>
</div>
</x-layout-admin> --}}

<div>eit</div>