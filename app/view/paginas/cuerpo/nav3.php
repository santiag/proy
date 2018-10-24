
<nav class="navbar navbar-expand-md navbar-dark fixed-top  " >
 <div class="container">
 
  <a class="navbar-brand" href="#">SNS</a>
  <img src="view/i/imagen1.png" alt="" style="width: 40px">

  <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link text-white lead" href="<?php echo RUTA_URL ?>">Inicio</a> 
      <li class="nav-item dropdown">
      <a class="nav-link text-white lead" href="aplazamiento.php" id="navbardrop" data-toggle="dropdown">
        Ficha
      </a>
      <div class="dropdown-menu">
      <a class="dropdown-item text-dark " href="index.php?url=ficha/link/ficha"> Registrar ficha</a>
      <a class="dropdown-item text-dark " href="index.php?url=programa/link/programa_de_formacion"> Registrar programa de formación</a>
      <a class="dropdown-item text-dark " href="index.php?url=sede/link/sede"> Registrar sede</a>
      <a class="dropdown-item text-dark " href="index.php?url=ciudad/link/ciudad"> Registrar ciudad</a>
      </div>
    </li>
      <li class="nav-item dropdown">
      <a class="nav-link text-white lead" href="aplazamiento.php" id="navbardrop" data-toggle="dropdown">
        Novedades
      </a>
      <div class="dropdown-menu">
      <a class="nav-link text-dark lead " href="index.php?url=novedad/link/registro_novedad"> Registrar Novedad</a>
        <a class="nav-link text-dark lead " href="index.php?action=consultar_novedad"> Consultar</a>
      </div>
    </li> 
      
    

   
    <li class="nav-item">
        <a class="nav-link text-white lead " href="index.php?url=persona/salir">Salir</a>
      </li>  
      
    </ul>
    
     
  </div>  
 </div>
</nav> 