@extends('layout')
@section('title', "Quản lí thể loại")
@section('content')
<section class="dashboard section">
    <!-- Container Start -->
    <div class="container">
        <!-- Row Start -->
        <div class="row">
            <div class="col-md-12 col-lg-12 ">
                <!-- Recently Favorited -->
                <div class="widget dashboard-container my-adslist">
                    <h3 class="widget-header">My Products</h3>
                    <table class="table table-responsive product-dashboard-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>IMAGE</th>
                                <th>CATEGORY</th>
                                <th>NAME</th>
                                <th>PRICE </th>
                                <th>AMOUNT</th>
                                <th class="text-center">STATUS</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Products as $Product)
                            <tr>

                                <td class="product-thumb">
                                    <span class="categories"> {{$Product->id}}</span>
                                </td>
                                <td class="product-thumb">
                                <img style="width: 50px; height: 50px" src="{{ asset("storage/$Product->image") }}"
                            alt="">
                                </td>
                                <td class="product-thumb">
                                    <h3 class="title"> {{$Product->category->name}}</h3>
                                </td>
                                <td class="product-thumb">
                                    <h3 class="title"> {{$Product->name}}</h3>
                                </td>
                                <td class="product-thumb">
                                    <h3 class="title"> {{$Product->price}}</h3>
                                </td>
                                <td class="product-thumb">
                                    <h3 class="title"> {{$Product->amount}}</h3>
                                </td>
                                <td class="product-category">
                                    <span class="categories {{$Product->status==\App\Common\Constants::DISABLE?'text-danger':'text-success'}}">
                                        {{\App\Common\Constants::STATUS_TEXT[$Product->status]}}</span>
                                </td>
                                <td class="action" data-title="Action">
                                    <div class="">
                                        <ul class="list-inline justify-content-center">
                                            <li class="list-inline-item">
                                                <a data-toggle="tooltip" data-placement="top" title="Add category" class="view" href="{{ route('admin.products.create') }}">
                                                    <i class="fa fa-plus-circle"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a class="edit" data-toggle="tooltip" data-placement="top" title="Edit" href="{{route('admin.products.edit',['id'=>$Product->id])}}">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a class="delete" data-toggle="tooltip" onclick="return confirm('Are you sure to delete?')" data-placement="top" title="Delete" href="{{route('admin.products.delete',['id'=>$Product->id])}}">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

                <!-- pagination -->
                <div class="pagination justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="{{ route('admin.products.index') . '?page=' . ($Products->currentPage()-1<1?$Products->currentPage():$Products->currentPage()-1 )}}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            @for($item=1;$item<=$Products->lastPage();$item++)
                                <li class="page-item  {{$item==$Products->currentPage()?'active':''}}">
                                    <a class="page-link" href="{{ route('admin.products.index') . '?page=' . $item }}"> {{$item}}</a>
                                </li>
                                @endfor

                                <li class="page-item">
                                    <a disable class="page-link" href="{{ route('admin.products.index') . '?page=' . ($Products->currentPage()+1<=$Products->lastPage()?$Products->currentPage()+1:$Products->lastPage() )}}" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                        </ul>
                    </nav>
                </div>

                <!-- pagination -->

            </div>
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</section>
@endsection
@section('javascript')

@endsection