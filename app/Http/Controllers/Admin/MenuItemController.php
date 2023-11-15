<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuItemRequest;
use App\Models\MenuItem;
use App\Repositories\MenuItemRepository;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    protected $repo;
    public function __construct(MenuItemRepository $repo)
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
        $models = MenuItem::where('status', 1)->orderBy('id', 'desc')->paginate(10);
        return view('admin.menu-item.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'categories' => $this->repo->MenuCategory()
        ];
        return view('admin.menu-item.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuItemRequest $request)
    {
        $result = $this->repo->create($request->validated());
        if ($result)
            return redirect()->route('menu-item.index')->with('success', 'Success');
            else
                return back()->with(['errors'=>'Errors']);
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

    /**а
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'categories' => $this->repo->MenuCategory(),
            'model' => $this->repo->model->find($id)
        ];
        return view('admin.menu-item.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MenuItemRequest $request, $id)
    {
        $result = $this->repo->update($request->validated(), $id);
        if ($result)
            return redirect()->route('menu-item.index')->with('success', 'Success');
    }

    /**
     * Remove the specified resource from storage./
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->repo->model->find($id)->delete();
        if ($result)
            return redirect()->route('menu.index')->with('success', 'Success menu item delete');
            else
                return back()->with('errors', 'Errors menu item delete');
    }
}
