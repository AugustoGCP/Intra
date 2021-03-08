@extends('layouts.layout')
@section('tabs')

    <div class="container-fluid">
        <div class="row margin-3 ">
            <div class="col s12">
                <ul class="tabs z-depth-2">
                    <li class="tab col s3"><a href="#cadastro" >Cadastro de Convênios</a></li>
                    <li class="tab col s3"><a href="#criar" >Criar Procedimentos</a></li>
                    <li class="tab col s3"><a href="#editar_convenio" >Editar Convênio</a></li>                    
                    <li class="tab col s3"><a href="#editar_procedimento" >Editar Procedimento</a></li>
                </ul>
            </div>

            <div id="cadastro" class="col s12">
                <div class="row margin-top-2">
                    <form class="col s12" id="form_cadastro_convenio" method="POST" action="/dashboard/convenio/store">
                        @csrf  
                        <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="nome_convenio" name="nome_convenio" type="text" class="validate">
                                <label for="nome_convenio">Nome do Convênio</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s4">
                                <input placeholder="Rua, Avenida..." id="rua" name="rua_convenio" type="text" class="validate">
                                <label for="rua">Rua</label>
                            </div>
                            <div class="input-field col s4">
                                <input id="bairro" palceholder="Bairro" name="bairro_convenio" type="text" class="validate">
                                <label for="bairro">Bairro</label>
                            </div>
                            <div class="input-field col s4">
                                <input id="cidade" placeholder="Cidade" name="cidade_convenio" type="text" class="validate">
                                <label for="cidade">Cidade</label>
                            </div>
                        </div>
                        <div class="row">
                            <div id="reference">
                                <div class="input-field col s2">
                                    <i class="material-icons prefix">phone</i>
                                    <input id="input-field col s3 icon_telephone" maxlength="15" name="telefone[]" type="tel" class="validate">
                                    <a id="add" class="btn-floating btn-small waves-effect waves-light green">
                                        <i class="material-icons">add</i>
                                    </a>
                                    <label for="icon_telephone">Telefone</label>
                                </div>
                            </div>                            
                            <div id="insert"></div>
                        </div>                   
                        <button id="cadastrar_convenio" type="submit" class="btn waves-effect waves-light" name="action">Cadastrar
                            <i class="material-icons right">send</i>
                        </button>
                    </form>
                    <!-- <script src="js/telefone.js"></script>                 -->
                </div>
            </div>

            <div id="criar" class=" col s12"> 
                <form class="col s12" id="form_procedimento" method="POST" action="dashboard/procedimento/store">
                    @csrf
                    <div class="row margin-top-2">                      
                        <div class=" input-field col s6">
                        <select class="select" id="cod_convenio_edit" name="pertence">
                            <option disabled selected>Escolha o Convênio</option>
                                @foreach($convenios as $convenio)
                                    <option value="{{ $convenio->cod_convenio }}">{{ $convenio->nome_convenio }}</option>
                                @endforeach
                            </select>
                            <label>Selecione o Convênio</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="titulo" placeholder="Título do Procedimento" name="nome_procedimento" type="text" class="validate">
                            <label for="cidade">Título</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="cabecalho_procedimento" name="cabecalho_procedimento" maxlenght="144" class="materialize-textarea"></textarea>
                            <label for="cabecalho_procedimento">Descrição do Procedimento</label>
                        </div>
                    </div>
                    <div class="row">                                       
                        <label class="margin-left" for="cidade">Procedimento</label>
                        <div class="input-field col s12">     
                            <input type="hidden" name="corpo_procedimento"/>
                            <div id="editor">
                            </div>                            
                        </div>
                    </div>
                    <div class="teste"></div>
                    <button class="btn waves-effect waves-light" type="submit" name="action" id="criar">Criar
                        <i class="material-icons right">send</i>
                    </button>
                </form>
            </div>
            <div id="editar_convenio" class="margin-top-2 col s12">
                <form action="/dashboard/convenio/update" method="POST">
                    @csrf                    
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div class="row">
                        <div class="input-fiel col s12">
                            <select name="cod_convenio" id="cod_convneio" class="select">
                                <option value="" disabled selected>Escolha o Convênio</option>
                                @foreach($convenios as $convenio)
                                    <option value="{{ $convenio->cod_convenio }}">{{ $convenio->nome_convenio }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="nome_edit" name="nome_convenio" type="text" class="validate">
                            <label for="nome_convenio">Nome do Convênio</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <input id="rua_edit" placeholder="Rua, Avenida..." name="rua_convenio" type="text" class="validate">
                            <label for="rua_edit">Rua</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="bairro_edit" palceholder="Bairro" name="bairro_convenio" type="text" class="validate">
                            <label for="bairro_edit">Bairro</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="cidade_edit" placeholder="Cidade" name="cidade_convenio" type="text" class="validate">
                            <label for="cidade">Cidade</label>
                        </div>
                    </div>
                    <div class="row">
                        <div id="reference_edit">
                            <div class="input-field col s2">
                                <i class="material-icons prefix">phone</i>
                                <input id="input-field col s3 icon_telephone" maxlength="15" name="telefone[]" type="tel" class="validate">
                                <a id="add_edit" class="btn-floating btn-small waves-effect waves-light green">
                                    <i class="material-icons">add</i>
                                </a>
                                <label for="icon_telephone">Telefone</label>
                            </div>
                        </div>                            
                        <div id="insert_edit"></div> 
                        <script src="{{ asset('js/searchConvenio.js') }}"></script>
                        <script src="{{ asset('js/telefone.js') }}"></script>                
                    </div> 
                    <div class="divider"></div>
                        <p>
                            <label>
                                <input type="checkbox"/>
                                <span>Ativado</span>
                            </label>
                        </p>
                    <button class="btn waves-effect waves-light" type="submit" name="action">Alterar
                        <i class="material-icons right">send</i>
                    </button>
                </form>               
            </div>
            <div id="editar_procedimento" class="col s12">
                <form class="col s12" id="form_procedimento_edit" method="POST" action="/dashboard/procedimento/update">
                    @csrf
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div class="row margin-top-2">  
                        <div class="row">
                            <div class=" input-field col s6">                            
                                <select class="js-example-basic-single no-autoinit" id="cod_convenioEdit" name="cod_convenio_edit">
                                    <option disabled selected>Escolha o Convênio</option>       
                                        @foreach($convenios as $convenio)
                                            <option value="{{ $convenio->cod_convenio }}">{{ $convenio->nome_convenio }}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div id="loader" class="center-align input-field col s6" hidden>
                                <div class="preloader-wrapper small active">
                                    <div class="spinner-layer spinner-cyan-only">
                                        <div class="circle-clipper left">
                                            <div class="circle"></div>
                                        </div>
                                        <div class="gap-patch">
                                            <div class="circle"></div>
                                        </div>
                                        <div class="circle-clipper right">
                                            <div class="circle"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="procedimentos" class="input-field col s6">
                                <select id="cod_procedimento" name="cod_procedimento" class="js-example-basic-single select no-autoinit">
                                    <option disabled selected>Escolha o Procedimento</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">                                                       
                        <div class="input-field col s12 no-margin">
                            <input id="nome_procedimento_edit" placeholder="Título do Procedimento" name="nome_procedimento_edit" type="text" class="validate">
                            <label for="cidade">Título</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="cabecalho_procedimento_edit" name="cabecalho_procedimento_edit" maxlenght="144" class="materialize-textarea"></textarea>
                            <label for="cabecalho_procedimento">Descrição do Procedimento</label>
                        </div>
                    </div>
                    <div class="row">                                       
                        <label class="margin-left" for="cidade">Procedimento</label>
                        <div class="input-field col s12">     
                            <input type="hidden" name="corpo_procedimento_edit"/>
                            <div id="alter"></div>                            
                        </div>
                    </div>
                    <button onclick="M.toast({html: 'Alteração realizado com sucesso!'})" class="btn waves-effect waves-light" type="submit" name="action" id="editar">Salvar
                        <i class="material-icons right">send</i>
                    </button>
                </form>
                <script src="{{ asset('js/searchProcedimento.js') }}"></script>
                <script src="{{ asset('js/searchStructProcedimento.js') }}"></script>
                <script src="{{ asset('js/form.js') }}"></script>
            </div>
        </div>
    </div>    

@endsection
