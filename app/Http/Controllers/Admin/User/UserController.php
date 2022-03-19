<?php

namespace App\Http\Controllers\Admin\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use DB;
class  UserController extends Controller
{
    public function index(Request $request) {
        $query = User::query();
        if($request->UserName){
            $query->where('users.name','like','%'.trim($request->UserName).'%');
        }
        if($request->Email){
            $query->where('users.email','like','%'.trim($request->Email).'%');
        }
        $users = $query->get();
        return view('admin.user.index', compact('users'));
    }


    public function create() {
        $roles = Role::pluck('name','id');
        return view('admin.user.create', compact('roles'));
    }


    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'password_confirm'=> 'required_with:password|same:password',
        ], [
            'name.required' => 'Tên người dùng bắt buộc',
            'email.required' => 'Email bắt buộc',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Mật khẩu bắt buộc',
            'password_confirm.same' => 'Mật khẩu xác nhận phải giống mật khẩu',
            'password_confirm.required_with' => 'Mật khẩu xác nhận bắt buộc',
        ], []);
        $user = User::create([
            'name' =>  $request->name,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => bcrypt($request->password),
        ]);
        $user->assignRole($request->input('roles'));
        return redirect()->route('user.index')->with('success','Thêm mới người dùng thành công');
    }

    public function edit($id) {
        $data = User::find($id);
        $roles = Role::pluck('name','id')->toArray();
        $rolesUser = DB::table('model_has_roles')->where('model_id',$id)->pluck('role_id')->toArray();
        return view('admin.user.edit', compact('data','roles','rolesUser'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
        ], [
            'name.required' => 'Tên người dùng bắt buộc',
        ], []);
        $passwordOld = User::find($id)->password;
        $roleUser=User::where('id',$id)->update([
            'name' =>  $request->name,
            'password' => $request->password_new?bcrypt($request->password_new):$passwordOld,
        ]);
        
        $roleUser=User::find($id);
        $roleUser->syncRoles($request->roles);
        return redirect()->route('user.index')->with('success','Chỉnh sửa người dùng thành công');
    }

    public function updateRole(Request $request)
    {
        $user = User::find($request->id);
        if(!empty($request->role_name)) {
            $user->syncRoles($request->role_name);
        }
        else {
            DB::table('model_has_roles')->where('model_id',$request->id)->delete();
        }

        return back()->with('success','Cập nhật quyền thành công');
    }
}
