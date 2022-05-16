<div class="card-body pt-3">
    <!-- Bordered Tabs -->
    <ul class="nav nav-tabs nav-tabs-bordered">

        <li class="nav-item">
            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                Profile</button>
        </li>

        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change
                Password</button>
        </li>

    </ul>
    <div class="tab-content pt-2">

        <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">

            {!! Form::open(['route' => ['admin.update'], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'files' => true, 'id' => 'formData']) !!}

            <div class="row mt-3">
                {{ Form::label('profileImage', 'Profile Image', ['class' => 'col-md-4 col-lg-3 col-form-label']) }}
                <div class="col-md-8 col-lg-9">
                    {{ Form::file('image', ['class' => 'form-control', 'id' => 'formFile']) }}
                </div>
            </div>

            <div class="row mb-3 mt-3">
                {{ Form::label('name', 'Full Name', ['class' => 'col-md-4 col-lg-3 col-form-label']) }}
                <div class="col-md-8 col-lg-9">
                    {{ Form::text('name', $user->name, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Name']) }}
                </div>
            </div>

            <div class="row mb-3">
                {{ Form::label('email', 'Email', ['class' => 'col-md-4 col-lg-3 col-form-label']) }}
                <div class="col-md-8 col-lg-9">
                    {{ Form::text('email', $user->email, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Email']) }}
                </div>
            </div>

            <div class="row mb-3">
                {{ Form::label('twitter', 'Twitter Profile', ['class' => 'col-md-4 col-lg-3 col-form-label']) }}
                <div class="col-md-8 col-lg-9">
                    {{ Form::text('twitter', $user->twitter->link, ['class' => 'form-control', 'placeholder' => 'twitter']) }}
                </div>
            </div>

            <div class="row mb-3">
                {{ Form::label('facebook', 'Facebook Profile', ['class' => 'col-md-4 col-lg-3 col-form-label']) }}
                <div class="col-md-8 col-lg-9">
                    {{ Form::text('facebook', $user->facebook->link, ['class' => 'form-control', 'placeholder' => 'facebook']) }}
                </div>
            </div>

            <div class="row mb-3">
                {{ Form::label('instagram', 'Instagram Profile', ['class' => 'col-md-4 col-lg-3 col-form-label']) }}
                <div class="col-md-8 col-lg-9">
                    {{ Form::text('instagram', $user->instagram->link, ['class' => 'form-control', 'placeholder' => 'instagram']) }}
                </div>
            </div>

            <div class="row mb-3">
                {{ Form::label('linkedin', 'Linkedin', ['class' => 'col-md-4 col-lg-3 col-form-label']) }}
                <div class="col-md-8 col-lg-9">
                    {{ Form::text('linkedin', $user->linkedin->link, ['class' => 'form-control', 'placeholder' => 'linkedin']) }}
                </div>
            </div>

            <div class="text-center">
                <div class="col-sm-10">
                    {!! Form::submit('Save Changes', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>

            {!! Form::close() !!}

        </div>

        <div class="tab-pane fade pt-3" id="profile-change-password">

            <!-- Change Password Form -->
            {!! Form::open(['route' => ['admin.password.update'], 'method' => 'POST']) !!}

            <div class="row mb-3">
                {{ Form::label('currentPassword', 'Current Password', ['class' => 'col-md-4 col-lg-3 col-form-label']) }}
                <div class="col-md-8 col-lg-9">
                    {{ Form::password('current_password', ['type' => 'password', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Current Password']) }}
                </div>
            </div>

            <div class="row mb-3">
                {{ Form::label('newPassword', 'New Password', ['class' => 'col-md-4 col-lg-3 col-form-label']) }}
                <div class="col-md-8 col-lg-9">
                    {{ Form::password('new_password', ['type' => 'password', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'New Password']) }}
                </div>
            </div>

            <div class="row mb-3">
                {{ Form::label('renewPassword', 'Re-enter New Password', ['class' => 'col-md-4 col-lg-3 col-form-label']) }}
                <div class="col-md-8 col-lg-9">
                    {{ Form::password('retype_password', ['type' => 'password', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Re-type New Password']) }}
                </div>
            </div>

            <div class="text-center">
                {!! Form::submit('Change Password', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
            <!-- End Change Password Form -->

        </div>

    </div><!-- End Bordered Tabs -->

</div>
