document.addEventListener("DOMContentLoaded", () => {
  const carritoContainer = document.getElementById("carritoContainer");
  const totalElement = document.getElementById("totalCarrito");
  const contador = document.getElementById("contadorCarrito");
  const btnVaciar = document.getElementById("vaciarCarrito");
  const btnComprar = document.getElementById("comprar");

  //Cargar productos
  function cargarCarrito() {
    const carrito = JSON.parse(localStorage.getItem("carrito")) || [];

    carritoContainer.innerHTML = "";

    if (carrito.length === 0) {
      carritoContainer.innerHTML = "<p>🛒 Tu carrito está vacío.</p>";
      totalElement.textContent = "0";
      contador.textContent = "0";
      return;
    }

    let total = 0;
    let cantidadTotal = 0;

    carrito.forEach((item, index) => {
      total += item.precio * item.qty;
      cantidadTotal += item.qty;

      const div = document.createElement("div");
      div.classList.add("item-carrito");
      div.innerHTML = `
        <img src="${item.img}" alt="${item.nombre}" width="100">
        <div class="info-carrito">
          <h3>${item.nombre}</h3>
          <p>Precio: $${item.precio.toLocaleString()}</p>
          <p>Cantidad: ${item.qty}</p>
          <p>Subtotal: $${(item.precio * item.qty).toLocaleString()}</p>
        </div>
      `;
      carritoContainer.appendChild(div);
    });

    totalElement.textContent = total.toLocaleString();
    contador.textContent = cantidadTotal;
  }

  //Vaciar carrito
  btnVaciar.addEventListener("click", () => {
    localStorage.removeItem("carrito");
    cargarCarrito();
  });

  // Comprar
  btnComprar.addEventListener("click", () => {

    // 🔐 VALIDACIÓN DE SESIÓN (AGREGADO)
    const usuarioLogueado = localStorage.getItem("userLogged");
    if (!usuarioLogueado) {
      alert("Debes iniciar sesión para realizar la compra.");
      window.location.href = "../Pantallas/Sesion.html"; 
      return;
    }
    // 🔐 FIN DE LA VALIDACIÓN

    const carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    if (carrito.length === 0) {
      alert("Tu carrito está vacío 🛒");
      return;
    }
    alert("✅ ¡Gracias por tu compra!");
    localStorage.removeItem("carrito");
    cargarCarrito();
  });

  cargarCarrito();
});


