<?php
require_once 'PHPUnit/Extensions/Story/TestCase.php';
require_once 'includes/classes/CMSControle.php';
require_once 'includes/classes/Filme.php';
require_once 'includes/config.inc.php';

/*
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

 */

class CMSControleSpec extends PHPUnit_Extensions_Story_TestCase
{


/*
 * Cenarios
 *
 * RespondeAosComandosDoMenuCadastrados
 * RespondeAoComandoImportarPlanilha
 * RespondeAoComandoSincronizarFilme
 * RespondeAoComandoListaDeFilmesPorCanal
 * RespondeAoComandoFilmesASincronizar
 * RespondeAoComandoFilmesSincronizados     
 * RespondeAoComandoListaDeFilmes
 * RespondeAoComandoCadastrarFilme
 * RespondeAoComandoProdutoras
 * RespondeAoComandoDiretores
 * RespondeAoComandoCanais
 * RespondeAoComandoCamposExtras   
 * RespondeAoComandoBannersCadastrados
 * RespondeAoComandoNovoBanner
 * RespondeAoComandoVisitação           
 * RespondeAoComandoUsuáriosCcadastrados
 * RespondeAoComandoNovoUsuário         
 * RespondeAoComandoSair

   private $titulos;
    private $csv;
    private $csvArray;
 */
  
    /**
     * @scenario
     */

    public function RespondeAosComandosDoMenuCadastrados()
    {
        $this->given('Recebe URL',)
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
