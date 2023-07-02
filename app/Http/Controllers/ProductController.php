<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $productos = Product::all();
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
                '7' => '<button type="button" data-id="' . $producto->id . '" class="btn btn-primary btn-sm btn-editar"><i class="fa-solid fa-pen-to-square"></i></button>
                <button type="button" data-id="' . $producto->id . '" class="btn btn-danger btn-sm btn-eliminar"><i class="fa-solid fa-trash"></i></button>',
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

    public function store(Request $request)
    {
        /*
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'file' => 'required|image|mimes:jpeg,png,jpg',
            'category' => 'required|integer',
        ]);*/

        $producto = new Product();
        $producto->name = $request->input('name');
        $producto->description = $request->input('description');
        $producto->price = $request->input('price');
        $producto->stock = $request->input('stock');
        $producto->category_id = $request->input('category');

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $nombreArchivo = time() . '_' . $image->getClientOriginalName();
            //$rutaImagen = public_path('image/product/' . $nombreArchivo);
            $image->move(public_path('image/product'), $nombreArchivo);
            $producto->image = $nombreArchivo;
        }
        $producto->save();

        return response()->json('success');
    }

    public function show($id)
    {
        $producto = Product::find($id);
        if (!$producto) {
            return response()->json(['message' => 'El producto no existe'], 404);
        }

        return response()->json($producto);
    }

    public function update(Request $request, $id)
    {
        /*
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'required',
            'category_id' => 'required',
        ]);
        */
        $producto = Product::findOrFail($id);

        $producto->name = $request->input('nameEdit');
        $producto->description = $request->input('descriptionEdit');
        $producto->price = $request->input('priceEdit');
        $producto->stock = $request->input('stockEdit');
        $producto->category_id = $request->input('categoryEdit');

        if ($request->hasFile('fileEdit')) {
            $image = $request->file('fileEdit');
            $nombreArchivo = time() . '_' . $image->getClientOriginalName();
            //$rutaImagen = public_path('image/product/' . $nombreArchivo);
            $image->move(public_path('image/product'), $nombreArchivo);
            $producto->image = $nombreArchivo;
        }

        $producto->save();
        
        return response()->json(['message' => 'Producto actualizado correctamente']);
    }

    public function destroy($id)
    {
        $producto = Product::findOrFail($id);
        $producto->delete();

        return response()->json(['message' => 'Producto eliminado correctamente']);
    }
}