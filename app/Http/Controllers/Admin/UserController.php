<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Libraries\Helper\UserSocialMediaHelper;
use App\Http\Requests\Admin\UpdatePasswordRequest;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use App\Traits\BreadCrumb;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    use ImageTrait;
    use BreadCrumb;

    private $image_path;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->image_path = \Config::get('constants.image_path.user_admin');
        $this->breadcrumb['title'] = 'Profile';
        $this->breadcrumb['route'] = 'admin.profile';
        $this->middleware('auth');
    }

    public function profile()
    {
        return view('admin.user.profile')
            ->with('breadcrumb', $this->breadcrumb)
            ->with('user', auth()->user());
    }

    public function update(UserRequest $request)
    {
        $request->validated();

        $social_media = (new UserSocialMediaHelper)->getSocialMedia($request);

        $user = User::findOrFail(auth()->id());
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->social_media = json_encode($social_media);

        // handling file upload
        $uploadImage = $request->hasFile('image') ? $this->uploadImage($request->file('image'), $this->image_path) : null;
        $user->image = $uploadImage['file_name_to_store'] ?: $user->image;
        $user->save();

        return redirect('/admin/profile')->with('success', 'Profile Updated');
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $request->validated();

        $user = User::findOrFail(auth()->id());

        if (Hash::check($request->new_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect('/admin/profile')->with('success', 'Password Updated');
        } else {
            return redirect('/admin/profile')->with('error', 'Current Password is incorrect');
        }

    }
}
