<!DOCTYPE html>
<html lang="pt-BR">
    <head>

        <!-- Google AdSense  -->

        <script data-ad-client="ca-pub-1208880418981826" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/functions.js') }}"></script>
        <script src="{{ asset('js/jquery.mask.js') }}"></script>  
        <script src="{{ asset('js/materialize.min.js') }}"></script> 
        <!-- <script src="{{ asset('js/saveConvenio.js') }}"></script>  -->
        <script src="{{ asset('js/jquery.serializeObject.js') }}"></script>  
              
        <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> -->
        <link rel="stylesheet" href=" {{ asset('css/select2.css') }}">
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified CSS MATERIALIZE -->
        <link rel="stylesheet" href=" {{ asset('css/style.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!-- Compiled and minified JavaScript MATERIALIZE -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> -->

        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        
    </head>

    <body>
        <div class="container-fluid">
            <nav>
                <div class="nav-wrapper cyan darken-3">
                    <a href="/" class="brand-logo margin-left">Intranet</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        @if(empty(session('logged')))
                            <li><a href="#login" class="modal-trigger" >Login</a></li>
                        @else
                            <a class='dropdown-trigger' href='#' data-target='dropdown1'>{{ session('name') }}</a>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>

        <div id="login" class="modal bottom-sheet">
            <div class="modal-content">
                <div class="container">
                    <h3 class="margin-bottom-2">Login</h3>
                    <form class="margin-top" method="POST" action="login">
                        @csrf
                        <div class="input-field">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="icon_prefix" type="text" name="usuario" class="validate">
                            <label for="icon_prefix">Usuário</label>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">vpn_key</i>
                            <input id="password" type="password" name="password" class="validate">
                            <label for="password">Password</label>
                        </div>
                        <button class="btn waves-effect waves-light" type="submit">Acessar
                            <i class="material-icons right">send</i>
                        </button>
                        <a href="#" class="modal-close waves-effect waves-green btn-flat">Voltar</a>
                    </form>
                </div>
            </div>                
        </div>   

        @php
            function active($path, $active = 'active'){
                return Request::is($path) ? $active : null;
            }
        @endphp

        <!-- Dropdown Structure -->
        <ul id='dropdown1' class='dropdown-content'>
            <li><a href="#!">Perfil</a></li>     
            <li class="divider" tabindex="-1"></li>
            @if(active("/"))
                <li><a href='/dashboard'>Dashboard</a></li>
            @else
                <li><a href='/'>Início</a></li>
            @endif                 
            <li class="divider" tabindex="-1"></li>
            <li><a href="/logout">Logout</a></li>
        </ul>

        @yield('search')
        @yield('tabs')
        @yield('procedimento')

        <script src="{{ asset('js/search.js') }}"></script>

        
        <script>

            $(document).on('click','a', function () {
                $(".js-example-basic-single").select2({
                    tags: true
                })                      
            })

            M.AutoInit();

            var toolbarOptions = [
                [{ 'font': [] }],
                [{ 'size': ['small', false, 'large', 'huge'] }],

                ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                ['blockquote', 'code-block'],

                [{ 'header': 1 }, { 'header': 2 }],               // custom button values
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
                [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
                [{ 'direction': 'rtl' }],                         // text direction

                [{ 'color': [] }, { 'background': [] }],
                [{ 'align': [] }],

                ['image','video','link'],

                ['clean']                                         // remove formatting button
            ];

            var options = {
                debug: 'info',
                placeholder: 'Digite o procedimento...',                
                modules: {
                    toolbar: toolbarOptions
                },
                theme: 'snow'
            }
                
            const quill = new Quill('#editor', options);
            const quillBox = new Quill('#alter', options)
            
        </script>

    </body>
</html>