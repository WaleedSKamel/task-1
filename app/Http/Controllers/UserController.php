<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Mail\AdminBrandRequest;
use App\Mail\UserBrandRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class UserController extends Controller
{

    public function index()
    {
        try {
            $users = User::query()->orderByDesc('created_at')->get();
            if(\Route::currentRouteName() == 'users.download')
            {
                $pdf = PDF::loadView('users.index',compact('users'));
                return $pdf->download('users.pdf');
            }
            return view('users.index', compact('users'));
        } catch (\Exception $exception) {
            Alert::error('Exception', $exception->getMessage());
            return redirect()->back();
        }

    }


    public function create()
    {
        $edit = false;
        return view('users.form', compact('edit'));
    }


    public function store(UserRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->except(['upload']);
            if ($request->hasFile('upload')) {
                $data['upload'] = storeUpload('upload', 'user', 'single');
            }
            $user = User::create($data);
            if ($user) {
                \Mail::to($user->email)->send(new AdminBrandRequest($user));
                \Mail::to($user->email)->send(new UserBrandRequest());
                DB::commit();
                toast('Data Saved Successfully', 'success');
                return redirect()->route('users.index');
            }
            toast(trans('admin.Please try again'), 'warning');
            return redirect()->back()->withInput($request->all());
        } catch (\Exception $exception) {
            DB::rollBack();
            Alert::error('Exception', $exception->getMessage());
        }
    }


    public function show(User $user)
    {
        //
    }


    public function edit(User $user)
    {
        //
    }


    public function update(Request $request, User $user)
    {
        //
    }


    public function destroy(User $user)
    {
        //
    }
}
