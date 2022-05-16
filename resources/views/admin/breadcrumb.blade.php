<div class="pagetitle">
    <h1>{{ $breadcrumb['title'] }}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a
                    href="{{ route($breadcrumb['route']) }}">{{ $breadcrumb['title'] }}</a>
            </li>
            @isset ($breadcrumb['subtitle'])
                <li class="breadcrumb-item active">{{ $breadcrumb['subtitle'] }}</li>
            @endisset
        </ol>
    </nav>
</div><!-- End Page Title -->
