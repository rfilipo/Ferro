<div id="left-menu">
<div id="dhtmlgoodies_menu" style="visibility: hidden;">
<ul style="position: relative;">
    <li><a href="#" class="current">conteudos</a>
        <ul>
        <li><a href="index.php?action=listadeconteudos" class="current">Lista de conteudos </a>
        <li><a href="index.php?action=cadastrarconteudo" class="current">Cadastrar conteudo </a>
        </ul>
    <li><a href="#" class="current">banners</a>
        <ul>
        <li><a href="index.php?action=banners" class="current">Banners cadastrados</a>
        <li><a href="index.php?action=cadastrarbanner" class="current">Novo banner</a>
        <li><a href="index.php?action=visitacao" class="current">Visitação</a>
        </ul>
<?php if(isset($_SESSION['admin'])){ ?>
    <li><a href="#" class="current">usu&aacute;rios</a>
        <ul>
        <li><a href="index.php?action=usuarios" class="current">Usuários cadastrados</a>
        <li><a href="index.php?action=cadastraracesso" class="current">Novo usuário</a>
        </ul>
<?php } ?>
    <li><a href="index.php?action=logout" class="current">sair</a>
       </ul>
    </li>
</ul>
</div>
</div>

