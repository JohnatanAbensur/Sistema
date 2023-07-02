function mayus(e) {
    e.value = e.value.toUpperCase();
}
function numeracion(tabla) {
    tabla.on('order.dt search.dt', function () {
      tabla.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
        cell.innerHTML = i + 1;
      });
    }).draw();
}