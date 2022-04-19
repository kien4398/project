@extends('frontend/master/master')
@section('main')
<div class="container ">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div>
                <h1 style="color: red">Tiêu đề: {{$post['title']}}</h1>
                <img width="600px" height="300px" src="uploads/{{$post['image']}}">
                <p style="margin-top:20px;">{!!$post['content']!!}</p>
            </div>
        </div>
    </div>
</div>
@endsection