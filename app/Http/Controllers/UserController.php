<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userCrud()
    {
        $user = User::all();
        return view('testcrud', compact('user'));
    }
    public function profile(User $id)
    {
        $message = "";
        $btnMessage = "";
        $route = "";
        if (Auth::user()) {
            if (!request()->user()->hasVerifiedEmail()) {
                $message = "Kamu harus verifikasi email kamu telebih dahulu, Silahkan cek gmail kamu yang telah di registrasi";
                $btnMessage = "Kembali";
                $route = route('verification.notice');
            }
        } else {
            $message = "Kamu belom membuat profile, buat profile terlebih dahulu";
            $btnMessage = "Buat Profile Sekarang";
            $route = route('register');
        }



        return view('profile.user.profile', [
            'user' => Auth::user(),
            'message' => $message,
            'btnMessage' => $btnMessage,
            'route' => $route,
            'id' => $id
        ]);
    }

    public function show_edit()
    {
        $user = Auth::user();
        return view('profile.user.edit-profile', compact('user'));
    }

    public function update(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'skills' => 'array|nullable',
            'skills.*' => 'string|nullable',
            'age' => 'int|nullable|min:18',
            'nohp' => 'nullable|min:0',
        ]);

        $user = User::find(Auth::user()->id);

        $pengalaman = $user->pengalaman ? $user->pengalaman : [];
        $year = $request->input("year");
        $position =  $request->input("positionEx");
        $desc = $request->input("descriptionEx");
        if ($year or $position or $desc) {
            $newPengalaman = [
                $year,
                $position,
                $desc
            ];

            $pengalaman[] = $newPengalaman;
        }

        $foto = Auth::user()->foto;

        if ($request->hasFile('profil')) {
            $foto = $request->file('profil')->getClientOriginalName();
            $request->file('profil')->move(public_path('profile_image'), $foto);
        }

        $user->update([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'position' => $request->input('positionUser'),
            'description' => $request->input('descriptionUser'),
            'skills' => $request->input('skills'),
            'age' => $request->input('age'),
            'nohp' => $request->input('nohp'),
            'alamat' => $request->input('alamat'),
            'pengalaman' => $pengalaman,
            'foto' => $foto
        ]);



        return redirect()->route('user.profile', $user->id)->with('success', 'Your account successfully updated');
    }

    public function destroy(Request $request)
    {
        User::find(Auth::user()->id)->delete();
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
