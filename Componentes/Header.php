<h3>Escuadron Lobo Enchilado</h3>
<hr>
<?php
 
    if(isset($_SESSION['Sesion'])){
        if ($_SESSION['Sesion'] == 'On') {
          echo"
          <ul class='nav nav-pills'>
  <li class='nav-item'>
    <a class='nav-link active btn-dark navBtnCss' href='Index.php'>Inicio</a>
  </li>
   <li class='nav-item'>
  <div class='dropdown'>
  <button class='btn btn-dark active navBtnCss dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
    Catalogo de Cuentas
  </button>
  <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
    <a class='dropdown-item' href='AgregarCuentaForm.php'>Agregar Cuenta</a>
    <a class='dropdown-item' href='AdministrarCuenta.php'>Administrar Catalogo</a>
  
  </div>
</div>
  </li>



  <li class='nav-item'>
  <div class='dropdown'>
  <button class='btn btn-dark active navBtnCss dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
    Empleados
  </button>
  <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
    <a class='dropdown-item' href='AgregarEmpleadoForm.php'>Agregar</a>
    <a class='dropdown-item' href='AdministrarEmpleados.php'>Administrar</a>
  
  </div>
</div>
  </li>
  <li class='nav-item'>
  <div class='dropdown'>
  <button class='btn btn-dark active navBtnCss dropdown-toggle' type='button' id='dropdownMenuButtonD' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
    Departamentos
  </button>
  <div class='dropdown-menu' aria-labelledby='dropdownMenuButtonD'>
    <a class='dropdown-item' href='AgregarDepartamentoForm.php'>Agregar Nuevo</a>
    <a class='dropdown-item' href='AdministraDepartamento.php'>Administrar</a>
  
  </div>
</div>
  </li>
<li class='nav-item'>
  <div class='dropdown'>
  <button class='btn btn-dark active navBtnCss dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
    Administrar Gastos
  </button>
  <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
    <a class='dropdown-item' href='AgregarGastosForm.php'>Agregar Gastos</a>
    <a class='dropdown-item' href='AdminGastos.php'>Administrar Gastos</a>
  
  </div>
</div>
  </li>
  <li class='nav-item'>
  <a class='nav-link active btn-dark navBtnCss' href='php/DestruirSession.php'>Salir</a>
</li>

</ul>

<hr>
          ";
        }else{

        }
    }else{
 
    }
?>

