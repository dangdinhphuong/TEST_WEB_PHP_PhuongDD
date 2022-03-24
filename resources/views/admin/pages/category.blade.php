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
                    <h3 class="widget-header">My Category</h3>
                    <table class="table table-responsive product-dashboard-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>CATEGORY NAME</th>
                                <th class="text-center">STATUS</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Categories as $Categorie)
                            <tr>

                                <td class="product-thumb">
                                    <span class="categories"> {{$Categorie->id}}</span>
                                </td>
                                <td class="product-details">
                                    <h3 class="title"> {{$Categorie->name}}</h3>
                                </td>
                                <td class="product-category">
                                    <span class="categories {{$Categorie->status==\App\Common\Constants::DISABLE?'text-danger':'text-success'}}">
                                        {{\App\Common\Constants::STATUS_TEXT[$Categorie->status]}}</span>
                                </td>
                                <td class="action" data-title="Action">
                                    <div class="">
                                        <ul class="list-inline justify-content-center">
                                            <li class="list-inline-item">
                                                <a data-toggle="tooltip" data-placement="top" title="Add category" class="view" href="{{ route('admin.categories.create') }}">
                                                    <i class="fa fa-plus-circle"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a class="edit" data-toggle="tooltip" data-placement="top" title="Edit" href="{{route('admin.categories.edit',['id'=>$Categorie->id])}}">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a class="delete" data-toggle="tooltip" onclick="return confirm('Are you sure to delete?')" data-placement="top" title="Delete" href="{{route('admin.categories.delete',['id'=>$Categorie->id])}}">
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
                                <a class="page-link" href="{{ route('admin.categories.index') . '?page=' . ($Categories->currentPage()-1<1?$Categories->currentPage():$Categories->currentPage()-1 )}}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            @for($item=1;$item<=$Categories->lastPage();$item++)
                                <li class="page-item  {{$item==$Categories->currentPage()?'active':''}}">
                                    <a class="page-link" href="{{ route('admin.categories.index') . '?page=' . $item }}"> {{$item}}</a>
                                </li>
                                @endfor

                                <li class="page-item">
                                    <a disable class="page-link" href="{{ route('admin.categories.index') . '?page=' . ($Categories->currentPage()+1<=$Categories->lastPage()?$Categories->currentPage()+1:$Categories->lastPage() )}}" aria-label="Next">
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