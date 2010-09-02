<?php
require_once 'PHPUnit/Extensions/Story/TestCase.php';
 
require_once 'includes/classes/ImportaPlanilha.php';
 
class ImportaPlanilhaSpec extends PHPUnit_Extensions_Story_TestCase
{


/*
 * Cenarios
 *
 * - Deve responder aos comandos:
 *   showHome
 *   verifica
 *   confirma
 *   importa
 * - Deve verificar a integridade da planilha
 * - Deve apresentar confirmacao em tabelaDeDados 
 * - Deve salvar os dados no banco
 * */
    private $stub;


/**
     * @scenario
     */
    public function DeveResponderAosComandos()
    {
        $this->given('Tela Inicial')
            ->then('showHome')
            ->and ('verifica')
            ->and ('confirma')
            ->and ('importa')
            ;
    }


    /**
     * @scenario
     */
    public function DeveVerificarAIntegridadeDaPlanilha()
    {
        $this->given('A planilha foi importada','testes/data/planilha.csv')
             ->when('planilha', 'testes/data/planilha.csv')
             ->and('csv', 0)
             ->and('teste', 3)
             ->then('sucesso', true);
    }

    /**
     * @scenario
     */
    public function DeveApresentarAConfirmacaoEmTabela()
    {
        $this->given('Confirmar dados')
             ->when('teste', 5)
             ->and('teste', 5)
             ->and('teste', 3)
             ->then('sucesso', true);
    }

    /**
     * @scenario
     */
    public function DeveSalvarOsDadosNoBanco()
    {
        $this->given('Confirmar dados')
             ->when('teste', 5)
             ->and('teste', 5)
             ->and('teste', 3)
             ->then('sucesso', true);
    }



    public function runGiven(&$world, $action, $arguments)
    {
        switch($action) {
        
        case 'Tela Inicial': {
                $world['stub'] = $this->getMock('ImportaPlanilha',array(
                    'showHome',
                    'verifica',
                    'confirma',
                    'csvparse',
                    'importa'
                ));

                $world['stub']->expects($this->any())
                    ->method('verifica')
                    ->will($this->returnCallback('meuHome'));
                
                $world['stub']->expects($this->any())
                    ->method('confirma')
                    ->will($this->returnCallback('meuHome'));
                
                $world['stub']->expects($this->any())
                    ->method('importa')
                    ->will($this->returnCallback('meuHome'));
                
                $world['stub']->expects($this->any())
                    ->method('showHome')
                    ->will($this->returnCallback('meuHome'));

                $world['stub']->expects($this->any())
                    ->method('csvparse')
                    ->will($this->returnCallback('meuHome'));
 
        }
        break;
            
    case 'A planilha foi importada' : {
            $this->assertFileExists($arguments[0], $message = 'Arquivo nao encontrado');
        }
        break;
        
        default: {
                return $this->notImplemented($action);
            }
        }
    }
 
    public function runWhen(&$world, $action, $arguments)
    {
        switch($action) {
            case 'teste': {
                //$world['controle']->setId($arguments[0]);
                $world['rolls']++;
            }
            break;
 
        case 'planilha': {
                $world['stub'] = $this->getMock('ImportaPlanilha',array(
                    'csvparse',
                ));

               $world['stub']->expects($this->any())
                    ->method('csvparse')
                    ->will($this->returnCallback('meuHome'));
 
                $world['stub']->csvparse($arguments[0]);
             }
            break;

            default: {
                return $this->notImplemented($action);
            }
        }
    }
 
    public function runThen(&$world, $action, $arguments)
    {
        switch($action) {
            case 'showHome': {
                $world['stub']->showHome();
            }
            break;
             case 'verifica': {
                $world['stub']->verifica();
            }
            break;
             case 'confirma': {
                $world['stub']->confirma();
            }
            break;
             case 'importa': {
                $world['stub']->importa();
            }
            break;
 
            default: {
                return $this->notImplemented($action);
            }
        }
    }


}

    function meuHome($argumento = 'None'){
        echo "Mock recebeu argumento: $argumento\n";
        return 'ok';
     }






?>
