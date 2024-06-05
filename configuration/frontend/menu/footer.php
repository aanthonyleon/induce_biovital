<?php include("./configuration/frontend/helpers/captcha/index.php"); ?>

<div class="loader" id="cargador" style="display: none;"></div>
  
<footer class="footer bg-dark pt-5 pt-md-6 pt-lg-7">
  <div class="container py-1 pt-md-0">
    <div class="row pb-2 pb-md-5">
      <div class="col-xl-6 col-lg-7 col-md-7 needs-validation mb-5" novalidate>
        <h2 class="pb-4 text-white">¿Qu&eacute; proyecto buscas?</h2>
        <h3 class="h6 pb-2 text-white">Servicios</h3>

        <div class="mb-3">
          <div class="form-check form-option form-option-size form-check-inline mb-2">
            <input type="radio" class="form-check-input" id="servicio-paginas" value="paginas" name="servicios" checked>
            <label for="servicio-paginas" class="form-option-label text-info">P&aacute;ginas web</label>
          </div>

          <div class="form-check form-option form-option-size form-check-inline mb-2">
            <input type="radio" class="form-check-input" id="servicio-comercio" value="comercio" name="servicios">
            <label for="servicio-comercio" class="form-option-label text-info">eCommerce</label>
          </div>

          <div class="form-check form-option form-option-size form-check-inline mb-2">
            <input type="radio" class="form-check-input" id="servicio-seo" value="seo" name="servicios" >
            <label for="servicio-seo" class="form-option-label text-info">SEO</label>
          </div>

          <div class="form-check form-option form-option-size form-check-inline mb-2">
            <input type="radio" class="form-check-input" id="servicio-software" value="software" name="servicios" >
            <label for="servicio-software" class="form-option-label text-info">Software a medida</label>
          </div>
        </div>

        <div class="input-group mb-3"><i class="ai-user position-absolute top-50 start-0 translate-middle-y ms-3"></i>
          <input class="form-control rounded" type="text" name="nombre" id="nombre"  placeholder="Nombre" required>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="input-group mb-3"><i class="ai-mail position-absolute top-50 start-0 translate-middle-y ms-3"></i>
              <input class="form-control rounded" type="email" name="correo" id="correo" placeholder="Correo electr&oacute;nico" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-group mb-3"><i class="ai-phone position-absolute top-50 start-0 translate-middle-y ms-3"></i>
              <input class="form-control rounded" type="phone" name="telefono" id="telefono" placeholder="Tel&eacute;fono" required>
            </div>
          </div>
        </div>

        <div class="input-group mb-3"><i class="ai-company position-absolute top-50 start-0 translate-middle-y ms-3"></i>
          <input class="form-control rounded" type="text" name="empresa" id="empresa" placeholder="Nombre de tu empresa" required>
        </div>

        <div class="mb-3 pb-1">
          <textarea class="form-control" rows="4" name="descripcion" id="descripcion" placeholder="Descripci&oacute;n del proyecto" required></textarea>
        </div>

        <div class="g-recaptcha" data-sitekey="<?php echo SITE_KEY; ?>"></div>
        <small class="text-danger" id="message-captcha" style="display: none;">Da click en la CAPTCHA</small>
        
        <div class="row pt-2">
          <div class="col-lg-6 col-md-8">
            <button class="btn btn-info btn-block" type="button" onclick="enviar_cotizacion()">Enviar</button>
          </div>
        </div>

      </div>

      <div class="col-xl-3 col-lg-4 offset-xl-3 offset-lg-1 col-md-5 mb-5">
        <h2 class="pb-2 text-white">Contacto</h2>
        <ul class="list-unstyled fs-sm mb-4 pb-2">
          <li><a class="nav-link-style text-white" href="mailto:ventas@induce.mx" target="_blank">ventas@induce.mx</a></li>
     
          <li><a class="nav-link-style text-white" href="https://wa.me/524433907993" target="_blank">whatsapp +52 443 390 7993</a></li>
        </ul>
        <h3 class="h6 pb-2 text-white">o s&iacute;guenos en:</h3>
        <a class="btn-social bs-outline-light bs-facebook bs-lg me-2 mb-2" href="https://www.facebook.com/inducemarketing" target="_blank">
          <i class="ai-facebook"></i>
        </a><a class="btn-social bs-outline-light bs-twitter bs-lg me-2 mb-2" href="https://twitter.com/inducemarketing" target="_blank">
          <i class="ai-twitter"></i>
        </a><a class="btn-social bs-outline-light bs-instagram bs-lg me-2 mb-2" href="https://www.instagram.com/inducemarketing/" target="_blank">
          <i class="ai-instagram"></i>
        </a>
      </div>

    </div>
  </div>

  <div class="bg-dark pt-0 pb-0">
    <div class="container d-md-flex justify-content-between align-items-center text-center">
      <ul class="list-inline fs-sm mb-3 order-md-2">
        <li class="list-inline-item my-1">Consulta nuestro<a href="./aviso-de-privacidad" class="link-info text-decoration-none" > Aviso de Privacidad</a>
        </li>
      </ul>
      <p class="fs-sm mb-3 order-md-1"><span class="text-light opacity-50 me-1">©Todos los derechos reservados. Desarrollado por</span><a class="nav-link-style nav-link-light" href="./sistema"  rel="noopener">Induce Marketing</a></p>
    </div>
  </div>

</footer>

<!-- SWEET ALERT -->
<script src="./core/backend/js/sweetalert/sweetalert2@9"></script>
<script src="./core/backend/js/sweetalert/promise-polyfill"></script>
<script src="./core/backend/js/sistem.js"></script>
<script src="./core/backend/js/jquery.min.js"></script>