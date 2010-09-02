#!/bin/sh

echo 'Criando arquivos para instalacao.'

rm -Rf dist.bk
mv dist dist.bk
mkdir dist

cp index.php                  dist             
cp elo_filme_custom.php       dist
cp elo_filme.php	      dist  
cp elo_filme_publica.php      dist
cp LGPL-3                     dist

#cd docs
#doxygen
#cd ..

#cp -R ./docs                  dist/docs
#rm dist/docs/Doxyfile
#cp -R ./images                dist/images

mkdir dist/templates
cp ./templates/footer.tpl.php                    dist/templates
#cp ./templates/header.tpl.php                    dist/templates
cp -R ./templates/jquery                         dist/templates
cp ./templates/login.tpl.php                     dist/templates
cp ./templates/menu_filmes.tpl.php               dist/templates
cp ./templates/menu_principal.tpl.php            dist/templates
cp -R ./templates/menus                          dist/templates
cp ./templates/menu.tpl.php                      dist/templates
cp ./templates/planilha_confirma.tpl.php         dist/templates
cp ./templates/planilha_home.tpl.php             dist/templates
cp ./templates/planilha_importa.tpl.php          dist/templates
cp ./templates/planilha_salva.tpl.php            dist/templates
cp ./templates/planilha_verifica.tpl.php         dist/templates
cp ./templates/sincronizar_filmes.tpl.php        dist/templates
cp ./templates/lista.tpl.php                     dist/templates
cp ./templates/edita.tpl.php                     dist/templates
cp -R ./templates/style                          dist/templates
cp -R ./templates/fckeditor                      dist/templates

mkdir dist/includes 
cp ./includes/dmd_blinkx_save.php                dist/includes
cp ./includes/captcha-image.php                  dist/includes
cp ./includes/config.inc.php.elo                 dist/includes/config.inc.php
cp ./includes/dmd_updfrm.php                     dist/includes
cp ./includes/functions.inc.php                  dist/includes
cp ./includes/init.php                           dist/includes

mkdir dist/includes/classes

cp ./includes/classes/Acesso.php                 dist/includes/classes
cp ./includes/classes/Armazenamento.php          dist/includes/classes
cp ./includes/classes/Atleta.php                 dist/includes/classes
cp ./includes/classes/Ator.php                   dist/includes/classes
cp ./includes/classes/Auxiliar.php               dist/includes/classes
cp ./includes/classes/Banner.php                 dist/includes/classes
cp ./includes/classes/Campo.php                  dist/includes/classes
cp ./includes/classes/Canal.php                  dist/includes/classes
cp ./includes/classes/CmsBlinkx.php              dist/includes/classes
cp ./includes/classes/CMSControle.php            dist/includes/classes
cp ./includes/classes/CMS.php                    dist/includes/classes
cp ./includes/classes/Contrato.php               dist/includes/classes
cp ./includes/classes/csv.php                    dist/includes/classes
cp ./includes/classes/Curadoria.php              dist/includes/classes
cp ./includes/classes/Diretor.php                dist/includes/classes
cp ./includes/classes/EditaBanner.php            dist/includes/classes
cp ./includes/classes/EditaCampo.php             dist/includes/classes
cp ./includes/classes/EditaCanal.php             dist/includes/classes
cp ./includes/classes/EditaContrato.php          dist/includes/classes
cp ./includes/classes/EditaDiretor.php         dist/includes/classes
cp ./includes/classes/EditaFilme.php             dist/includes/classes
cp ./includes/classes/EditaLinks.php             dist/includes/classes
cp ./includes/classes/EditaProdutora.php        dist/includes/classes
cp ./includes/classes/EditaUsuario.php          dist/includes/classes
cp ./includes/classes/Especial.php               dist/includes/classes
cp ./includes/classes/Estilista.php              dist/includes/classes
cp ./includes/classes/FilmeControle.php          dist/includes/classes
cp ./includes/classes/Filme.php                  dist/includes/classes
cp ./includes/classes/FilmesASincronizar.php     dist/includes/classes
cp ./includes/classes/FilmesSincronizados.php    dist/includes/classes
cp ./includes/classes/Fkey.php                   dist/includes/classes
cp ./includes/classes/Formato.php                dist/includes/classes
cp ./includes/classes/Genero.php                 dist/includes/classes
cp ./includes/classes/ImportaPlanilha.php        dist/includes/classes
cp ./includes/classes/ImportaPlanilhaView1.php   dist/includes/classes
cp ./includes/classes/ImportaPlanilhaView2.php   dist/includes/classes
cp ./includes/classes/ImportaPlanilhaView3.php   dist/includes/classes
cp ./includes/classes/ImportaPlanilhaView4.php   dist/includes/classes
cp ./includes/classes/ListaCanais.php            dist/includes/classes
cp ./includes/classes/Link.php                   dist/includes/classes
cp ./includes/classes/ListaBanners.php           dist/includes/classes
cp ./includes/classes/ListaFilmes.php            dist/includes/classes
cp ./includes/classes/ListaProdutoras.php        dist/includes/classes
cp ./includes/classes/ListaUsuarios.php          dist/includes/classes
cp ./includes/classes/ListaCanais.php            dist/includes/classes
cp ./includes/classes/ListaVisitacao.php            dist/includes/classes
cp ./includes/classes/ListaCamposExtras.php      dist/includes/classes
cp ./includes/classes/Login.php                  dist/includes/classes
cp ./includes/classes/Material.php               dist/includes/classes
cp ./includes/classes/MenuPrincipal.php          dist/includes/classes
cp ./includes/classes/MidiaSugerida.php          dist/includes/classes
cp ./includes/classes/ModeloDeContrato.php       dist/includes/classes
cp ./includes/classes/NomeCampo.php              dist/includes/classes
cp ./includes/classes/ObservacoesContratuais.php dist/includes/classes
cp ./includes/classes/Observacoes.php            dist/includes/classes
cp ./includes/classes/PlanilhaStore.php          dist/includes/classes
cp ./includes/classes/Premio.php                 dist/includes/classes
cp ./includes/classes/Produtora.php              dist/includes/classes
cp ./includes/classes/Produtor.php               dist/includes/classes
cp ./includes/classes/QualidadeTecnica.php        dist/includes/classes
cp ./includes/classes/resources                 dist/includes/classes
cp ./includes/classes/RevenueShare.php          dist/includes/classes
cp ./includes/classes/SincronizarFilmes.php     dist/includes/classes
cp ./includes/classes/Visitacao.php          dist/includes/classes

mkdir dist/includes/classes/Ferro
cp ./includes/classes/Ferro/Canvas.php dist/includes/classes/Ferro
cp ./includes/classes/Ferro/Footer.php dist/includes/classes/Ferro
cp ./includes/classes/Ferro/Form.php dist/includes/classes/Ferro
cp ./includes/classes/Ferro/Header.php dist/includes/classes/Ferro
cp ./includes/classes/Ferro/Menu.php dist/includes/classes/Ferro
cp ./includes/classes/Ferro/WidgetControle.php dist/includes/classes/Ferro
cp ./includes/classes/Ferro/WidgetView.php dist/includes/classes/Ferro
cp ./includes/classes/Ferro/Lista.php dist/includes/classes/Ferro
cp ./includes/classes/Ferro/Edita.php dist/includes/classes/Ferro
cp ./includes/classes/Ferro/Crud.php dist/includes/classes/Ferro

mkdir dist/includes/classes/resources 
cp ./includes/classes/resources/class.database.php dist/includes/classes/resources 



echo 'Feito! Veja diretorio dist. Copie para o diretorio cms_blinkx2'
ls -l dist

#includes   templates

#docs
