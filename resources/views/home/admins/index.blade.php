<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css">
</head>

<body>
    <main class="container mt-5">
        <div class="row p-2">
            <div>
                <button type="button" id="btnNuevo" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                    data-bs-target="#modal">Nuevo</button>
            </div>
        </div>
        <div class="row p-2">
            <div class="table-responsive">
                <table id="tablaProductos" class="table table-striped" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar producto</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" method="post" action="{{ route('products.store') }}" id="formulario" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-4">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre"
                                    required>
                            </div>
                            <div class="col-md-4">
                                <label for="category" class="form-label">Categoría</label>
                                <select class="form-select" id="category" name="category"
                                    aria-describedby="categoryFeedback" required> 
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="price" class="form-label">Precio</label>
                                <input type="text" class="form-control" id="price" name="price" placeholder="Precio"
                                    required>
                            </div>
                            <div class="col-md-4">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="text" class="form-control" id="stock" name="stock" placeholder="Stock"
                                    required>
                            </div>
                            <div class="col-md-8">
                                <label for="description" class="form-label">Descripción</label>
                                <input type="text" class="form-control" id="description" name="description"
                                    placeholder="Descripción" required>
                            </div>
                            <div class="mb-3">
                                <input type="file" id="file" name="file" class="form-control" aria-label="file example" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        
                    </div>                    
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar producto</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" method="post" action="" id="formularioEdit" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="idEdit" id="idEdit">
                            <div class="col-md-4">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nameEdit" name="nameEdit" placeholder="Nombre"
                                    required>
                            </div>
                            <div class="col-md-4">
                                <label for="category" class="form-label">Categoría</label>
                                <select class="form-select" id="categoryEdit" name="categoryEdit"
                                    aria-describedby="categoryFeedback" required> 
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="price" class="form-label">Precio</label>
                                <input type="text" class="form-control" id="priceEdit" name="priceEdit" placeholder="Precio"
                                    required>
                            </div>
                            <div class="col-md-4">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="text" class="form-control" id="stockEdit" name="stockEdit" placeholder="Stock"
                                    required>
                            </div>
                            <div class="col-md-8">
                                <label for="description" class="form-label">Descripción</label>
                                <input type="text" class="form-control" id="descriptionEdit" name="descriptionEdit"
                                    placeholder="Descripción" required>
                            </div>
                            <div class="mb-3">
                                <input type="file" id="fileEdit" name="fileEdit" class="form-control" aria-label="file example">
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        
                    </div>                    
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"
        integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>

</html>
