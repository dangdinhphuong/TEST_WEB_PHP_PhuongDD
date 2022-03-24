@extends('layout')
@section('title', "Home")
@section('content')
<section class="section-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-grid-list">
                    <div class="row mt-30">
                        @foreach($Products as $Product)
                        <div class="col-sm-12 col-lg-4 col-md-6">
                            <!-- product card -->
                            <div class="product-item bg-light">
                                <div class="card">
                                    <div class="thumb-content">
                                        <!-- <div class="price">$200</div> -->
                                        <a href="#">
                                            <img class="card-img-top img-fluid" src="{{ asset("storage/$Product->image") }}" alt="{{$Product->name}}" style="height: 220px;">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="#">{{ number_format($Product->price, 0, '', ',')}} <i>VNĐ</i></a></h4>
                                        <ul class="list-inline product-meta">
                                            <li class="list-inline-item">
                                                <a href="#"><i class="fa fa-folder-open-o"></i><b>{{$Product->CateName}}</b></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#"><i class="fa fa-calendar"></i>26th December</a>
                                            </li>
                                        </ul>
                                        <b>{{$Product->name}}</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- pagination -->
                <div class="pagination justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="{{ route('home') . '?page=' . ($Products->currentPage()-1<1?$Products->currentPage():$Products->currentPage()-1 )}}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            @for($item=1;$item<=$Products->lastPage();$item++)
                                <li class="page-item  {{$item==$Products->currentPage()?'active':''}}">
                                    <a class="page-link" href="{{ route('home') . '?page=' . $item }}"> {{$item}}</a>
                                </li>
                                @endfor

                                <li class="page-item">
                                    <a disable class="page-link" href="{{ route('home') . '?page=' . ($Products->currentPage()+1<=$Products->lastPage()?$Products->currentPage()+1:$Products->lastPage() )}}" aria-label="Next">
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
    </div>
</section>
@endsection
@section('javascript')

@endsection