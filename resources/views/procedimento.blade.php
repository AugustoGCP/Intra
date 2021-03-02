@extends('layouts.layout')
@section('procedimento')

    <div class="z-depth-2 margin margin-top-3 padding">

        <a href ="/" class="waves-effect waves-light btn-small margin-bottom">Voltar</a>
        <div class="divider"></div>
        @foreach($array as $convenio)
            <h1>{{ $convenio['nome_convenio'] }}</h1>

            <h3>{{ $convenio['nome_procedimento'] }}</h3>

            <h5>Telefones:</h5>
            <p>                
                @foreach($convenio['telefones'] as $telefone)
                    {{ $telefone }} 
                @endforeach
            </p>

            <div id="show"></div>    
            <script>

                const insertingQuill = new Quill('#show');
                
                $('#show').ready(function(){
                    insertingQuill.enable(false)
                    $(this).val(insertingQuill.setContents({!! $convenio['corpo_procedimento'] !!}))
                })
                
            </script>
        @endforeach

    </div>
@endsection