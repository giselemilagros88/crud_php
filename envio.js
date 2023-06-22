// levanto el a del link de whatssap 

let a_msj_wsp = document.getElementById('WSP')
const MensajeWsp = ()=> {
  let nombre = document.getElementById("name")
  let mail = document.getElementById("exampleInputEmail1")
  let motivo = document.getElementById("exampleInputPassword1")
  let mensaje = document.getElementById("contenido")

  //console.log(nombre.value)

  let mensaje_final
  mensaje_final ="Hola!,%20Mi%20Nombre%20es:%20" + nombre.value +",%20"
  mensaje_final = mensaje_final + "%20Mi%20Mail%20es:%20" + mail.value
  mensaje_final = mensaje_final + ",%20El%20Motivo%20de%20mi%20contacto%20es%20" + motivo.value + ",%20"
  mensaje_final = mensaje_final + "%20mensaje%20:%20" + mensaje.value
  mensaje = "https://api.whatsapp.com/send?phone=+5491155124846&text="+mensaje_final 
  //Esto%20es%20una%20prueba
  a_msj_wsp.href = mensaje  
}

a_msj_wsp.addEventListener('click', MensajeWsp)