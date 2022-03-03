document.addEventListener('DOMContentLoaded', function() {
  // Buttons to toggle between views
  document.querySelector('#boton_tabla').addEventListener('click', show_table);
  document.querySelector('#boton_mapa').addEventListener('click', show_map);
  // By default
  show_table();
});

function show_table(){
  document.querySelector('#tabla_dispositivos').style.display = 'block';
  document.querySelector('#mapa_dispositivos').style.display = 'none';
}

function show_map(){
  document.querySelector('#mapa_dispositivos').style.display = 'block';
  document.querySelector('#tabla_dispositivos').style.display = 'none';
}
