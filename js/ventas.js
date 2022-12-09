let Cliente;
let Producto;
function complete() {
  var buttonGuardar = document.getElementById("buttonGuardar");
  buttonGuardar.onclick = confirmar;

  var buttonTabla = document.getElementById("buttonTabla");
  buttonTabla.onclick = agregarTabla;

  var divTabla = document.getElementById("divTabla");
  divTabla.setAttribute("hidden", "hidden");
}

function confirmar() {
  //confirm("Desea guardar el Reporte? ");
  getDatosFromTabla();
}

function guardarVenta(registros) {
  condi = true;
  let url = "./controllers/crudVentas.php";
  let type = "POST";
  // console.log(registros);
  $.ajax({
    type,
    url,
    data: { registroVenta: registros },
    success: (data) => {
      alert(data);
    },
    error: () => {
      alert("Alguo salio mal al guardar");
    },
  });
}

function limpiarCampos() {
  document.getElementById("producto").value = null;
  document.getElementById("cantidad").value = null;
}
function infoCliente(id) {
  let link = "./controllers/crudClientes.php";
  let metodo = "POST";
  let cliente = { cliente: id.value };
  let headers = {
    "Content-type": "application/json;charset=UTF-8",
    "Access-Control-Allow-Origin": "*",
  };

  $.ajax({
    type: metodo,
    url: link,
    data: cliente,
    success: (data) => {
      Cliente = eval("(" + data + ")");
      document.getElementById("datosCliente").value =
        "Razon Social: " + Cliente.RAZON_SOCIAL;
      document.getElementById("datosCliente2").value = " RFC: " + Cliente.RFC;
    },
    error: () => {
      alert("Alguo salio mal!");
    },
  });
}
function infoProducto(id) {
  let link = "./controllers/crudProductos.php";
  let metodo = "POST";
  let producto = { producto: id.value };
  let headers = {
    "Content-type": "application/json;charset=UTF-8",
    "Access-Control-Allow-Origin": "*",
  };

  $.ajax({
    type: metodo,
    url: link,
    data: producto,
    success: (data) => {
      Producto = eval("(" + data + ")");
    },
    error: () => {
      alert("Alguo salio mal consultando precio");
    },
  });
}

function agregarTabla() {
  var divTabla = document.getElementById("divTabla");
  divTabla.removeAttribute("hidden");

  let tabla = document.getElementById("tablaProductos");
  let fila = tabla.insertRow(-1);
  let celda;
  var contadorCeldas = 0;
  agregarBTNEliminar(fila, celda, contadorCeldas);
  contadorCeldas++;
  celda = fila.insertCell(contadorCeldas);
  celda.textContent = Producto.IDMATERIAL;
  contadorCeldas++;
  celda = fila.insertCell(contadorCeldas);
  celda.textContent = document.getElementById("cantidad").value;
  contadorCeldas++;
  celda = fila.insertCell(contadorCeldas);
  celda.textContent = Producto.UNIDADMEDIDA;
  contadorCeldas++;
  celda = fila.insertCell(contadorCeldas);
  celda.textContent =
    document.getElementById("cantidad").value * parseFloat(Producto.PRECIO1);
  let subtotal =
    document.getElementById("cantidad").value * parseFloat(Producto.PRECIO1);
  contadorCeldas++;
  celda = fila.insertCell(contadorCeldas);
  celda.textContent = subtotal * 0.16;
  let total = subtotal * 0.16;
  contadorCeldas++;
  celda = fila.insertCell(contadorCeldas);
  celda.textContent = subtotal + total;
  contadorCeldas++;

  limpiarCampos();
}
function agregarBTNEliminar(fila, celda, contadorCeldas) {
  var btn = document.createElement("button");
  btn.textContent = "Eliminar";
  btn.id = "eliminarfila";
  btn.classList.add("is-danger");
  celda = fila.insertCell(contadorCeldas);
  celda.appendChild(btn);
  btn.onclick = () => {
    if (eliminarFila(celda)) return;
    else return;
  };
}

function eliminarFila(celda) {
  if (confirm("Confirmar eliminar")) celda.parentNode.remove();
  let tabla = document.getElementById("tablaProductos");
  if (tabla.rows.length == 1) {
    var divTabla = document.getElementById("divTabla");
    divTabla.setAttribute("hidden", "hidden");
  }
}

async function getDatosFromTabla() {
  var registros = Array();
  var arreglo = Array();
  var newArreglo = Array();
  var Sumasubtotal = 0,
    SumaIVA = 0,
    SumaTotal = 0;
  var oTable = document.getElementById("tablaProductos");
  var rowLength = oTable.rows.length;
  numRows = rowLength;
  for (var i = 1; i < rowLength; i++) {
    var oCells = oTable.rows.item(i).cells;
    var cellLength = oCells.length;
    for (var j = 1; j < cellLength; j++) {
      registros.push(oCells.item(j).innerHTML);
    }
    arreglo[arreglo.length] = new datos(registros, Cliente);
    Sumasubtotal += parseInt(arreglo[0].subtotal);
    SumaIVA += parseInt(arreglo[0].iva);
    SumaTotal += parseInt(arreglo[0].total);
    newArreglo[i - 1] = arreglo;
    arreglo = [];
    registros = [];
  }
  Cliente.Sumasubtotal = Sumasubtotal;
  Cliente.SumaIVA = SumaIVA;
  Cliente.SumaTotal = SumaTotal;
  Cliente.venta = newArreglo;

  await guardarVenta(Cliente);
  indiceVuelta = i;
}

function datos(array) {
  for (var j = 0; j < array.length; j++) {
    if (array[j] == undefined) array[j] == "";

    this.producto = array[0] == "" ? "NA" : array[0];
    this.cantidad = array[1] == "" ? "NA" : array[1];
    this.medida = array[2] == "" ? "NA" : array[2];
    this.subtotal = array[3] == "" ? "NA" : array[3];
    this.iva = array[4] == "" ? "NA" : array[4];
    this.total = array[5] == "" ? "NA" : array[5];
  }
}

document.addEventListener("DOMContentLoaded", () => {
  complete();
});
