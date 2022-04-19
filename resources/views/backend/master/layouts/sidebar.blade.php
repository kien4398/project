<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu">
        <li class="{{request()->is('admin') ? 'active' : ''}}"><a href="/admin"><svg class="glyph stroked dashboard-dial">
                    <use xlink:href="#stroked-dashboard-dial"></use>
                </svg> Dashboard</a></li>
        <li class="{{request()->segment(2) == 'user' ? 'active' : ''}}"><a href="/admin/user"><svg class="glyph stroked male user ">
                    <use xlink:href="#stroked-male-user" />
                </svg>Quản lý user</a></li>
        <li class="{{request()->segment(2) == 'posts' ? 'active' : ''}}"><a href="/admin/posts"><svg class="glyph stroked two messages">
                    <use xlink:href="#stroked-two-messages" />
                </svg> Quản lý bài viết</a></li>
        <!-- <li class="{{request()->is('admin/category') ? 'active' : ''}}"><a href="/admin/category"><svg class="glyph stroked open folder">
                    <use xlink:href="#stroked-open-folder" />
                </svg>Quản lý danh mục</a></li> -->
    </ul>

</div>
<!--/.sidebar-->