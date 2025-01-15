@extends('theme.default')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Product</h1>
        <ol class="breadcrumb mb4">
            <li class="breadcrumb-item"><a href="/products">Product
                </a></li>
            <li class="breadcrumb-item active">Edit Data Product</li>
        </ol>
        <div class="card mc-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 shadow-sm rounded">
                            <div class="card-body">
                                <form action="{{ route('products.update', $product->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group mb-3">
                                        <label class="font-weightbold">IMAGE</label>
                                        <input type="file" class="formcontrol @error('image') is-invalid @enderror"
                                            name="image">
                                        <!-- error message untuk image -->
                                        @error('image')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="font-weightbold">TITLE</label>
                                        <input type="text" class="formcontrol @error('title') is-invalid @enderror"
                                            name="title" value="{{ old('title', $product->title) }}"
                                            placeholder="Masukkan Judul Product">
                                        <!-- error message untuk title -->
                                        @error('title')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="font-weightbold">DESCRIPTION</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5"
                                            placeholder="Masukkan Description Product">{{ old('description', $product->description) }}</textarea>
                                        <!-- error message untuk description -->
                                        @error('description')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="font-weightbold">PRICE</label>
                                                <input type="number"
                                                    class="form-control @error('price') is-invalid @enderror" name="price"
                                                    value="{{ old('price', $product->price) }}"
                                                    placeholder="Masukkan Harga Product">
                                                <!-- error message untuk price -->
                                                @error('price')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="font-weightbold">STOCK</label>
                                                <input type="number"
                                                    class="form-control @error('stock') is-invalid @enderror" name="stock"
                                                    value="{{ old('stock', $product->stock) }}"
                                                    placeholder="Masukkan Stock Product">
                                                <!-- error message untuk
                                                        stock -->
                                                @error('stock')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btnmd btn-primary me-3">UPDATE</button>
                                    <button type="reset" class="btn btn-md btn-warning">RESET</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('alertload')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.24.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
