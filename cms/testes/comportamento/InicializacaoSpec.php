<?php
require_once 'PHPUnit/Extensions/Story/TestCase.php';
require_once 'includes/classes/CMSControle.php';
require_once 'includes/classes/Login.php';
//require_once 'includes/init.php';

class InicializacaoSpec extends PHPUnit_Extensions_Story_TestCase
{
/**
 * Cenarios
 * CmsControleDeveRetornarLoginFalseSeNaoLogado
 * DeveSerPossivelLogarComoAdmin
 * ParaMudarOStatusParaLogadoSeraPrecisoAAutenticacao
 * SomenteAposLogadoRealizaComandos
 *
 * */


    /**
     * @scenario
     */
    public function CmsControleDeveRetornarLoginFalseSeNaoLogado()
    {
        $this->given('Chama acao default')
             ->then('Retorna logado false', true);
    }

/*
    public function itAoAbrirOCmsOStatusDeLogadoDeveSerFalso()
    {
        $this->spec($this->_cms->getLoginStatus())->should->equal(false);
    }

    public function itDeveSerPosssivelLogarComoAdmin()
    {
        $this->spec($this->_login->autentica('admin',md5('admin')))->should->equal(true);
        $this->pending();
    }

    public function itParaMudarOStatusParaLogadoSeraPrecisoAAutenticacao()
    {
        $this->pending();
    }
    public function itSomenteAposLogadoRealizaComandos()
    {
        $this->pending();
    }

 */
    //////////////////////////////////////////////////////////

    public function runGiven(&$world, $action, $arguments)
    {
        switch($action) {
        
        case 'Chama acao default': {
            $world['login'] = new Login();
            $world['cms'] = new CMSControle($world['login']);
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
