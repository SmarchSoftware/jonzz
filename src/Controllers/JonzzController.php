<?php

namespace Smarch\Jonzz\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Jonzz;
use Smarch\Jonzz\Requests\StoreRequest;
use Smarch\Jonzz\Requests\UpdateRequest;
use Smarch\Jonzz\Traits\SmarchACLTrait;

class JonzzController extends Controller
{

    use SmarchACLTrait;

    var $acl = false;
    var $driver = 'laravel';

    /**
     * constructor
     * 
     * @param boolean $acl          Whether or not ACL is enabled
     * @param string $driver        Which ACL package to use
     * @param string $unauthorized  Which view to use
     */
    public function __construct() {
        $this->acl = config('jonzz.acl.enable');
        $this->driver = config('jonzz.acl.driver');
        $this->unauthorized = config('jonzz.views.unauthorized');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if ( $this->checkAccess( config('jonzz.acl.index') ) ) {
            $resources = Jonzz::paginate( config('jonzz.pagination', 15) );
            return view( config('jonzz.views.index'), compact('resources') );
        }

        return view( $this->unauthorized, ['message' => 'view Jonzz attributes list'] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if ( $this->checkAccess( config('jonzz.acl.create') ) ) {
            return view( config('jonzz.views.create') );
        }

        return view( $this->unauthorized, ['message' => 'create new Jonzz attribute'] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(StoreRequest $request)
    {
        if ( $this->checkAccess( config('jonzz.acl.create') ) ) {
            jonzz::create($request->all());        
            return redirect()->route('jonzz.index')
                ->with( ['flash' => ['message' => "<i class='fa fa-check-square-o fa-1x'></i> Success! Jonzz attribute created.", 'level' => "success"] ] );
        }

        return redirect()->route('jonzz.index')
            ->with( ['flash' => ['message' => "You are not permitted to create Jonzz attribute", 'level' => "danger"] ] );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        if ( $this->checkAccess( config('jonzz.acl.show') ) ) {
            $resource = jonzz::findOrFail($id);
            $show = "1";
            return view( config('jonzz.views.edit'), compact('resource', 'show') );
        }

        return view( $this->unauthorized, ['message' => 'view existing Jonzz attribute'] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        if ( $this->checkAccess( config('jonzz.acl.edit') ) ) {
            $resource = jonzz::findOrFail($id);
            $show = "0";
            return view( config('jonzz.views.edit'), compact('resource', 'show') );
        }

        return view( $this->unauthorized, [ 'message' => 'edit existing Jonzz attribute'] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, UpdateRequest $request)
    {
        if ( $this->checkAccess( config('jonzz.acl.edit') ) ) {
            $jonzz =  jonzz::findOrFail($id);      
            $jonzz->update($request->all());        
            return redirect()->route('jonzz.index')
                ->with( ['flash' => ['message' => "<i class='fa fa-check-square-o fa-1x'></i> Success! Jonzz attribute edited.", 'level' => "success"] ] );   
        }

        return redirect()->route('jonzz.index')
            ->with( ['flash' => ['message' => "You are not permitted to edit Jonzz attribute.", 'level' => "danger"] ] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        if ( $this->checkAccess( config('jonzz.acl.destroy') ) ) {
            jonzz::destroy($id);
            return redirect()->route('jonzz.index')
                ->with( ['flash' => ['message' => "<i class='fa fa-check-square-o fa-1x'></i> Success! Jonzz attribute deleted.", 'level' => "warning"] ] );
        }

        return redirect()->route('jonzz.index')
            ->with( ['flash' => ['message' => "You are not permitted to destroy Jonzz attribute.", 'level' => "danger"] ] );
    }

}
