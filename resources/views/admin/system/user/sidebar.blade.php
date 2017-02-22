<div class="sidebar responsive" id="sidebar" data-sidebar="true" data-sidebar-scroll="true" data-sidebar-hover="true">
  <script type="text/javascript">
    try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
  </script>

  <div id="sidebar-shortcuts" class="sidebar-shortcuts">
    <div id="sidebar-shortcuts-large" class="sidebar-shortcuts-large">
      <button class="btn btn-success">
        <i class="ace-icon fa fa-signal"></i>
      </button>

      <button class="btn btn-info">
        <i class="ace-icon fa fa-pencil"></i>
      </button>

      <!-- #section:basics/sidebar.layout.shortcuts -->
      <button class="btn btn-warning">
        <i class="ace-icon fa fa-users"></i>
      </button>

      <button class="btn btn-danger">
        <i class="ace-icon fa fa-cogs"></i>
      </button>

      <!-- /section:basics/sidebar.layout.shortcuts -->
    </div>

    <div id="sidebar-shortcuts-mini" class="sidebar-shortcuts-mini">
      <span class="btn btn-success"></span>
      <span class="btn btn-info"></span>
      <span class="btn btn-warning"></span>
      <span class="btn btn-danger"></span>
    </div>
  </div><!-- /.sidebar-shortcuts -->

  <ul class="nav nav-list" style="top: 0px;" data-pjax>
    @foreach(Config::get('menu.usermenu') as $key => $menu)
      @if(empty($menu['permission']) || Entrust::can($menu['permission'], false))
      <li class="@if($global->uri == $key) active @endif @if(!empty($menu['children']) && in_array($global->uri, array_keys($menu['children']))) open @endif">
        <a href="{{ $menu['url'] }}" @if(!empty($menu['children']))class="dropdown-toggle"@endif>
          <i class="menu-icon {{ $menu['icon'] }}"></i>
          <span class="menu-text">{{ $menu['display'] }}</span>
        </a>
        <b class="arrow"></b>
        @if(!empty($menu['children']))
        <ul class="submenu">
          @foreach($menu['children'] as $k => $submenu)
            @if(Entrust::can($submenu['permission'], true))
            <li @if($global->uri == $k) class="active" @endif>
              <a href="{{ $submenu['url'] }}"><i class="menu-icon fa fa-caret-right"></i>{{ $submenu['display'] }}</a>
              <b class="arrow"></b>
            </li>
            @endif
          @endforeach
        </ul>
        @endif
      </li>
      @endif
    @endforeach
    <li>
      <a href="/logout">
        <i class="menu-icon fa fa-power-off"></i>
        <span class="menu-text"> 注销 </span>
      </a>
      <b class="arrow"></b>
    </li>
  </ul>
  <!-- /.nav-list -->

  <!-- #section:basics/sidebar.layout.minimize -->
  <div id="sidebar-collapse" class="sidebar-toggle sidebar-collapse">
    <i data-icon2="ace-icon fa fa-angle-double-right" data-icon1="ace-icon fa fa-angle-double-left" class="ace-icon fa fa-angle-double-left"></i>
  </div>

  <!-- /section:basics/sidebar.layout.minimize -->
  <script type="text/javascript">
    try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
  </script>
</div>