<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use App\Repositories\MenuRepository;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected $repo;
    public function __construct(MenuRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Menu::where('status', 1)->orderBy('id', 'desc')->paginate(10);
        return view('admin.menu.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request)
    {
        $result = $this->repo->create($request->validated());
        if ($result){
            $request->session()->flash('success', 'Success');
            return redirect()->route('menu.index');
        }else{
            $request->session()->flash('errors', 'Error');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Menu::find($id);
        return view('admin.menu.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MenuRequest $request, $id)
    {


        $result = $this->repo->update($request->validated(), $id);
        if ($result){
            $request->session()->flash('success', 'Success');
            return redirect()->route('menu.index');
        }else{
            $request->session()->flash('errors', 'Error');
            return back();
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

        $result = Menu::find($id)->delete();
        if ($result)
            return response()->json(['res' => 'Success'], 200);


    }
}
