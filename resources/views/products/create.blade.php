@extends('layouts.default')
@section('content')

<div class="container">
    <h1>Ürün Ekle <a href="{{route('products.index')}}" class="btn btn-success">Ürünler</a> </h1>
    <form action="{{route('products.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="">Ürün Adı</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <label for="">Ürün Fiyatı</label>
            <input type="text" class="form-control" name="price" required>
        </div>
        <button type="submit" class="btn btn-primary">Ekle</button>
    </form>
</div>
@endsection