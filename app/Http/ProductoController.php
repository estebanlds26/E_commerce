public function index()
{
    $productos = Producto::all();
    return view('productos.index', compact('productos'));
}
