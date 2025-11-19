<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\RolePermissionCustomSet;
use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;
use DB;
use Hash;
use Illuminate\Support\Arr;
    
class UserController extends Controller
{
    
	function __construct()
    {
         $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
	
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(10);
		
		
		if ( !empty($request->name) ){
			
			$data = User::where('name', $request->name)->orderBy('id','DESC')->paginate(10);
		
		}else{
			
			$data = User::orderBy('id','DESC')->paginate(10);
			
		}
        if($request->ajax()){
			
			return view('backend.users.index-pagination',['data'=>$data]); 
       
        }
			
		
        return view('backend.users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','id')->all();
        $permission = Permission::pluck('name','id')->all();
		//dd($permission);
        return view('backend.users.create',compact('roles', 'permission' ));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$this->validate($request, [
            'name' => 'required',
            'mobile_no' => 'required|numeric|unique:users,mobile_no',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
            'set_permission' => 'required',
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
		
		if ( !empty($input['image']) ) {
            
            $imagePath = $input['image'];
            $imageName = date('Ymdhis').$imagePath->getClientOriginalName();
           
            $path = $input['image']->storeAs('users', $imageName, 'public');
         
            $input['image'] = $imageName;
      
         
        }
		
		 //dd($input);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
		
		/*$rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $input['roles'])
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();*/
		//dd($rolePermissions);
		
		//$diffrentPermission = array_diff($rolePermissions,$input['set_permission']);
		
		if( !empty( $input['set_permission'] ) )
		{
			foreach( $input['set_permission'] as $value )
			{
				$user->givePermissionTo($value);
				//$user->revokePermissionTo($value);
			}
		}
        
        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
		//dd($user->getAllPermissions());
        return view('backend.users.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','id')->all();
		
        $userRole = $user->roles->pluck('name','id')->all();
		$userRoleKey = array_keys($userRole);
		//dd($userRoleKey);
		
		$rolePermissions = [];
		$rolePermissionsCustom = RolePermissionCustomSet::select('permission_id', 'role_id')->where('role_id',$userRoleKey[0])->get()->toArray();;
		
		if( !empty($rolePermissionsCustom) )
		{
			foreach( $rolePermissionsCustom as $roleP )
			{
				$rolePermissions[$roleP['permission_id']] =  $roleP['permission_id'];
			}
		}
		
		$roleIds = array_keys($rolePermissions);
		
		$currentPermisssion = $user->getAllPermissions()->toArray();
		$currentPermisssionReArrange = [];
		foreach( $currentPermisssion as  $valueP)
		{
			$currentPermisssionReArrange[$valueP['id']] =  $valueP['id'];
		}
		
		//dd($currentPermisssionReArrange);
		//$roleIds = array_keys($rolePermissionsCustom);
		
		$perData = Permission::whereIn('id', $roleIds)
		->orderBy('order','asc')
		->get()
		->toArray();
		
		$permission = [];
		foreach( $perData as $p )
		{
			$permission[$p['section_name']][$p['id']] = $p['name'];
		}
		
		//dd($permission);
		
        return view('backend.users.edit',compact('user', 'roles', 'userRoleKey', 'rolePermissions', 'permission', 'currentPermisssionReArrange' ));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required',
            'set_permission.*' => 'required',
        ]);
    
        $input = $request->all();
		
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
			
        }else{
            $input = Arr::except($input,array('password'));   
			
        }
    
        $user = User::find($id);
		
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
		
		// start remove current permission
		$currentPermisssion = $user->getAllPermissions()->toArray();
		
		foreach( $currentPermisssion as  $valueP)
		{
			$user->revokePermissionTo($valueP['id']);
		}
		// end remove current permission
		
		// start set  permission 
		if( !empty( $input['set_permission'] ) )
		{
			//dd($input['set_permission']);
			foreach( $input['set_permission'] as $value )
			{
				$user->givePermissionTo($value);
				//$user->revokePermissionTo($value);
			}
		}
		// end set  permission 
		
		return redirect('/users?page='.$input['page'])
                         ->with('success','User updated successfully');
		
        /*return redirect()->route('users.index')
                        ->with('success','User updated successfully');*/
		
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
	
	
	public function destroy($id)
    {
        User::find($id)->delete();

        return response()->json(['success'=>'User Deleted Successfully!']);

    }
	
	
	public function seeRolePermission( $id )
    {   
        $data = [];
        $roleIds = [];
        $rolePermissions = [];
		//dd($id);
		
		$rolePermissionsCustom = RolePermissionCustomSet::select('permission_id', 'role_id')->where('role_id',$id)->get()->toArray();;
		//dd($rolePermissionsCustom);
		$rolePermissions =  [];
		if( !empty($rolePermissionsCustom) )
		{
			foreach( $rolePermissionsCustom as $roleP )
			{
				$rolePermissions[$roleP['permission_id']] =  $roleP['permission_id'];
			}
		}
		
		$roleIds = array_keys($rolePermissions);
			
		$permission = Permission::whereIn('id', $roleIds)
		->orderBy('order','asc')
		->get()->toArray();
		
		$reArrangePermission = [];
		foreach( $permission as $p )
		{
			$reArrangePermission[$p['section_name']][$p['id']] = $p['name'];
		}
		
		//dd($reArrangePermission);
		
        return response()->json($reArrangePermission);
	}
	
}