<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use CodeDelivery\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(CategoryRepository $categoryRepository)
    {
        $categories = $categoryRepository->paginate(5);
        return view('admin.categories.index', compact('categories'));
    }
    public function create()
    {
        return view('admin.categories.create');
    }
}
