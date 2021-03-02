    @extends('layouts.layout')

    @section('search')
        <div class="container" id="search">
            <div class="row margin-top-5">
                <div class="col s12">
                    <div class="row">
                    <form action=""></form>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">search</i>
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <input type="text" id="autocomplete-input" name="search" class="autocomplete">
                            <label for="autocomplete-input">Pesquisar...</label>
                        </div>
                    </div>
                </div>
            </div>
        </div> 

        <ul class="pagination center-align margin-left">
            <li class="waves-effect"><a href="#!">A</a></li>
            <li class="waves-effect"><a href="#!">B</a></li>
            <li class="waves-effect"><a href="#!">C</a></li>
            <li class="waves-effect"><a href="#!">D</a></li>
            <li class="waves-effect"><a href="#!">E</a></li>
            <li class="waves-effect"><a href="#!">F</a></li>
            <li class="waves-effect"><a href="#!">G</a></li>
            <li class="waves-effect"><a href="#!">H</a></li>
            <li class="waves-effect"><a href="#!">I</a></li>
            <li class="waves-effect"><a href="#!">J</a></li>
            <li class="waves-effect"><a href="#!">K</a></li>
            <li class="waves-effect"><a href="#!">L</a></li>
            <li class="waves-effect"><a href="#!">M</a></li>
            <li class="waves-effect"><a href="#!">N</a></li>
            <li class="waves-effect"><a href="#!">O</a></li>
            <li class="waves-effect"><a href="#!">P</a></li>
            <li class="waves-effect"><a href="#!">Q</a></li>
            <li class="waves-effect"><a href="#!">R</a></li>
            <li class="waves-effect"><a href="#!">S</a></li>
            <li class="waves-effect"><a href="#!">T</a></li>
            <li class="waves-effect"><a href="#!">U</a></li>
            <li class="waves-effect"><a href="#!">V</a></li>
            <li class="waves-effect"><a href="#!">W</a></li>
            <li class="waves-effect"><a href="#!">X</a></li>
            <li class="waves-effect"><a href="#!">Y</a></li>
            <li class="waves-effect"><a href="#!">Z</a></li>
        </ul> 
           
        <script src="js/searchByLetter.js"></script>   

        <div class="container" id="cards">
            <div class="margin-top-2 loading"></div>
            <div class="insert"></div>          
        </div>
    @endsection       
        