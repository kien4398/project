@extends('frontend/master/master')
@section('main')
<!-- Main -->
<div id="main" class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <!-- <ul id="menu" class="collapse">
                    @foreach($categories as $category)
                    <li><a href="/category/{{$category['id']}}">{{$category['name']}}</a></li>
                    @endforeach
                </ul> -->

            <div class="clear"></div>
            <div id="main-content" class="row">
                <div id="main-body" class="col-lg-8 col-md-12 col-sm-12">
                    <!-- Slider -->
                    <div id="slider">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="image/xe1.jpg" class="d-block w-100" width="200" height="400" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="image/xe2.jpg" class="d-block w-100" width="200" height="400" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="image/xe3.jpg" class="d-block w-100" width="200" height="400" alt="...">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <!-- End Slider -->
                    <!-- Product -->
                    <div id="product-f">
                        <h2>Bài viết nổi bật</h2>
                        @foreach($featured as $post)
                        <div class="card-deck">

                            <div class="card">
                                <a href="{{route('detail.slug',[$post['id'], Str::slug($post['title'])])}}"><img class="img-fluid" src="/uploads/{{$post['image']}}" alt="" /></a>
                                <div class="card-body">
                                    <h2>Tiêu đề: {{$post['title']}}</h2>
                                    <h3><a class="tran" href="{{route('detail.slug',[$post['id'], Str::slug($post['title'])])}}">{!!$post['content']!!}</a></h3>
                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>
                    <div id="product-new">
                        <h2>Bài viết mới</h2>

                        <div class="row">
                            @foreach($latest as $postnew)
                            <div class="col-lg-4 col-md-4 col-sm-12 pro-main">
                                <div class="product-item">
                                    <a href="{{route('detail.slug',[$postnew['id'], Str::slug($postnew['title'])])}}"><img class="img-fluid" src="/uploads/{{$postnew['image']}}" alt="" /></a>
                                    <h2>Tiêu đề: {{$postnew['title']}}</h2>
                                    <h3><a href="{{route('detail.slug',[$postnew['id'], Str::slug($postnew['title'])])}}">{!!$postnew['content']!!}</a></h3>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                    <!-- End Product -->
                </div>
                <div id="sidebar" class="col-lg-4 col-md-12 col-sm-12">
                    <a href="#"><img class="img-fluid" src="image/xe6.jpg" alt="" /></a>
                    <a href="#"><img class="img-fluid" src="image/xe5.jpg" alt="" /></a>
                    <a href="#"><img class="img-fluid" src="image/xe4.jpg" alt="" /></a>
                    <a href="#"><img class="img-fluid" src="image/xe3.jpg" alt="" /></a>
                    <a href="#"><img class="img-fluid" src="image/xe2.jpg" alt="" /></a>
                    <a href="#"><img class="img-fluid" src="image/xe1.jpg" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main -->
@endsection