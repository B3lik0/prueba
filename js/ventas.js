function complete() {
  var divTabla = document.getElementById("divTabla");
  divTabla.setAttribute("hidden", "hidden");
  var buttonTabla = document.getElementById("buttonTabla");
  buttonTabla.onclick = agregarTabla;
}
function agregarTabla() {
  var divTabla = document.getElementById("divTabla");
  divTabla.removeAttribute("hidden");

  let tabla = document.getElementById("tablaProductos");
  //tabla.style.border = "thick solid #0000FF";
  let fila = tabla.insertRow(-1);
  let celda;
  var contadorCeldas = 0;
  celda = fila.insertCell(contadorCeldas);
  celda.textContent = document.getElementById("producto").value;
  contadorCeldas++;
  celda = fila.insertCell(contadorCeldas);
  celda.textContent = document.getElementById("cantidad").value;
  contadorCeldas++;
  limpiarCampos();
}
function limpiarCampos() {
  document.getElementById("producto").value = null;
  document.getElementById("cantidad").value = null;
}
async function infoCliente(id) {
  let url = "controllers/crudClientes.php";
  let method = "POST";
  let body = JSON.stringify({ id: id });
  let headers = {
    "Content-type": "application/json;charset=UTF-8",
    "Access-Control-Allow-Origin": "*",
  };

  fetch(url, {
    method,
    headers,
    body,
  })
    .then((resp) => resp.json())
    .then(function (response) {
      console.info("fetch()", response);
      
    });
}

document.addEventListener("DOMContentLoaded", () => {
  complete();
});
