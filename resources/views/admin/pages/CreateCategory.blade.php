@extends('layout')
@section('title', "Quản lí thể loại")
@section('content')
<section class="login py-5 border-top-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 align-item-center">
                <div class="border">
                <h3 class="bg-gray p-4">Add category</h3>
                    <form action="{{route('admin.categories.store')}}" method="post">
                    @csrf
                        <fieldset class="p-4">
                            <input type="text" placeholder="Category Name" name="name" class="border p-3 w-100 my-2">
                            <code> {{ $errors->first('name') }} </code>
                            <div class="loggedin-forgot">
                                    <input type="checkbox" name="status" id="keep-me-logged-in">
                                    <label for="keep-me-logged-in" class="pt-3 pb-2">Active</label>
                            </div>
                            <button type="submit" class="d-block py-3 px-5 bg-primary text-white border-0 rounded font-weight-bold mt-3">Submit</button>
                            <a class="mt-3 d-block  text-primary" href="#">Back</a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('javascript')

@endsection