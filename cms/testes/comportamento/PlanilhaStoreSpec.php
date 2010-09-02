<?php
require_once 'PHPUnit/Extensions/Story/TestCase.php';
require_once 'includes/classes/PlanilhaStore.php';
require_once 'includes/classes/Filme.php';
require_once 'includes/config.inc.php';

function getOffset(){
    global $offset;
    return $offset;
}

function getTitulos(){
    global $campos_import;
    return $campos_import;
}

function getCsv(){
    return "data/uploads/anima.csv";
}

class ImportaPlanilhaSpec extends PHPUnit_Extensions_Story_TestCase
{


/*
 * Cenarios
 *
 * - Deve receber o path do csv e o array com os titulos dos campos 
 * e se construir 
 * - Deve processar o csv e retornar um array
 * - Deve mapear as colunas com os titulos fornecidos
 * - Deve verificar a integridade dos dados
 * - Deve salvar os dados no banco
 * */

    private $titulos;
    private $csv;
    private $csvArray;

    /**
     * @scenario
     */

    public function RecebeOPathDoCsvEOArrayComOsTitulosDosCamposNoConstrutor()
    {
        $this->given('Construir com csv e titulos')
             ->then('Sou um objeto', true);
    }

    /**
     * @scenario
     */
    public function DeveProcessarOCsvERetornarUmArray()
    {
        $this->given('Construir com csv e titulos')
             ->when('Chama o csvParse')
             ->then('Retorna array com getData', true);
    }

    /**
     * @scenario
     */
    public function DeveMaperarAsColunasComOsTitulos()
    {
        $this->given('Construir com csv e titulos')
            ->when('Chama o csvParse')
            ->and('Mapear Campos')
             ->then('Retorna array com getMappedData', true);
    }

    /**
     * @scenario
     */
    public function DeveVerificarAIntegridadeDosDados()
    {
        $this->given('Construir com csv e titulos')
            ->when('Seta titulos errado')
            ->and('Chama o csvParse')
             ->and('Chama o verificador',false)
             ->then('Retorna erro com error()', true);
    }

    /**
     * @scenario
     */
    public function DeveSalvarOsDadosNoBanco()
    {
        $this->given('Construir com csv e titulos')
            ->when('Chama o csvParse')
             ->and('Chama o verificador',true)
             ->and('Mapear Campos')
             ->and('Salva no banco',true)
             ->then('Retorna dado do banco', 'Alguma coisa');
    }



    //////////////////////////////////////////////////////////

    public function runGiven(&$world, $action, $arguments)
    {
        switch($action) {
        
        case 'Construir com csv e titulos': {
            $world['pst'] = new PlanilhaStore(getCsv(),getTitulos());
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
        case 'Chama o csvParse': {
            $world['pst']->loadCsv();
            }
            break;
           

         case 'Salva no banco': {
            $world['pst']->saveBd(true); // substitui
            }
            break;

        case 'Chama o verificador': {
            $this->assertEquals($arguments[0], $world['pst']->verifyCsv());
            }
            break;
           
          case 'Seta titulos errado': {
            $world['pst']->setTitles(null);
            }
            break;
        case 'Mapear Campos': {
            $offset = getOffset();
            $world['pst']->mapTitles($offset);
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
            case 'Sou um objeto': {
                $this->assertObjectHasAttribute('csv', $world['pst'], $message = 'Nao esta instanciando o objeto PlanilhaStore');
            }
            break;

            case 'Retorna array com getData': {
                $this->assertType('array',$world['pst']->getData(), $message = 'Nao esta criando o array');
            }
            break;

        case 'Retorna array com getMappedData': {
                $this->assertType('array',$world['pst']->getMappedData(), $message = 'Nao esta criando o array');
            }
            break;


             case 'Retorna erro com error()': {
                $this->assertContains('error', $world['pst']->error(), $message = 'Nao esta retornando a mensagem de erro');
            }
            break;

        case 'Retorna dado do banco': {
            $world['filme'] = new Filme();
            $this->assertEquals(
                $arguments[1],
                $world['filme']->getTitulo($arguments[0])
            );
            }
            break;

        
        default: {
                return $this->notImplemented($action);
            }
        }
    }


}


?>
