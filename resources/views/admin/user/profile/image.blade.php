<div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

    <img src="{{ $user->image_url }}" alt="Profile" class="rounded-circle">
    <h2>{{ $user->name }}</h2>
    <h3>{{ $user->email }}</h3>

    <div class="social-links mt-2">
        @if ($user->social_media)
            @foreach ($user->social_media as $value)
                <a target="_blank" href={{ $value->link }} class="{{ $value->class }}"><i class="{{ $value->icon }}"></i></a>
            @endforeach
        @endif
    </div>
</div>
