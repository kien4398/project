<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <br>
    <div>
        @lang('admin-sidebar.Language'):
        <a href="{{Route('langVi')}}">vi <img width="15px" height="10px" src="/flag/vi.png"></a>
        |
        <a href="{{Route('langEn')}}">en <img width="15px" height="10px" src="/flag/en.png"></a>
    </div>
    <br>
    <ul class="nav menu">
        <li class="{{request()->is('admin') ? 'active' : ''}}"><a href="/admin"><svg class="glyph stroked dashboard-dial">
                    <use xlink:href="#stroked-dashboard-dial"></use>
                </svg> @lang('admin-sidebar.Dashboard')</a></li>
        <li class="{{request()->segment(2) == 'user' ? 'active' : ''}}"><a href="/admin/user"><svg class="glyph stroked male user ">
                    <use xlink:href="#stroked-male-user" />
                </svg>@lang('admin-sidebar.User')</a></li>
        <li class="{{request()->segment(2) == 'posts' ? 'active' : ''}}"><a href="/admin/posts"><svg class="glyph stroked two messages">
                    <use xlink:href="#stroked-two-messages" />
                </svg> @lang('admin-sidebar.Post')</a></li>
        <li class="{{request()->segment(2) == 'role' ? 'active' : ''}}"><a href="/admin/role"><svg class="glyph stroked gear">
                    <use xlink:href="#stroked-gear" />
                </svg>
                @lang('admin-sidebar.Role') </a></li>
        <li class="{{request()->segment(2) == 'permission' ? 'active' : ''}}"><a href="/admin/permission"><svg class="glyph stroked clipboard with paper">
                    <use xlink:href="#stroked-clipboard-with-paper" />
                </svg>
                @lang('admin-sidebar.Permission') </a></li>
        <!-- <li class="{{request()->is('admin/category') ? 'active' : ''}}"><a href="/admin/category"><svg class="glyph stroked open folder">
                    <use xlink:href="#stroked-open-folder" />
                </svg>Quản lý danh mục</a></li> -->
        <li class="{{request()->segment(2) == 'comment' ? 'active' : ''}}"><a href="/admin/comment"><svg class="glyph stroked gear">
                    <use xlink:href="#stroked-gear" />
                </svg>
                @lang('admin-sidebar.Comment')</a></li>
    </ul>

</div>
<!--/.sidebar-->