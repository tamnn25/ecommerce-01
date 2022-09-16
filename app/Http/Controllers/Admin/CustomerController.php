<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $users = User::orderBy('id', 'desc')->paginate(9);

        if (!empty($request->name)) {

            $users = User::where('name', 'like', '%' . $request->name . '%')
                ->orderBy('id', 'desc')
                ->paginate(8);
        }

        if (!empty($request->date)) {
            $users = User::where('created_at', 'like', '%' . $request->date . '%')
                ->orderBy('id', 'desc')
                ->paginate(8);
        }

        $data['users'] = $users;

        return view('admin.users.index', $data);
    }

    public function destroy($id)
    {
        $customer = User::find($id);
        $customer->delete();

        return redirect()->route('admin.customer.index');
    }
}
