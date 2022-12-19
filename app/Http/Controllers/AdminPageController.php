<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;

class AdminPageController extends Controller
{
    public function index()
    {
        $countuser = User::count();

        return view('Adminlayouts.adminpage');
    }
    public function datauser()
    {

        $users = User::all();

        return view('Adminlayouts.DataUser', compact('users'));
    }
    public function edit(Request $request, $id)
    {
        // $user = User::findorFail($id);
        // $user->update($request->all());
        // return redirect()->route('datauser')->with('success', 'Data Updated Successfully!');
        // $model = MyModel::findOrFail($id);
        // $model->update($request->all());

        // return redirect()->route('my_route')
        //     ->with('success', 'The model has been updated successfully.');
    }
    public function destroy(User $id)
    {
        var_dump(User::destroy($id->id));

        return redirect('/datauser')->with('success', 'Data Has Been Deleted!');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
