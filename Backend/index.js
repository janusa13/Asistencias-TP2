function colorPromedio() {
  console.log("hola");
  let filas = document.querySelectorAll(".table tbody tr");

  filas.forEach((fila) => {
    let condicion = fila.classList.item(0); // Obtiene la primera clase de la fila

    if (condicion === "Promocion") {
      fila.className = "bg-success";
    } else if (condicion === "libre") {
      fila.className = "bg-danger";
    } else if (condicion === "regular") {
      fila.className = "bg-warning";
    }
  });
}

window.onload = function () {
  colorPromedio();
};
