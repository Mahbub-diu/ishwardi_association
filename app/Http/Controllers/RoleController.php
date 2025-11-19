<?php
    
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\RolePermissionCustomSet;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
    
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:role-create', ['only' => ['create','store']]);
         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
		$data = Role::orderBy('id','DESC')->paginate(5);
		
		
		if ( !empty($request->name) ){
			
			$data = Role::where('name', $request->name)->orderBy('id','DESC')->paginate(5);
		
		}else{
			
			$data = Role::orderBy('id','DESC')->paginate(5);
			
		}
		
        if($request->ajax()){
			
			return view('backend.roles.index-pagination',['data'=>$data]); 
       
        }
		
        return view('backend.roles.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$permission = Permission::get()->toArray();
		
		
		$reArrangePermission = [];
		foreach( $permission as $p )
		{
			$reArrangePermission[$p['section_name']][$p['id']] = $p['name'];
		}
		
        return view('backend.roles.create',compact('permission', 'reArrangePermission' ));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$input = $request->all();
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
		
		$role = Role::create(['name' => $request->input('name')]);
		
        //$role->syncPermissions($request->input('permission')); // default code
		//dd($input );
		
		// start custom code
		foreach( $input['permission'] as $value )
		{
			$input['permission_id'] = $value;
			$input['role_id'] = $role->id;
			
			RolePermissionCustomSet::create($input);
		}
		// end custom code
		
        return redirect()->route('roles.index')
                        ->with('success','Role created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();
    
        return view('backend.roles.show',compact('role','rolePermissions'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::orderBy('order','asc')->get();
		$reArrangePermission = [];
		foreach( $permission as $p )
		{
			$reArrangePermission[$p['section_name']][$p['id']] = $p['name'];
		}
		
		
        /*$rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();*/ // old code
			
		// start custom code
		$rolePermissionsCustom = RolePermissionCustomSet::select('permission_id', 'role_id')
		->where('role_id',$id)
		->get()->toArray();
		//dd($rolePermissionsCustom);
		
		$rolePermissions =  [];
		if( !empty($rolePermissionsCustom) )
		{
			foreach( $rolePermissionsCustom as $roleP )
			{
				$rolePermissions[$roleP['permission_id']] =  $roleP['permission_id'];
			}
		}
		
		// end custom code
		
		
        return view('backend.roles.edit',compact('role','reArrangePermission','rolePermissions'));
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
            'permission' => 'required',
        ]);
    
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
    
       // $role->syncPermissions($request->input('permission')); // old code
		
		// start custom code
		RolePermissionCustomSet::where('role_id', $id)->delete();
		foreach( $request->input('permission') as $value )
		{
			$input['permission_id'] = $value;
			$input['role_id'] = $role->id;
			
			RolePermissionCustomSet::create($input);
		}
		// end custom code
		
        return redirect()->route('roles.index')
                        ->with('success','Role updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
		RolePermissionCustomSet::where('role_id', $id)->delete();
        return response()->json(['success'=>'Deleted Successfully!']);
    }
}