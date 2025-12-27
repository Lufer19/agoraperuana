// Cargar artículos recientes
fetch('content/articulos.json')
  .then(r => r.json())
  .then(data => {
    const lista = document.getElementById('lista');
    lista.innerHTML = data.slice(0,5)
      .map(a => `<li><a href="${a.archivo}">${a.titulo}</a></li>`)
      .join('');
  });
