<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use CodeDelivery\Http\Controllers\Controller;

class CategoryController extends Controller
{

    protected $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getCategoryRepository()
    {
        return $this->repository;
    }

    public function index()
    {
        $categories = $this->repository->paginate();
        return view('admin.categories.index', compact('categories'));
    }
    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $this->repository->create($request->all());
        return redirect()->route('admin.categories.index');
    }

    public function edit($id)
    {
        $category = $this->repository->find($id);
        return view('admin.categories.edit',compact('category'));
    }

    public function update(Request $request,$id)
    {
        $this->repository->update($request->all(),$id);
        return redirect()->route('admin.categories.index');
    }
}
