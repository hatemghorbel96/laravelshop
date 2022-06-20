@extends('welcome')
@section('content')
</div>
<section class="food_section layout_padding">
    <div class="container">
    <form action="/product/add" method="POST">
        @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">name</label>
    <input type="text" name="name" class="form-control"  placeholder="name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">description</label>
    <input type="text" name="description" class="form-control"  placeholder="description">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">price</label>
    <input type="text" name="price" class="form-control"  placeholder="price">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">quantity</label>
    <input type="text" name="quantity" class="form-control"  placeholder="quantity">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">category</label>
    <input type="text" name="category" class="form-control"  placeholder="category">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">type</label>
    <input type="text" name="type" class="form-control"  placeholder="type">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">image</label>
    <input type="text" name="image" class="form-control"  placeholder="image">
  </div>
  <button type="submit" class="btn btn-primary btn-block">add product</button>
</form>
	
    </div>
  </section>

  @endsection