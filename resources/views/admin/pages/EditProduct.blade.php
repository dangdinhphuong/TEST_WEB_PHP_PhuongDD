@extends('layout')
@section('title', "Quản lí thể loại")
@section('content')
<section class="user-profile section">
    <div class="container">
        <div class="row">

            <div class="col-md-10 offset-md-1 col-lg-12 offset-lg-0">
                <!-- Edit Profile Welcome Text -->
                <div class="widget welcome-message">
                    <h2>Add products</h2>

                </div>
                <!-- Edit Personal Info -->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="widget personal-info">
                            <h3 class="widget-header user">More product information</h3>
                            <form action="{{route('admin.products.update',['id'=>$Products->id])}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!-- First Name -->
                                <div class="form-group">
                                    <label for="first-name">Product Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$Products->name}}" id="first-name">
                                    <code> {{ $errors->first('name') }} </code>
                                </div>
                                <!-- Last Name -->
                                <div class="input-group mb-3 form-group">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Category</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01" name="category_id">
                                        
                                        @foreach($Categories as $Categorie)
                                        <option value="{{$Categorie->id}}" {{$Categorie->id==$Products->category_id ? "selected":""}}>{{$Categorie->name}}</option>
                                        @endforeach
                                    </select>
                                    <code> {{ $errors->first('category_id') }} </code>
                                </div>
                                <!-- File chooser -->
                                <div class="form-group choose-file d-inline-flex">
                                    <i class="fa fa-user text-center px-3"></i>
                                    <input type="file" class="form-control-file mt-2 pt-1" id="input-file" name="image">
                                    <img style="width: 50px; height: 50px" src="{{ asset("storage/$Products->image") }}" alt="">
                                    <code> {{ $errors->first('image') }} </code>
                                </div>
                                <!-- Comunity Name -->
                                <div class="form-group">
                                    <label for="comunity-name">Price (VNĐ)</label>
                                    <input type="number" class="form-control" value="{{$Products->price}}" id="comunity-name" name="price" step="0.01">
                                    <code> {{ $errors->first('price') }} </code>
                                </div>
                                <!-- Checkbox -->
                                <div class="form-group">
                                    <label for="zip-code">Amount</label>
                                    <input type="number" class="form-control" value="{{$Products->amount}}" id="zip-code" name="amount">
                                    <code> {{ $errors->first('amount') }} </code>
                                </div>

                                <div class="form-check">
                                    <label class="form-check-label" for="hide-profile">
                                        <input class="form-check-input mt-1" name="status" type="checkbox" id="hide-profile"{{$Products->status==\App\Common\Constants::ENABLED? "checked" :''}}>
                                        Active
                                    </label>

                                </div>
                                <!-- Zip Code -->

                                <!-- Submit button -->
                                <button class="btn btn-transparent">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('javascript')

@endsection