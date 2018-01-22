@extends('layout.principal')
@section('conteudo')
<div id="content">
    <div id="content" style="text-align: center;">
        <h3><b>Universidade Federal Rural de Pernambuco-UFRPE</b></h3>
        <h3><b>Universidade Acadêmica de Garanhuns-UAG</b></h3>
        <h3><b>Setor de Administração de Patrimônio-SAP</b></h3></br>
         <h4><b>TERMO DE RESPONSABILIDADE DE BEM PERMANENTE</b></h4>
         <h4><b>DADOS DO SOLICITANTE</b></h4></br>
    </div>
    <div id="content" style="margin-left: 10%;" >   
        <p><b>Servidor: </b> {{ $solicitacao->nome}}</p>
        
            <p><b>Matricula: </b> {{ $solicitacao->matricula}}</p>
        
           <p><b>Cargo: </b> {{ $solicitacao->cargo}}</p>
       
           <p><b>Sala: </b> {{ $solicitacao->sala}}</p>
        
           <p><b>Prédio: </b> {{ $solicitacao->predio}}</p>
        
           <p><b>Ramal: </b> {{ $solicitacao->ramal}}</p>
            
           <p><b>Curso: </b> {{ $solicitacao->curso}}</p>
        
           <p><b>Descricão: </b> {{ $solicitacao->descricao}}</p>
         
           <p><b>Setor: </b> {{ $solicitacao->setor->descricao}}</p>
           
           <p><b>Data: </b> {{ $solicitacao->data}}</p>
        
</div>
    <div id="content" style="text-align: center;">
        <p><b>_______________________________</br>Assinatira e carimbo do solicitante</b></p>
    </div>
    <div id="content" style="text-align: center;">
        <h6><b>CIÊNCIA DA COORDENAÇÃO OU RESPONSAVEL PELO SETOR</b></h6>
        <p><b>__________________________________</br> Assinatura e carimbo</b></p> 
    </div>
    <div id="content" style="text-align: center;">
        <h6><b>PARA USO DA DIREÇÃO ADMINISTRATIVA</b></h6>
        <p><b>__________________________________</br> Assinatura e carimbo</b></p> 
    </div>
      
</div>
<button type="button" onclick="demoFromHTML()" >Exportar PDF</button>
<script>
    function demoFromHTML() {
        var pdf = new jsPDF('p', 'pt', 'letter');
        // source can be HTML-formatted string, or a reference
        // to an actual DOM element from which the text will be scraped.
        source = $('#content')[0];
        // we support special element handlers. Register them with jQuery-style 
        // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
        // There is no support for any other type of selectors 
        // (class, of compound) at this time.
        specialElementHandlers = {
            // element with id of "bypass" - jQuery style selector
            '#bypassme': function (element, renderer) {
               // true = "handled elsewhere, bypass text extraction"
                return true
            }
            };
        margins = {
            top: 70,
            bottom: 0,
            left: 60,
            width: 500
        };
        // all coords and widths are in jsPDF instance's declared units
        // 'inches' in this case
        pdf.fromHTML(
            source, // HTML string or DOM elem ref.
            margins.left, // x coord
           margins.top,
               { // y coord
               'width': margins.width, // max width of content on PDF
                'elementHandlers': specialElementHandlers
            },
            function (dispose) {
                // dispose: object with X, Y of the last line add to the PDF 
                //          this allow the insertion of new lines after html
                pdf.save('Solicitacão.pdf');
            }, margins
        );
    }
</script>

@stop
