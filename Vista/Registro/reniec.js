var formulario = document.getElementById("formulario");

 document.getElementById("datos_ciudadano").onclick = function(){
  var datos = new FormData(formulario)
  console.log(datos.get('dni'))
  fetch('http://localhost:8080/app_mesa_partes/Vista/Registro/nombre_ciudadano.php',{
    method: 'POST',
    body: datos
  })
    .then(res => res.json())
    .then(data => {
      console.log(data)
      document.formulario.nombres.value = data;
    })
  fetch('http://localhost:8080/app_mesa_partes/Vista/Registro/apellido_paterno.php',{
    method: 'POST',
    body: datos
  })
    .then(res => res.json())
    .then(data => {
      console.log(data)
      document.formulario.apaterno.value = data;
    })
  fetch('http://localhost:8080/app_mesa_partes/Vista/Registro/apellido_materno.php',{
    method: 'POST',
    body: datos
  })
    .then(res => res.json())
    .then(data => {
      console.log(data)
      document.formulario.amaterno.value = data;
    })
 }