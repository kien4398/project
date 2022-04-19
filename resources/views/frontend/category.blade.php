@extends('frontend/master/master')
<base href="../">
@section('main')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h1 style="color:red;">Danh Mục: {{$category['name']}} </h1>
            @foreach($post as $item)
                <h2 style="color:#8B0000 ;" >Tiêu đề: {{$item->title}}</h2>
                <a href="/{{$item->title}}.html"><img width="400" height="300" src="/uploads/{{$item->image}}" alt=""></a>
                <p style="margin:20px 0">Nội dung: {!!$item->content!!}</p>
            @endforeach
        </div>
    </div>
</div>
@endsection