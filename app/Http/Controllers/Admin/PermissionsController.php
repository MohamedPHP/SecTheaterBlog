<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Permission;

class PermissionsController extends Controller
{
    private $rules = [
        'name'     => 'required|unique:permissions,name',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\/Response
     */
    public function index()
    {
        return view('backend.permissions.index', [
            'title' => "Show All Permissions",
            'index' => Permission::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.permissions.create', [
            'title' => "Create Permissions",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, $this->rules);

        $permissions = [];
        if ($request->has('crud') && $request->crud == '1') {
            foreach (['Add', 'Edit', 'Show', 'Delete'] as $p) {
                $permissions[]['name'] = $p . ' ' . $data['name'];
            }
        } else {
            $permissions[]['name'] = $data['name'];
        }

        foreach ($permissions as $data) {
            $permission = Permission::create($data);
        }

        session()->flash('success', "Created Successfully");
        return redirect()->route('permissions.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::find($id);
        if ($permission) {
            return view('backend.permissions.show', [
                'title' => "Show Permission " . ' : ' . $permission->name,
                'show'  => $permission,
            ]);
        }
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::find($id);
        if ($permission) {
            return view('backend.permissions.edit', [
                'title' => "Edit Permission" . ' : ' . $permission->name,
                'edit'  => $permission,
            ]);
        }
        return back();
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
        $permission = Permission::find($id);

        $data = $this->validate($request, $this->rules);

        $permission->update($data); // true, false

        session()->flash('success', "Updated Successfully");
        return redirect()->route('permissions.show', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  bool  $redirect
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::find($id);
        if ($permission) {
            $permission->delete();
            session()->flash('success', "Permission Deleted Successfully");
            return redirect()->route('permissions.index');
        }
    }


}
