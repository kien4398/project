
<div id="header">
    <div class="container">
        <div class="row">
            <div id="logo" class="col-lg-4 col-md-4 col-sm-12">
                <a href="/"><img class="img-fluid" src="image/logo.png" width="200" height="400" alt="" /></a>
            </div>
            <div id="box-search" class="col-lg-8 col-md-8 col-sm-12">
                <form method="get" action="/search" class="form-inline">
                    <input name="keyword" class="form-control" type="search" placeholder="Tìm kiếm" aria-label="Search">
                    <button class="btn  my-2 my-sm-0" type="submit">Tìm kiếm</button>
                </form>
            </div>

            <div class="clear"></div>
        </div>
    </div>
    <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#menu" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</div>
<!-- <div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <ul id="menu" class="collapse">
                @foreach($categories as $category)
                    @if($category['parent'] == 0 )
                        <li id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$category['name']}}</li>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @foreach($categories as $children)
                                @if($children['parent'] == $category['id'])
                                    <a class="dropdown-item" href="/category/{{$children['id']}}">{{$children['name']}}</a>
                                @endif
                            @endforeach
                         </div>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div> -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <ul id="menu" class="nav navbar-nav">
                        @foreach($categories as $category)
                            @if($category['parent'] == 0 )
                                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">{{$category['name']}}</a>
                                    <ul class="dropdown-menu">
                                        @foreach($categories as $children)
                                            @if($children['parent'] == $category['id'])
                                                <li><a href="/category/{{$children['id']}}">{{$children['name']}}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>