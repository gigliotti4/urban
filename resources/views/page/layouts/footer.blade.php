
<footer>
    <div class="container">
        <div class="row">
            <!-- Logo -->
            <div class="col-12 col-md-3">
                <img src="{{ asset(Storage::url($logo->logo_footer)) }}" class="footer-logo mb-4"><br>
                <a href="{{ $redes->instagram }}" class="me-2">

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M17.5 6.5H17.51M7 2H17C19.7614 2 22 4.23858 22 7V17C22 19.7614 19.7614 22 17 22H7C4.23858 22 2 19.7614 2 17V7C2 4.23858 4.23858 2 7 2ZM16 11.37C16.1234 12.2022 15.9813 13.0522 15.5938 13.799C15.2063 14.5458 14.5931 15.1514 13.8416 15.5297C13.0901 15.9079 12.2384 16.0396 11.4078 15.9059C10.5771 15.7723 9.80976 15.3801 9.21484 14.7852C8.61992 14.1902 8.22773 13.4229 8.09407 12.5922C7.9604 11.7616 8.09207 10.9099 8.47033 10.1584C8.84859 9.40685 9.45419 8.79374 10.201 8.40624C10.9478 8.01874 11.7978 7.87659 12.63 8C13.4789 8.12588 14.2649 8.52146 14.8717 9.12831C15.4785 9.73515 15.8741 10.5211 16 11.37Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                </a>
                <a href="{{ $redes->facebook }}" class="me-2">

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                      <path d="M18 2H15C13.6739 2 12.4021 2.52678 11.4645 3.46447C10.5268 4.40215 10 5.67392 10 7V10H7V14H10V22H14V14H17L18 10H14V7C14 6.73478 14.1054 6.48043 14.2929 6.29289C14.4804 6.10536 14.7348 6 15 6H18V2Z" fill="white"/>
                    </svg>
                </a>
            </div>

            <!-- Secciones -->
            <div class="col-6 col-md-3">
                <span class="footer__secciones mb-3">Secciones</span>
                <div class="d-flex flex-column">
                    <a href="#" class="nav__footer">Servicios</a>
                    <a href="#" class="nav__footer">Catalogos</a>
                    <a href="#" class="nav__footer">Sobre Nosotros</a>
            
                </div>
            </div>

            <!-- Como comprar -->
            <div class="col-6 col-md-2 mt-4">
                <div class="d-flex flex-column">
                  
                    <a href="#" class="nav__footer">Nuestro Proceso</a>
                    <a href="#" class="nav__footer">Blog</a>
                    <a href="#" class="nav__footer">Contacto</a>
                </div>
            </div>

            <!-- Contacto -->
            <div class="col-12 col-md-4">
                <span class="footer__secciones">Información de Contacto</span>
                <div class="contact-info">
                    <div class="contact-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"><path d="M16.6673 8.33335C16.6673 13.3334 10.0007 18.3334 10.0007 18.3334C10.0007 18.3334 3.33398 13.3334 3.33398 8.33335C3.33398 6.56524 4.03636 4.86955 5.28661 3.61931C6.53685 2.36907 8.23254 1.66669 10.0007 1.66669C11.7688 1.66669 13.4645 2.36907 14.7147 3.61931C15.9649 4.86955 16.6673 6.56524 16.6673 8.33335Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M10 10.8333C11.3807 10.8333 12.5 9.71402 12.5 8.33331C12.5 6.9526 11.3807 5.83331 10 5.83331C8.61929 5.83331 7.5 6.9526 7.5 8.33331C7.5 9.71402 8.61929 10.8333 10 10.8333Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        <a href="{{$contacto->enlace}}" target="_blank" class="nav__footer">{{$contacto->direccion}}</a>
                    </div>
                    <div class="contact-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"><path d="M18.3332 14.1V16.6C18.3341 16.8321 18.2866 17.0618 18.1936 17.2744C18.1006 17.4871 17.9643 17.678 17.7933 17.8349C17.6222 17.9918 17.4203 18.1112 17.2005 18.1856C16.9806 18.2599 16.7477 18.2875 16.5165 18.2666C13.9522 17.988 11.489 17.1118 9.32486 15.7083C7.31139 14.4289 5.60431 12.7218 4.32486 10.7083C2.91651 8.53432 2.04007 6.05914 1.76653 3.48331C1.7457 3.25287 1.77309 3.02061 1.84695 2.80133C1.9208 2.58205 2.03951 2.38055 2.1955 2.20966C2.3515 2.03877 2.54137 1.90224 2.75302 1.80875C2.96468 1.71526 3.19348 1.66686 3.42486 1.66665H5.92486C6.32928 1.66267 6.72136 1.80588 7.028 2.06959C7.33464 2.3333 7.53493 2.69952 7.59153 3.09998C7.69705 3.90003 7.89274 4.68558 8.17486 5.44165C8.28698 5.73992 8.31125 6.06407 8.24478 6.37571C8.17832 6.68735 8.02392 6.9734 7.79986 7.19998L6.74153 8.25831C7.92783 10.3446 9.65524 12.072 11.7415 13.2583L12.7999 12.2C13.0264 11.9759 13.3125 11.8215 13.6241 11.7551C13.9358 11.6886 14.2599 11.7129 14.5582 11.825C15.3143 12.1071 16.0998 12.3028 16.8999 12.4083C17.3047 12.4654 17.6744 12.6693 17.9386 12.9812C18.2029 13.2931 18.3433 13.6913 18.3332 14.1Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        <a href="tel:{!!$contacto->telefono!!}" class="nav__footer">{{$contacto->telefono}}</a>
                    </div>
                    <div class="contact-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"><path d="M16.666 3.33331H3.33268C2.41221 3.33331 1.66602 4.07951 1.66602 4.99998V15C1.66602 15.9205 2.41221 16.6666 3.33268 16.6666H16.666C17.5865 16.6666 18.3327 15.9205 18.3327 15V4.99998C18.3327 4.07951 17.5865 3.33331 16.666 3.33331Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M18.3327 5.83331L10.8577 10.5833C10.6004 10.7445 10.3029 10.83 9.99935 10.83C9.69575 10.83 9.39829 10.7445 9.14102 10.5833L1.66602 5.83331" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        <a href="mailto:{!!$contacto->correo!!}" class="nav__footer">{{$contacto->correo}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div style="background-color: #252627; line-height: 50px;">
    <div class="container h-100">
 
        <div class="row h-100 align-items-center">
     
            <div class="col-md-6 text-md-start text-center">
                <span class="text-white by-texto">
                    © Copyright 2025 Urban Projects Barcelona
                    Todos los derechos reservados
                </span>
            </div>
         
            <div class="col-md-6 text-md-end text-center">
                <a href="https://www.estudiolazo.com/" target="_bank" class="text-white by-lazo">
                    By Estudio Lazo
                </a>
            </div>
        </div>
    </div>
</div>







