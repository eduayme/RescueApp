<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <title>dades</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/bootstrap.css">
  <!-- permet centrar verticalment el texte dins un div -->
  <style type="text/css"> .abs-center {display: flex;align-items: center;justify-content: center;/* min-height: 100vh; */}</style>
</head>

<body>


  <br>








        <form class="" action="" method="post">

          <div class="container text-right">
            <button class="btn btn-danger" type="button" name="button">Tancar sense Guardar</button>
            <button class="btn btn-success" type="button" name="button">Guardar</button>
          </div>

          <!-- Creació Servei -->
          <br>
          <div class="container border border-success rounded">
          <div class="row bg-success">
            <h4 class="text-light"><strong>&nbsp;&nbsp;Creació Servei</strong></h4>
          </div>
          <br>
            <!-- Numero actuacio -->
            <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label class="sr-only">Número Actuació (Despatx):</label>
                <input type="text" class="form-control form-control-sm" name="Creacio_01" id="Creacio_01" placeholder="Número Actuació (Despatx)">
              </div>
            </div>
            </div>

            <!-- Data creacio -->
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label class="sr-only">Data Creació Alarma (Despatx):</label>
                  <input type="text" class="form-control form-control-sm" name="Creacio_02" id="Creacio_02" placeholder="Data Creació Alarma (Despatx)">
                </div>
              </div>
            </div>
            <div class="row">
            <div class="col-12">
            <div class="form-group">
              <label class="sr-only">Hora Creació Alarma (Despatx):</label>
              <input type="text" class="form-control form-control-sm" name="Creacio_03" id="Creacio_03" placeholder="Hora Creació Alarma (Despatx)">
            </div>
            </div>
            </div>
          </div>



        <!-- Alertant -->
        <br>
        <div class="container border border-danger rounded">
        <div class="row bg-danger">
          <h4 class="text-light"><strong>&nbsp;&nbsp;Alertant</strong></h4>
        </div>
        <br>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label class="sr-only">Nom:</label>
              <input type="text" class="form-control form-control-sm" name="Alertant_01" id="Alertant_01" placeholder="Nom i Cognoms">
            </div>
          </div>
          <div class="col-4">
          <div class="form-group">
            <label class="sr-only">Telèfon:</label>
            <input type="text" class="form-control form-control-sm" name="Alertant_02" id="Alertant_02" placeholder="Telèfon de contacte">
          </div>
          </div>
          <div class="col-2">
          <div class="form-group">
            <label class="sr-only">Edat:</label>
            <input type="number" class="form-control form-control-sm" name="Alertant_03" id="Alertant_03" placeholder="Edat">
          </div>
          </div>
        </div>

        <div class="row">
          <div class="col-8">
            <div class="form-group">
              <label class="sr-only">Adreça:</label>
              <input type="text" class="form-control form-control-sm" name="Alertant_04" id="Alertant_04" placeholder="Adreça">
            </div>
          </div>
          <div class="col-4">
          <div class="form-group">
            <div class="form-check-inline form-check-sm">
              <label class="form-check-label form-text text-muted" for=""><small>Whatsapp/GPS</small></label>
            </div>
            <div class="form-check-inline form-check-sm">
              <input class="form-check-input" type="radio" name="Alertant_05" id="Alertant_05" value="option1" >
              <label class="form-check-label form-text text-muted" for="exampleRadios1"><small>Si</small></label>
            </div>
            <div class="form-check-inline form-check-sm">
              <input class="form-check-input" type="radio" name="Alertant_05" id="Alertant_06" value="option2">
              <label class="form-check-label formtime-text text-muted" for="exampleRadios2"><small>No</small></label>
            </div>
          </div>
          </div>
        </div>
        </div>


        <!-- Descripció incident -->
        <br>
        <div class="container border border-danger rounded">
        <div class="row bg-danger">
          <h4 class="text-light"><strong>&nbsp;&nbsp;Descripció incident</strong></h4>
        </div>
        <br>
          <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label class="sr-only">Descripció:</label>
              <input type="text" class="form-control form-control-sm" name="Descripcio_01" id="Descripcio_01" placeholder="Descripció">
            </div>
          </div>
          </div>
          <div class="row">
          <div class="col-12">
          <div class="form-group">
            <label class="sr-only">Nombre:</label>
            <input type="number" class="form-control form-control-sm" name="Descripcio_02" id="Descripcio_02" placeholder="Nombre desapareguts">
          </div>
          </div>
          </div>
          <div class="row">
          <div class="col-12">
          <div class="form-group">
            <label class="sr-only">Activitat que estava realitzant:</label>
            <input type="text" class="form-control form-control-sm" name="Descripcio_03" id="Descripcio_03" placeholder="Activitat que s'estava realitzant">
          </div>
          </div>
          </div>

        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label class="sr-only">Temps entre la desaparició i l'avís al 112:</label>
              <input type="text" class="form-control form-control-sm" name="Descripcio_04" id="Descripcio_04" placeholder="Temps entre la desaparició i l'avís al 112">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
          <div class="form-group">
            <div class="form-check-inline form-check-sm">
              <label class="form-check-label form-text text-muted" for=""><small>L'alertant és la persona afectada?</small></label>
            </div>
            <div class="form-check-inline form-check-sm">
              <input class="form-check-input" type="radio" name="Descripcio_05" id="Descripcio_05" value="option1" >
              <label class="form-check-label form-text text-muted" for="exampleRadios1"><small>Si</small></label>
            </div>
            <div class="form-check-inline form-check-sm">
              <input class="form-check-input" type="radio" name="Descripcio_05" id="Descripcio_06" value="option2">
              <label class="form-check-label form-text text-muted" for="exampleRadios2"><small>No</small></label>
            </div>
          </div>
          </div>
        </div>
        </div>

        <!-- Identificació persona perduda -->
        <br>
        <div class="container border border-danger rounded">
        <div class="row bg-danger">
          <h4 class="text-light"><strong>&nbsp;&nbsp;Identificació Persona Perduda</strong></h4>
        </div>
        <br>
          <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label class="sr-only">Nom:</label>
              <input type="text" class="form-control form-control-sm" name="Ident_01 "id="Ident_01" placeholder="Nom i Cognoms">
            </div>
          </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label class="sr-only">Nom al que respon:</label>
                <input type="text" class="form-control form-control-sm" name="Ident_02 "id="Ident_02" placeholder="Nom al que respon">
              </div>
          </div>
          </div>
          <div class="row">
          <div class="col-12">
          <div class="form-group">
            <label class="sr-only">Edat:</label>
            <input type="number" class="form-control form-control-sm" name="Ident_03 "id="Ident_03" placeholder="Edat">
          </div>
          </div>
          </div>
          <div class="row">
          <div class="col-12">
          <div class="form-group">
            <label class="sr-only">Telèfon:</label>
            <input type="text" class="form-control form-control-sm" name="Ident_04 "id="Ident_04" placeholder="Telèfon de contacte">
          </div>
          </div>
          </div>

        <div class="row">
          <div class="col-12">
          <div class="form-group">
            <div class="form-check-inline form-check-sm">
              <label class="form-check-label form-text text-muted" for=""><small>Whatsapp/GPS</small></label>
            </div>
            <div class="form-check-inline form-check-sm">
              <input class="form-check-input" type="radio"  name="Ident_05 "id="Ident_05" value="option1" >
              <label class="form-check-label form-text text-muted" for="exampleRadios1"><small>Si</small></label>
            </div>
            <div class="form-check-inline form-check-sm">
              <input class="form-check-input" type="radio"  name="Ident_05 "id="Ident_06" value="option2">
              <label class="form-check-label form-text text-muted" for="exampleRadios2"><small>No</small></label>
            </div>
          </div>
          </div>
        </div>
        <div class="row">
        <div class="col-12">
        <div class="form-group">
          <label class="sr-only">Color pell:</label>
          <input type="text" class="form-control form-control-sm" name="Ident_07 "id="Ident_07" placeholder="Color de la pell">
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-12">
        <div class="form-group">
          <label class="sr-only">Color del cabell:</label>
          <input type="text" class="form-control form-control-sm" name="Ident_08 "id="Ident_08" placeholder="Color del cabell">
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-12">
        <div class="form-group">
          <label class="sr-only">Pes:</label>
          <input type="text" class="form-control form-control-sm" name="Ident_09 "id="Ident_09" placeholder="Pes">
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-12">
        <div class="form-group">
          <label class="sr-only">Alçada:</label>
          <input type="text" class="form-control form-control-sm" name="Ident_10 "id="Ident_10" placeholder="Alçada">
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-12">
        <div class="form-group">
          <label class="sr-only">Constitució:</label>
          <input type="text" class="form-control form-control-sm" name="Ident_11 "id="Ident_11" placeholder="Constitució">
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-12">
        <div class="form-group">
          <label class="sr-only">Com anava vestit:</label>
          <input type="text" class="form-control form-control-sm" name="Ident_12 "id="Ident_12" placeholder="Com anava vestit">
        </div>
        </div>
        </div>
        </div>

        <!-- Estat de la persona perduda -->
        <br>
        <div class="container border border-danger rounded">
        <div class="row bg-danger">
          <h4 class="text-light"><strong>&nbsp;&nbsp;Estat de la persona perduda</strong></h4>
        </div>
        <br>
        <div class="row">
          <div class="col-12">
          <div class="form-group">
            <div class="form-check-inline form-check-sm">
              <label class="form-check-label form-text text-muted" for=""><small>Forma Física:</small></label>
            </div>
            <div class="form-check-inline form-check-sm">
              <input class="form-check-input" type="radio" name="Estat_01" id="Estat_01" value="option1" >
              <label class="form-check-label form-text text-muted" for="exampleRadios1"><small>Sedentari</small></label>
            </div>
            <div class="form-check-inline form-check-sm">
              <input class="form-check-input" type="radio" name="Estat_01" id="Estat_02" value="option1" >
              <label class="form-check-label form-text text-muted" for="exampleRadios1"><small>Actiu</small></label>
            </div>
            <div class="form-check-inline form-check-sm">
              <input class="form-check-input" type="radio" name="Estat_01" id="Estat_03" value="option2">
              <label class="form-check-label form-text text-muted" for="exampleRadios2"><small>Esportista</small></label>
            </div>
          </div>
          </div>
        </div>

        <div class="row">
          <div class="col-4">
          <div class="form-group">
            <div class="form-check-inline form-check-sm">
              <label class="form-check-label form-text text-muted" for=""><small>Pateix Malaltia / Lesió?</small></label>
            </div>
            <div class="form-check-inline form-check-sm">
              <input class="form-check-input" type="radio" name="Estat_04" id="Estat_04" value="option1" >
              <label class="form-check-label form-text text-muted" for="exampleRadios1"><small>Si</small></label>
            </div>
            <div class="form-check-inline form-check-sm">
              <input class="form-check-input" type="radio" name="Estat_04" id="Estat_05" value="option2">
              <label class="form-check-label form-text text-muted" for="exampleRadios2"><small>No</small></label>
            </div>
          </div>
          </div>
          <div class="col-8">
            <div class="form-group">
              <label class="sr-only">Quina Malaltia / Lesió:</label>
              <input type="text" class="form-control form-control-sm" name="Estat_06" id="Estat_06" placeholder="Quina Malaltia / Lesió">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-4">
          <div class="form-group">
            <div class="form-check-inline form-check-sm">
              <label class="form-check-label form-text text-muted" for=""><small>Pren medicació?</small></label>
            </div>
            <div class="form-check-inline form-check-sm">
              <input class="form-check-input" type="radio" name="Estat_07" id="Estat_07" value="option1" >
              <label class="form-check-label form-text text-muted" for="exampleRadios1"><small>Si</small></label>
            </div>
            <div class="form-check-inline form-check-sm">
              <input class="form-check-input" type="radio" name="Estat_07" id="Estat_08" value="option2">
              <label class="form-check-label form-text text-muted" for="exampleRadios2"><small>No</small></label>
            </div>
          </div>
          </div>
          <div class="col-8">
            <div class="form-group">
              <label class="sr-only">Quina Medicació:</label>
              <input type="text" class="form-control form-control-sm" name="Estat_09" id="Estat_09" placeholder="Quina Medicació?">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-4">
          <div class="form-group">
            <div class="form-check-inline form-check-sm">
              <label class="form-check-label form-text text-muted" for=""><small>Necessita medicació?</small></label>
            </div>
            <div class="form-check-inline form-check-sm">
              <input class="form-check-input" type="radio" name="Estat_10" id="Estat_10" value="option1" >
              <label class="form-check-label form-text text-muted" for="exampleRadios1"><small>Si</small></label>
            </div>
            <div class="form-check-inline form-check-sm">
              <input class="form-check-input" type="radio" name="Estat_10" id="Estat_11" value="option2">
              <label class="form-check-label form-text text-muted" for="exampleRadios2"><small>No</small></label>
            </div>
          </div>
          </div>
          <div class="col-8">
            <div class="form-group">
              <label class="sr-only">Quina Medicació i cada quan:</label>
              <input type="text" class="form-control form-control-sm" name="Estat_12" id="Estat_12" placeholder="Quina medicació i cada quan?">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-4">
          <div class="form-group">
            <div class="form-check-inline form-check-sm">
              <label class="form-check-label form-text text-muted" for=""><small>Limitació / Discapacitat:</small></label>
            </div>
            <div class="form-check-inline form-check-sm">
              <input class="form-check-input" type="radio" name="Estat_13" id="Estat_13" value="option1" >
              <label class="form-check-label form-text text-muted" for="exampleRadios1"><small>Si</small></label>
            </div>
            <div class="form-check-inline form-check-sm">
              <input class="form-check-input" type="radio" name="Estat_13" id="Estat_14" value="option2">
              <label class="form-check-label form-text text-muted" for="exampleRadios2"><small>No</small></label>
            </div>
          </div>
          </div>
          <div class="col-8">
            <div class="form-group">
              <label class="sr-only">Quina limitació / discapacitat:</label>
              <input type="text" class="form-control form-control-sm" name="Estat_15" id="Estat_15" placeholder="Quina limitació / discapacitat?">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-4">
          <div class="form-group">
            <div class="form-check-inline form-check-sm">
              <label class="form-check-label form-text text-muted" for=""><small>Antecedents de pèrdua:</small></label>
            </div>
            <div class="form-check-inline form-check-sm">
              <input class="form-check-input" type="radio" name="Estat_16" id="Estat_16" value="option1" >
              <label class="form-check-label form-text text-muted" for="exampleRadios1"><small>Si</small></label>
            </div>
            <div class="form-check-inline form-check-sm">
              <input class="form-check-input" type="radio" name="Estat_16" id="Estat_17" value="option2">
              <label class="form-check-label form-text text-muted" for="exampleRadios2"><small>No</small></label>
            </div>
          </div>
          </div>
          <div class="col-8">
            <div class="form-group">
              <label class="sr-only">Resolució:</label>
              <input type="text" class="form-control form-control-sm" name="Estat_18" id="Estat_18" placeholder="Com es va resoldre?">
            </div>
          </div>
        </div>
       </div>

       <!-- Equipament i Experiència -->
       <br>
       <div class="container border border-danger rounded">
       <div class="row bg-danger">
         <h4 class="text-light"><strong>&nbsp;&nbsp;Equipament i Experiència</strong></h4>
       </div>
       <br>

       <div class="row">
         <div class="col-6">
         <div class="form-group">
           <div class="form-check-inline form-check-sm">
             <label class="form-check-label form-text text-muted" for=""><small>Coneix la zona?</small></label>
           </div>
           <div class="form-check-inline form-check-sm">
             <input class="form-check-input" type="radio" name="Equip_01" id="Equip_01" value="option1" >
             <label class="form-check-label form-text text-muted" for="exampleRadios1"><small>Si</small></label>
           </div>
           <div class="form-check-inline form-check-sm">
             <input class="form-check-input" type="radio" name="Equip_01" id="Equip_02" value="option2">
             <label class="form-check-label form-text text-muted" for="exampleRadios2"><small>No</small></label>
           </div>
         </div>
         </div>
         <div class="col-6">
         <div class="form-group">
           <div class="form-check-inline form-check-sm">
             <label class="form-check-label form-text text-muted" for=""><small>Té experiència en l'activitat?</small></label>
           </div>
           <div class="form-check-inline form-check-sm">
             <input class="form-check-input" type="radio" name="Equip_03" id="Equip_03" value="option1" >
             <label class="form-check-label form-text text-muted" for="exampleRadios1"><small>Si</small></label>
           </div>
           <div class="form-check-inline form-check-sm">
             <input class="form-check-input" type="radio" name="Equip_03" id="Equip_04" value="option2">
             <label class="form-check-label form-text text-muted" for="exampleRadios2"><small>No</small></label>
           </div>
         </div>
         </div>
       </div>

       <div class="row">
         <div class="col-6">
         <div class="form-group">
           <div class="form-check-inline form-check-sm">
             <label class="form-check-label form-text text-muted" for=""><small>Porta menjar?</small></label>
           </div>
           <div class="form-check-inline form-check-sm">
             <input class="form-check-input" type="radio" name="Equip_05" id="Equip_05" value="option1" >
             <label class="form-check-label form-text text-muted" for="exampleRadios1"><small>Si</small></label>
           </div>
           <div class="form-check-inline form-check-sm">
             <input class="form-check-input" type="radio" name="Equip_05" id="Equip_06" value="option2">
             <label class="form-check-label form-text text-muted" for="exampleRadios2"><small>No</small></label>
           </div>
         </div>
         </div>
         <div class="col-6">
         <div class="form-group">
           <div class="form-check-inline form-check-sm">
             <label class="form-check-label form-text text-muted" for=""><small>Porta aigua?</small></label>
           </div>
           <div class="form-check-inline form-check-sm">
             <input class="form-check-input" type="radio" name="Equip_07" id="Equip_07" value="option1" >
             <label class="form-check-label form-text text-muted" for="exampleRadios1"><small>Si</small></label>
           </div>
           <div class="form-check-inline form-check-sm">
             <input class="form-check-input" type="radio" name="Equip_07" id="Equip_08" value="option2">
             <label class="form-check-label form-text text-muted" for="exampleRadios2"><small>No</small></label>
           </div>
         </div>
         </div>
       </div>

       <div class="row">
         <div class="col-6">
         <div class="form-group">
           <div class="form-check-inline form-check-sm">
             <label class="form-check-label form-text text-muted" for=""><small>Porta llum o senyalització?</small></label>
           </div>
           <div class="form-check-inline form-check-sm">
             <input class="form-check-input" type="radio" name="Equip_09" id="Equip_09" value="option1" >
             <label class="form-check-label form-text text-muted" for="exampleRadios1"><small>Si</small></label>
           </div>
           <div class="form-check-inline form-check-sm">
             <input class="form-check-input" type="radio" name="Equip_09" id="Equip_10" value="option2">
             <label class="form-check-label form-text text-muted" for="exampleRadios2"><small>No</small></label>
           </div>
         </div>
         </div>
         <div class="col-6">
         <div class="form-group">
           <div class="form-check-inline form-check-sm">
             <label class="form-check-label form-text text-muted" for=""><small>Porta roba d'abric?</small></label>
           </div>
           <div class="form-check-inline form-check-sm">
             <input class="form-check-input" type="radio" name="Equip_11" id="Equip_11" value="option1" >
             <label class="form-check-label form-text text-muted" for="exampleRadios1"><small>Si</small></label>
           </div>
           <div class="form-check-inline form-check-sm">
             <input class="form-check-input" type="radio" name="Equip_11" id="Equip_12" value="option2">
             <label class="form-check-label form-text text-muted" for="exampleRadios2"><small>No</small></label>
           </div>
         </div>
         </div>
       </div>

       <div class="row">
         <div class="col-12">
         <div class="form-group">
           <div class="form-check-inline form-check-sm">
             <label class="form-check-label form-text text-muted" for=""><small>Porta roba impermeable?</small></label>
           </div>
           <div class="form-check-inline form-check-sm">
             <input class="form-check-input" type="radio" name="Equip_13" id="Equip_13" value="option1" >
             <label class="form-check-label form-text text-muted" for="exampleRadios1"><small>Si</small></label>
           </div>
           <div class="form-check-inline form-check-sm">
             <input class="form-check-input" type="radio" name="Equip_13" id="Equip_14" value="option2">
             <label class="form-check-label form-text text-muted" for="exampleRadios2"><small>No</small></label>
           </div>
         </div>
         </div>
       </div>
      </div>

      <!-- Zona de la pèrdua -->
      <br>
      <div class="container border border-danger rounded">
      <div class="row bg-danger">
        <h4 class="text-light"><strong>&nbsp;&nbsp;Zona de la Pèrdua</strong></h4>
      </div>
      <br>
        <div class="row">
        <div class="col-2">
          <div class="form-group">
            <label class="sr-only">Data i hora de la desaparició:</label>
            <input type="datetime" class="form-control form-control-sm" name="Zona_01 "id="Zona_01" placeholder="Data i hora desaparició">
          </div>
        </div>
          <div class="col-5">
            <div class="form-group">
              <label class="sr-only">Topònim de la zona:</label>
              <input type="text" class="form-control form-control-sm" name="Zona_02 "id="Zona_02" placeholder="Topònim de la zona">
            </div>
        </div>
        <div class="col-5">
        <div class="form-group">
          <label class="sr-only">Població propera:</label>
          <input type="text" class="form-control form-control-sm" name="Zona_03 "id="Zona_03" placeholder="Població propera">
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-12">
        <div class="form-group">
          <label class="sr-only">Possible ruta o direcció:</label>
          <input type="text" class="form-control form-control-sm" name="Zona_04 "id="Zona_04" placeholder="Possible ruta o direcció">
        </div>
        </div>
        </div>

      <div class="row">
      <div class="col-8">
      <div class="form-group">
        <label class="sr-only">UPA Darrer punt on s'ha vist:</label>
        <input type="text" class="form-control form-control-sm" name="Zona_05 "id="Zona_05" placeholder="UPA Darrer punt on s'ha vist">
      </div>
      </div>
      <div class="col-2">
      <div class="form-group">
        <label class="sr-only">UPA Data i hora:</label>
        <input type="datetime" class="form-control form-control-sm" name="Zona_06 "id="Zona_06" placeholder="UPA Data i hora">
      </div>
      </div>
      <div class="col-2">
      <div class="form-group">
        <label class="sr-only">UPA Direcció:</label>
        <input type="text" class="form-control form-control-sm" name="Zona_07 "id="Zona_07" placeholder="UPA Direcció">
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-4">
      <div class="form-group">
        <label class="sr-only">UTM:</label>
        <input type="text" class="form-control form-control-sm" name="Zona_08 "id="Zona_08" placeholder="UTM">
      </div>
      </div>
      <div class="col-4">
      <div class="form-group">
        <label class="sr-only">Tall de Mapa:</label>
        <input type="text" class="form-control form-control-sm" name="Zona_09 "id="Zona_09" placeholder="Tall de mapa">
      </div>
      </div>
      <div class="col-4">
      <div class="form-group">
        <label class="sr-only">Coordenada SOC:</label>
        <input type="text" class="form-control form-control-sm" name="Zona_10 "id="Zona_10" placeholder="Coordenada SOC">
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-4">
      <div class="form-group">
        <label class="sr-only">Vehicle (Marca i Model):</label>
        <input type="text" class="form-control form-control-sm" name="Zona_11 "id="Zona_11" placeholder="Vehicle (Marca i Model)">
      </div>
      </div>
      <div class="col-4">
      <div class="form-group">
        <label class="sr-only">Vehicle (Color):</label>
        <input type="text" class="form-control form-control-sm" name="Zona_12 "id="Zona_12" placeholder="Vehicle (Color)">
      </div>
      </div>
      <div class="col-4">
      <div class="form-group">
        <label class="sr-only">Vehicle (matrícula):</label>
        <input type="text" class="form-control form-control-sm" name="Zona_13 "id="Zona_13" placeholder="Vehicle (Matrícula)">
      </div>
      </div>
      </div>
      </div>


      <!-- Persona de contacte -->
      <br>
      <div class="container border border-danger rounded">
      <div class="row bg-danger">
        <h4 class="text-light"><strong>&nbsp;&nbsp;Persona de contacte</strong></h4>
      </div>
      <br>
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label class="sr-only">Nom:</label>
            <input type="text" class="form-control form-control-sm" name="Contacte_01" id="Contacte_01" placeholder="Nom i Cognoms">
          </div>
        </div>
        <div class="col-3">
        <div class="form-group">
          <label class="sr-only">Afinitat amb la persona perduda:</label>
          <input type="text" class="form-control form-control-sm" name="Contacte_02" id="Contacte_02" placeholder="Parentesc/Relació amb el desaparegut">
        </div>
        </div>
        <div class="col-3">
        <div class="form-group">
          <label class="sr-only">Telèfon:</label>
          <input type="text" class="form-control form-control-sm" name="Contacte_03" id="Contacte_03" placeholder="Telèfon de contacte">
        </div>
        </div>
      </div>

      <div class="row">
        <div class="col-4">
        <div class="form-group">
          <div class="form-check-inline form-check-sm">
            <label class="form-check-label form-text text-muted" for=""><small>És l'alertant?</small></label>
          </div>
          <div class="form-check-inline form-check-sm">
            <input class="form-check-input" type="radio" name="Contacte_04" id="Contacte_04" value="option1" >
            <label class="form-check-label form-text text-muted" for="exampleRadios1"><small>Si</small></label>
          </div>
          <div class="form-check-inline form-check-sm">
            <input class="form-check-input" type="radio" name="Contacte_04" id="Contacte_05" value="option2">
            <label class="form-check-label form-text text-muted" for="exampleRadios2"><small>No</small></label>
          </div>
        </div>
        </div>
        <div class="col-4">
        <div class="form-group">
          <div class="form-check-inline form-check-sm">
            <label class="form-check-label form-text text-muted" for=""><small>Peça de roba / coixí:</small></label>
          </div>
          <div class="form-check-inline form-check-sm">
            <input class="form-check-input" type="radio" name="Contacte_06" id="Contacte_06" value="option1" >
            <label class="form-check-label form-text text-muted" for="exampleRadios1"><small>Si</small></label>
          </div>
          <div class="form-check-inline form-check-sm">
            <input class="form-check-input" type="radio" name="Contacte_06" id="Contacte_07" value="option2">
            <label class="form-check-label form-text text-muted" for="exampleRadios2"><small>No</small></label>
          </div>
        </div>
        </div>
        <div class="col-4">
        <div class="form-group">
          <div class="form-check-inline form-check-sm">
            <label class="form-check-label form-text text-muted" for=""><small>Fotografia recent:</small></label>
          </div>
          <div class="form-check-inline form-check-sm">
            <input class="form-check-input" type="radio" name="Contacte_08" id="Contacte_08" value="option1" >
            <label class="form-check-label form-text text-muted" for="exampleRadios1"><small>Si</small></label>
          </div>
          <div class="form-check-inline form-check-sm">
            <input class="form-check-input" type="radio" name="Contacte_08" id="Contacte_09" value="option2">
            <label class="form-check-label form-text text-muted" for="exampleRadios2"><small>No</small></label>
          </div>
        </div>
        </div>
      </div>
      </div>

      <br>

      <div class="container text-right">
        <button class="btn btn-danger" type="button" name="button">Tancar sense Guardar</button>
        <button class="btn btn-success" type="button" name="button">Guardar</button>
      </div>

    </form>



<br><br><br>



</body>
</html>
