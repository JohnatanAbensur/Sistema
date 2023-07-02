<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $productos = Category::all();
        $data = [];
        foreach ($productos as $producto) {
            $category = Category::find($producto->category_id);
            $data[] = [
                '0' => '',
                '1' => $producto->name,
                '2' => $category ? $category->name : '',
                '3' => $producto->description,
                '4' => $producto->price,
                '5' => $producto->stock,
                '6' => $producto->image,
                '7' => '<button type="button" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></button><button type="button" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>',
            ];
        }
        $results = array(
            "sEcho" => 1,
            //Información para el datatables
            "iTotalRecords" => count($data),
            //enviamos el total registros al datatable
            "iTotalDisplayRecords" => count($data),
            //enviamos el total registros a visualizar
            "aaData" => $data
        );
        return response()->json($results);
    }
    public function list()
    {
        $categories = Category::all();
        $data = [];
        foreach ($categories as $category) {
            $data[] = [
                'id' => $category->id,
                'name' => $category->name,
            ];
        }
        return response($data);
    }
}
