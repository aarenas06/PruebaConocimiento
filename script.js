var promedio = null;
tbPrin();
async function tbPrin() {
  let formData = new FormData();
  formData.append("funcion", "tbprin");
  try {
    let req2 = await fetch("controller/controller.php", {
      method: "POST",
      body: formData,
    });
    let res2 = await req2.text();
    $("#tbPrin").html(res2);
    let table = new DataTable("#tb1", {
      scrollY: "30vh",
      scrollX: true,
      autoWidth: false,
      order: [],
      lengthMenu: [
        [10, -1],
        [10, "All"],
      ],
      dom: "Bfrtip",
      buttons: [
        {
          extend: "pdfHtml5",
          orientation: "landscape", // Configura la orientación horizontal
          customize: function (doc) {
            // Modifica el documento PDF según tus necesidades
            doc.defaultStyle.fontSize = 8; // Cambia el tamaño de la fuente
            doc.styles.tableHeader.fontSize = 8; // Cambia el tamaño de la fuente para los encabezados de tabla
          },
        },
        "excel",
        "print",
      ],
    });
  } catch {
    Swal.fire({
      icon: "error",
      title: "Error!",
      text: "Problema del Servidor",
    });
  }
}
async function Validar() {
  var nombre = $("#nombre").val();

  var Parcial1 = parseFloat($("#Parcial1").val());
  var Parcial2 = parseFloat($("#Parcial2").val());
  var Parcial3 = parseFloat($("#Parcial3").val());

  // Verificar si los campos están vacíos o no son números
  if (isNaN(Parcial1) || isNaN(Parcial2) || isNaN(Parcial3) || nombre === "") {
    $("#NotaFinal").html("");
    Swal.fire({
      icon: "info",
      text: "Todos los campos son Obligatorios",
    });
    promedio = null;
    return;
  }
  promedio = (Parcial1 + Parcial2 + Parcial3) / 3;
  console.log(promedio.toFixed(2));
  $("#NotaFinal").html(promedio.toFixed(1));
}
async function InsertData() {
  if (promedio === null) {
    Swal.fire({
      icon: "info",
      text: "Todos los campos son Obligatorios",
    });
    return;
  }
  var nombre = $("#nombre").val();
  var Parcial1 = parseFloat($("#Parcial1").val());
  var Parcial2 = parseFloat($("#Parcial2").val());
  var Parcial3 = parseFloat($("#Parcial3").val());
  var PromedioSet = promedio.toFixed(1);

  let formData = new FormData();
  formData.append("funcion", "InsertData");
  formData.append("nombre", nombre);
  formData.append("Parcial1", Parcial1);
  formData.append("Parcial2", Parcial2);
  formData.append("Parcial3", Parcial3);
  formData.append("PromedioSet", PromedioSet);

  try {
    let req2 = await fetch("controller/controller.php", {
      method: "POST",
      body: formData,
    });
    let res2 = await req2.text();

    if (res2 === "1") {
      Limpiar();
      Swal.fire({
        icon: "success",
        text: "Registro Guardado exitosamente",
      });
      $("#InsertNuevo").modal("hide");
      tbPrin();
    } else {
      Swal.fire({
        icon: "danger",
        text: "Problemas en el servidor",
      });
    }
  } catch (error) {
    console.log(error);
    alert("Error", error);
  }
}
function Limpiar() {
  $("#nombre").val("");
  $("#Parcial1").val("");
  $("#Parcial2").val("");
  $("#Parcial3").val("");
}

async function Delete(id) {
  Swal.fire({
    title: "¿Estás seguro de eliminar este registro?",
    showCancelButton: true,
    confirmButtonText: "Aceptar",
  }).then(async (result) => {
    if (result.isConfirmed) {
      let formData = new FormData();
      formData.append("funcion", "Delete");
      formData.append("id", id);

      try {
        let req2 = await fetch("controller/controller.php", {
          method: "POST",
          body: formData,
        });
        let res2 = await req2.text();
        if (res2 === "1") {
          Swal.fire({
            icon: "success",
            text: "Registro eliminado",
          });
          tbPrin();
        } else {
          Swal.fire({
            icon: "error",
            text: "Problemas con el servidor",
          });
        }
      } catch (error) {
        console.log(error);
        alert("Error", error);
      }
    }
  });
}
