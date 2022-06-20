@extends('welcome')
@section('content')
</div>
<section class="food_section layout_padding">
    <div class="container">
    <form action="/category/add" method="POST">
        @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Category name</label>
    <input type="text" name="name" class="form-control"  placeholder="category name">
  </div>
  <button type="submit" class="btn btn-primary">add</button>
</form>
	
    </div>
  </section>

  @endsection