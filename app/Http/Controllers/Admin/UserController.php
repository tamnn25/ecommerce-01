<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\StoreUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(request $request)
    {
        $data = [];
        $admins = Admin::orderBy('id', 'desc')->paginate(9);

        if (!empty($request->name)) {
            $admins = Admin::where('name', 'like', '%' . $request->name . '%')
                ->orderBy('id', 'desc')
                ->paginate(4);
        }
        if (!empty($request->role_id)) {
            $admins = Admin::where('role_id', 'like', '%' . $request->role_id . '%')
                ->orderBy('id', 'desc')
                ->paginate(4);
        }

        if (!empty($request->email)) {
            $admins = Admin::where('email', 'like', '%' . $request->email . '%')
                ->orderBy('id', 'desc')
                ->paginate(4);
        }

        $data['users'] = $admins;

        return view('admin.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $request->password = bcrypt($request->password);
        $userInsert = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => $request->role_id,
        ];
        DB::beginTransaction();

        try {
            Admin::create($userInsert);
            DB::commit();
            return redirect()->route('admin.user.index')->with('sucess', 'Insert into data to Category Sucessful.');
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function edit($id)
    {
        $data = [];
        $users = Admin::find($id);

        $data['users'] = $users;
        return view('admin.users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->password = bcrypt($request->password);
        DB::beginTransaction();
        try {
            $users = Admin::findOrFail($id);
            // $users->name = $request->name;
            // $users->email = $request->email;
            $users->password = $request->password;
            $users->role_id = $request->role_id;

            $users->save();

            DB::commit();
            return redirect()->route('admin.user.index')->with('success', 'Update User successful!');
        } catch (Exception $ex) {
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $admins = Admin::find($id);
            $admins->delete();
            DB::commit();

            return redirect()->route('admin.user.index')
                ->with('success', 'Delete User successful!');
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            DB::rollBack();

            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
}
