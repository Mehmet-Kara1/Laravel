@extends('layouts.default')
@section('content')


<div class="container">
    <h1>Ürün Düzenle</h1>
    <form action="{{route('products.update', $key )}}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="">Ürün Adı</label>
            <input type="text" class="form-control" value="{{$product['name']}}" name="name" required>
        </div>
        <div class="form-group">
            <label for="">Ürün Fiyatı</label>
            <input type="text" class="form-control"  value="{{$product['price']}}" name="price" required>
        </div>
        <button type="submit" class="btn btn-primary">Güncelle</button>
    </form>
</div>

@endsection