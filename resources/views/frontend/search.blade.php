@extends('frontend/master/master')
@section('main')
<h1 style="color:red;text-align:center;margin-top:10px">Kết quả tìm kiếm với: {{$keyword}}</h1>
<div class="container">
    <div class="row">
        @foreach($posts as $post)
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="product-item card text-center">
                <a href="/{{$post['title']}}.html"><img src="uploads/{{$post->image}}"></a>
                <h2>Tiêu đề: {{$post->title}}</h2>
                <h4><a href="/{{$post['title']}}.html">{!!$post->content!!}</a></h4>
                <div>Tác giả:</div><a href="">{{$post->user->userName}}</a>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            {{$posts->links("pagination::bootstrap-4")}}
        </div>
    </div>
</div>
@endsection