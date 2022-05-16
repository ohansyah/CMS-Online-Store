  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

          <li class="nav-item">
              <a class="nav-link {{ Request::segment(2) == 'dashboard' ?: 'collapsed' }}" href="{{ route('dashboard') }}">
                  <i class="bi-grid"></i>
                  <span>Dashboard</span>
              </a>
          </li><!-- End Dashboard Nav -->

          <li class="nav-heading">Featured</li>
          <li class="nav-item">
              <a class="nav-link {{ Request::segment(2) == 'banner' ?: 'collapsed' }}" href="{{ route('banner.index') }}">
                  <i class="bi-badge-ad"></i>
                  <span>Banner</span>
              </a>
          </li><!-- End Profile Page Nav -->


          <li class="nav-heading">Master Data</li>
          <li class="nav-item">
              <a class="nav-link {{ Request::segment(2) == 'category' ?: 'collapsed' }}" href="{{ route('category.index') }}">
                  <i class="bi-columns-gap"></i>
                  <span>Category</span>
              </a>
          </li><!-- End Profile Page Nav -->

          <li class="nav-item">
              <a class="nav-link {{ Request::segment(2) == 'product' ?: 'collapsed' }}" href="{{ route('product.index') }}">
                  <i class="bi-box-seam"></i>
                  <span>Product</span>
              </a>
          </li><!-- End F.A.Q Page Nav -->
      </ul>

  </aside><!-- End Sidebar-->
