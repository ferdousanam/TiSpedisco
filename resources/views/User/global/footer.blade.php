<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-xs-12">
                <ul class="list-unstyled footer-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Spedisci un pacco</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Traccia un pacco</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Aiuto</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Preferenze</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Ricerca nel sito</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-xs-12">
                <ul class="list-unstyled footer-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Chi siamo</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Spedizioni internazionali</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Spedizioni aziende</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Consegna pacchi internazionale</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Il nostro blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Termini e condizioni</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-7 col-xs-12">
                <div class="card">
                    <p class="card-text-1">Iscriviti alla newsletter e ricevi un buono sconto di 5€ sul primo ordine</p>
                    <form data-form-email novalidate action="/forms/mailchimp.php">
                        <div class="d-flex form-group ">
                            <input class="form-control custom-input" name="email" placeholder="Il tuo indirizzo email" type="email" required>
                            <div class="custom-control custom-checkbox">
                                <input class="form-check-input styled-checkbox-footer" type="checkbox" value=""
                                       id="check-input-footer" required>
                                <label for="check-input-footer" class="form-check-label text-white"> Dichiaro di aver letto e di accettare laa <a href="#">Privacy Policy</a></label>
                                {{--                                    <label class="form-check-label text-white">--}}
                                {{--                                        --}}
                                {{--                                    </label>--}}
                            </div>
                            <button type="submit" class="btn btn-green-outline btn-loading" data-loading-text="Sending">
                                <!-- Icon for loading animation -->
                                {{--                                    <svg class="icon bg-white" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">--}}
                                {{--                                        <title>Icon For Loading</title>--}}
                                {{--                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
                                {{--                                            <g>--}}
                                {{--                                                <polygon points="0 0 24 0 24 24 0 24" opacity="0"></polygon>--}}
                                {{--                                            </g>--}}
                                {{--                                            <path d="M12,4 L12,6 C8.6862915,6 6,8.6862915 6,12 C6,15.3137085 8.6862915,18 12,18 C15.3137085,18 18,15.3137085 18,12 C18,10.9603196 17.7360885,9.96126435 17.2402578,9.07513926 L18.9856052,8.09853149 C19.6473536,9.28117708 20,10.6161442 20,12 C20,16.418278 16.418278,20 12,20 C7.581722,20 4,16.418278 4,12 C4,7.581722 7.581722,4 12,4 Z"--}}
                                {{--                                                  fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 12.000000) scale(-1, 1) translate(-12.000000, -12.000000) "></path>--}}
                                {{--                                        </g>--}}
                                {{--                                    </svg>--}}
                                <span>Invia</span>
                            </button>
                        </div>
                        <div data-recaptcha data-sitekey="INSERT_YOUR_RECAPTCHA_V2_SITEKEY_HERE" data-size="invisible" data-badge="bottomleft"></div>
                        {{--                            <div class="d-none alert alert-success w-100" role="alert" data-success-message>--}}
                        {{--                                Thanks, a member of our team will be in touch shortly.--}}
                        {{--                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="d-none alert alert-success w-100" role="alert" data-success-message>--}}
                        {{--                                Thanks, a member of our team will be in touch shortly.--}}
                        {{--                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                        {{--                            </div>--}}
                        <div class="text-small text-muted">La tua privacy è al sicuro</div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <hr style="border-color: rgba(255, 255, 255, 0.1);">
            </div>
        </div>
        <div class="row flex-column flex-lg-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
            <div class="col-auto">
                <div class="text-left">
                    <div class="text-muted footer-text">&copy; 2019 TiSpedisco | A TranService Company - vat IT123456789 - REA LC-124577 | <a href="" target="_blank">Privacy Policy</a> - <a href="" target="_blank">Cookie Policy</a> - <a href="" target="_blank">Reclami</a> - <a href="" target="_blank">Termini e Condizioni</a><br/>
                        Tutti i testi e la grafica presenti nel sito sono soggetti alle norme vigenti in materia di diritto d'autore.
                    </div>
                </div>
            </div>
            <div class="payments">
                <img src="{{asset('images/home-img/payments.png')}}" >
            </div>
        </div>
    </div>
</footer>