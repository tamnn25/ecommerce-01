<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Auth;

class PasswordController extends Controller
{

    public function change()
    {
        $data = [];
        $user = Auth::user();

        $users = User::where('id', $user->id)->get();

        $data['users'] = $users;

        return view('password.changepass', $data);
    }

    public function detailpassword($id)
    {
        $data = [];

        $user = User::findOrFail($id);

        $data['user'] = $user;

        return view('password.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $attribute = $request->all();

        // Method: PUT
        $attribute['password'] = bcrypt($attribute['password']);

        DB::beginTransaction();

        try {
            $user = User::find($id);
            $user->password = $attribute['password'];
            $user->update($attribute);

            DB::commit();

            return redirect()->route('password.password')
                ->with('success', 'Update My Account successful!');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
}
