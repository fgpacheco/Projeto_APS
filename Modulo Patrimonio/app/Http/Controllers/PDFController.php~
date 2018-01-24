<?php

namespace web\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use web\Servidor;
use web\Setor;
use web\Patrimonio;
use web\Departamento;
use web\Usuario;
use web\Predio;
use web\Sala;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller {

    public function selecao() {
        return view('pdf.selecao_pdf');
    }

    public function gerarPdf(Request $request) {
        if ($request->download == 'download') {
            switch ($request->rb) {
                case 'Solitacoes':
                    break;
                case 'Usuarios':
                   $pdf = $this->usuarioPdfDown();
                    return $pdf->download('Usuarios.pdf');
                    break;
                case 'Servidores':
                    $pdf = $this->servidorPdfDown();
                    return $pdf->download('Servidores.pdf');
                    break;
                case 'Setores':
                    $pdf = $this->setorPdfDown();
                    return $pdf->download('Setores.pdf');
                    break;
                case 'Departamentos':
                    $pdf = $this->departamentoPdfDown();
                    return $pdf->download('Departamentos.pdf');
                    break;
                case 'Salas_Predios':
                	  $pdf = $this->predioPdfDown();
                    return $pdf->download('Predios_Salas.pdf');
                    break;
                case 'Bens':
                    $pdf = $this->bensPdfDown();
                    return $pdf->download('BensPermanentes.pdf');
                    break;
            }
        } else {
            switch ($request->rb) {
                case 'Solitacoes':
                    break;
                case 'Usuarios':
                    $pdf = $this->usuarioPdfStream();
                    return $pdf->stream('Usuarios');
                    break;
                case 'Servidores':
                    $pdf = $this->servidorPdfStream();
                    return $pdf->stream('Servidores');
                    break;
                case 'Setores':
                    $pdf = $this->setorPdfStream();
                    return $pdf->stream('Setores');
                    break;
                case 'Departamentos':
                    $pdf = $this->departamentoPdfStream();
                    return $pdf->stream('Departamentos');
                    break;
                case 'Salas_Predios':
                	  $pdf = $this->predioPdfStream();
                    return $pdf->stream('Predios_Salas.pdf');
                    break;
                case 'Bens':
                    $pdf = $this->bensPdfStream();
                    return $pdf->stream('BensPermanentes.pdf');
                    break;
            }
        }
    }

    private function servidorPdfStream() {
        $servidores = Servidor::orderBy('nome')->get();
        $view = view('pdf.servidores_pdf', ['servidores' => $servidores]);
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHtml($view);
        return $pdf;
    }

    private function servidorPdfDown() {
        $servidores = Servidor::orderBy('nome')->get();
        return PDF::loadView('pdf.servidores_pdf', ['servidores' => $servidores]);
    }

    private function setorPdfStream() {
        $setores = Setor::orderBy('descricao')->get();
        $view = view('pdf.setores_pdf', ['setores' => $setores]);
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHtml($view);
        return $pdf;
    }

    private function setorPdfDown() {
        $setores = Setor::orderBy('descricao')->get();
        return PDF::loadView('pdf.setores_pdf', ['setores' => $setores]);
    }

    private function bensPdfStream() {
        $patrimonio = Patrimonio::orderBy('descricao')->get();
        $view = view('pdf.patrimonio_pdf', ['patrimonio' => $patrimonio]);
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHtml($view);
        return $pdf;
    }

    private function bensPdfDown() {
        $patrimonio = Patrimonio::orderBy('descricao')->get();
        return PDF::loadView('pdf.patrimonio_pdf', ['patrimonio' => $patrimonio]);
    }

    public function bensSetor(Request $request) {
        $setor = $request->setor;
        $patrimonio = DB::select("SELECT patrimonios.descricao as nomep, patrimonios.numeropatrimonio, setors.descricao FROM projetoweb.patrimonios, projetoweb.patrimonio_setor, projetoweb.setors "
                        . "WHERE  patrimonios.id = patrimonio_setor.patrimonio_id and setors.id = patrimonio_setor.setor_id and setors.descricao = " . "'" . $request->setor . "'" . "");
        return PDF::loadView('pdf.bensSetor_pdf', ['patrimonio' => $patrimonio, 'setor' => $setor])->download('bensSetor.pdf');
    }

    public function bensSala(Request $request) {
        $sala = $request->sala;
        $patrimonio = DB::select("SELECT patrimonios.descricao as nomep, patrimonios.numeropatrimonio, patrimonios.dataaquisicao FROM projetoweb.patrimonios, projetoweb.patrimonio_setor, projetoweb.setors, projetoweb.salas "
                        . "WHERE  patrimonios.id = patrimonio_setor.patrimonio_id and setors.id = patrimonio_setor.setor_id and salas.descricao = " . "'" . $request->sala . "'" . " and salas.id = setors.sala_id");
        return PDF::loadView('pdf.bensSala_pdf', ['patrimonio' => $patrimonio, 'sala' => $sala])->download('bensSala.pdf');
    }

    public function bensNotaFiscal(Request $request) {
        $numero = $request->numero;
        $patrimonio = Patrimonio::where('numeronotafiscal', $request->numero)->get();
        return PDF::loadView('pdf.bensNotaFiscal_pdf', ['patrimonio' => $patrimonio, 'numero' => $numero])->download('bensNotaFiscal.pdf');
    }

    public function bensEmpenho(Request $request) {
        $numero = $request->numero;
        $patrimonio = Patrimonio::where('numeroempenho', '=', $request->numero)->get();
        return PDF::loadView('pdf.bensEmpenho_pdf', ['patrimonio' => $patrimonio, 'numero' => $numero])->stream('bensEmpenho.pdf');
    }

    
     private function usuarioPdfStream()
    {
        $usuarios = Usuario::orderBy('name')->get();
        $view = view('pdf.usuarios_pdf', ['usuarios' => $usuarios]);
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHtml($view);
        return $pdf;

    }
    
    private function usuarioPdfDown()
    {
       $usuarios = Usuario::orderBy('name')->get();
        return PDF::loadView('pdf.usuarios_pdf', ['usuarios' => $usuarios]);
    }
     
     private function predioPdfStream()
    {
        $predios = Predio::orderBy('descricao')->get();
        $salas = Sala::all();
        $view = view('pdf.predios_pdf', ['predios' => $predios,'salas'=>$salas]);
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHtml($view);
        return $pdf;

    }
     private function predioPdfDown()
    {
        $predios = Predio::orderBy('descricao')->get();
        $salas = Sala::all();
        return PDF::loadView('pdf.predios_pdf', ['predios' => $predios,'salas'=>$salas]);
    }

    

    private function departamentoPdfStream()
    {
        $departamentos = Departamento::orderBy('departamento')->get();
        $view = view('pdf.departamento_pdf', ['departamentos' => $departamentos]);
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHtml($view);
        return $pdf;

    }

    private function departamentoPdfDown()
    {
       $departamentos = Servidor::orderBy('departamento')->get();
        return PDF::loadView('pdf.departamento_pdf', ['departamentos' => $departamentos]);
    }

}
