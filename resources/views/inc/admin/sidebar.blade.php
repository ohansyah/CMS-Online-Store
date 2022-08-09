  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
      <ul class="sidebar-nav" id="sidebar-nav">

          @foreach ($Menus as $menu)
              @if ($menu->type == 'menu')
                  <li class="nav-item">
                      <a class="nav-link {{ Request::segment(2) == $menu->route_segment_2 ?: 'collapsed' }}"
                          href="{{ route($menu->route) }}">
                          <i class="{{ $menu->icon }}"></i>
                          <span class="title">{{ $menu->name }}</span>
                      </a>
                  </li>
              @elseif ($menu->type == 'header')
                  <li class="nav-heading">{{ $menu->name }}</li>
              @endif
          @endforeach

      </ul>
  </aside><!-- End Sidebar-->
