<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <title>dades</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/bootstrap.css">
  <!-- permet centrar verticalment el texte dins un div -->
  <style type="text/css"> .abs-center {display: flex;align-items: center;justify-content: center;/* min-height: 100vh; */}</style>
  <style type="text/css"> .margin_LR {padding-right: 15px; padding-left: 15px;}</style>
  <style type="text/css"> .margin_BT {margin-top: 15px; margin-bottom: 15px;}</style>

</head>

<body>



<!-- INFORMACIÓ GENERAL SOBRE L'ACTUACIÓ -->

  <div class="container border border-danger rounded margin_BT">
    <div class="container margin_BT">
      <div class="row">
         <div class="col-md-6">
            <p class="d-inline">Estat actuació: </p>
          <!-- color fons condicional en funció de si és ACTIVA (verd - btn-success) o TANCADA (vermell - btn-danger) -->
            <p class="d-inline text-light bg-success margin_LR">ACTIVA</p>
         </div>
         <div class="col-md-6 text-right">
          <button class="btn btn-success" type="button" name="button">Modificar / Completar</button>
        </div>
      </div>
    </div>

    <div class="container margin_BT">
     <div class="row">
       <div class="col-md-4">
          <div><label class="">Número actuació: <strong>19/02/01565</strong></label></div>
          <div><label class="">Data creació: <strong>24/04/2019</strong></label></div>
          <div><label class="">Hora creació: <strong>19:58</strong></label></div>
       </div>
       <div class="col-md-4">
          <div><label class="">Creació Fitxa: <strong>E.Aymerich</strong></label></div>
          <!-- la data i l'hora s'obté de forma automàtica al guardar formulari dades, no s'ha d'introduir manualment -->
          <div><label class="">Data creació: <strong>24/04/2019</strong></label></div>
          <div><label class="">Hora creació: <strong>20:05</strong></label></div>
       </div>
       <div class="col-md-4">
          <div><label class="">Modificacació: <strong>E.Sala</strong></label></div>
          <!-- la data i l'hora s'obté de forma automàtica al guardar formulari dades, no s'ha d'introduir manualment -->
          <div><label class="">Data modificació: <strong>24/04/2019</strong></label></div>
          <div><label class="">Hora modificació: <strong>23:16</strong></label></div>
       </div>
     </div>
   </div>
  </div>



  <!-- DADES DE L'ACTUACIÓ -->

  <!-- Descripció incident -->

  <div class="container border border-danger rounded margin_BT">
    <div class="row">
       <div class="col-md-3 bg-danger abs-center">
           <h5 class="text-light">Descripció incident</h5>
       </div>
       <div class="col-md-9">
          <p class="d-inline">Descripció: <strong>Aquest vespre la seva germana l'ha trobat a faltar al trucar-lo i no contestar al telèfon. Ha anat a casa seva i no els ha trobat, ni a ell ni a la seva dona. Després de preguntar als veïns si els havien vist ha altertat al 112</strong></p>
          <p class="d-inline text-danger margin_LR">|</p>
          <p class="d-inline">L'alertant <strong>no</strong> és la persona afectada.</p>
          <p class="d-inline text-danger margin_LR">|</p>
          <p class="d-inline">Nombre persones: <strong>2</strong></p>
          <p class="d-inline text-danger margin_LR">|</p>
          <p class="d-inline">Activitat: <strong>Cada dia pel matí sortien a passejar el gos i tornaven a casa a mig matí. Per la tarda solien quedar-se a casa.</strong></p>
          <p class="d-inline text-danger margin_LR">|</p>
          <p class="d-inline">Temps desaparició: <strong>S'han trobat a faltar a les 18:30 i s'ha alertat al 112 a les 20:00</strong></p>
       </div>
    </div>
  </div>



  <!-- informació sobre la persona desapareguda -->

  <div class="container border border-danger rounded margin_BT">
    <div class="row">
        <div class="col-md-3 bg-danger abs-center">
          <div class="text-center">
            <h5 class="text-light">Desapareguts</h5>
            <p class="text-light">Nombre: <strong>2</strong></p>
          </div>
        </div>
        <div class="col-md-9">
            <p class="d-inline border-danger bg-danger text-light margin_LR"><strong>1</strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Nom: <strong>Josep Torrent Vilallonga</strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Edat: <strong>71</strong> anys</p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Telèfon: <strong>600 123 321</strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">whatsapp/GPS: <strong>no</strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Respon al nom de <strong>Pep</strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Pell: <strong>Blanca</strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Cobell: <strong>Blanc</strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Pes: <strong>55</strong> kg</p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Alçada: <strong>1,70</strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Constitució: <strong>Prim</strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Vestit: <strong>jaqueta marro, pantalons texans, camisa quadres, bastó, gorra blau fosc</strong></p>
            <p class="d-inline text-danger margin_LR">|</p>

            <br><br>  <!-- segona persona -->

            <p class="d-inline border-danger bg-danger text-light margin_LR"><strong>2</strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Nom: <strong>Maria Miraplana Reig</strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Edat: <strong>68</strong> anys</p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Telèfon: <strong>no</strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">whatsapp/GPS: <strong>no</strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Respon al nom de <strong>Maria</strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Pell: <strong>Blanca</strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Cobell: <strong>Blanc</strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Pes: <strong>50</strong> kg</p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Alçada: <strong>1,50</strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Constitució: <strong>Prima</strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Vestit: <strong>jaqueta marro, faldilla marro clar, jersei blau marí</strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
        </div>
      </div>
    </div>

    <!-- informació sobre l'estat físic del desaparegut -->

  <div class="container border border-danger rounded margin_BT">
    <div class="row">
      <div class="col-md-3 bg-danger abs-center">
           <h5 class="text-light">Estat físic</h5>
      </div>
      <div class="col-md-9">
            <p class="d-inline border-danger bg-danger text-light margin_LR"><strong>1</strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Forma física: <strong>Sedentari</strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Malaltia/Lesió: <strong>si</strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Quina? <strong>Alhzeimer</strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Necessita medicació? <strong>no</strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Quina? <strong></strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Limitació/Discapacitat? <strong>si</strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Quina? <strong>Coix, utilitza bastó per caminar</strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Antecedents de pèrdua: <strong>si</strong> kg</p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Com es va resoldre? <strong>El van trobar caminant per una pista</strong></p>
            <p class="d-inline text-danger margin_LR">|</p>

            <br><br>  <!-- segona persona -->

            <p class="d-inline border-danger bg-danger text-light margin_LR"><strong>2</strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Forma física: <strong>Actiu</strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Malaltia/Lesió: <strong>no</strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Quina? <strong></strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Necessita medicació? <strong>no</strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Quina? <strong></strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Limitació/Discapacitat? <strong>no</strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Quina? <strong></strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Antecedents de pèrdua: <strong>no</strong> kg</p>
            <p class="d-inline text-danger margin_LR">|</p>
            <p class="d-inline">Com es va resoldre? <strong></strong></p>
            <p class="d-inline text-danger margin_LR">|</p>
       </div>
     </div>
   </div>

    <!-- Equipament i experiència -->

  <div class="container border border-danger rounded margin_BT">
    <div class="row">
      <div class="col-md-3 bg-danger abs-center">
           <h5 class="text-light">Equipament i Experiència</h5>
      </div>
      <div class="col-md-9">
          <p class="d-inline">Coneix/en la zona: <strong>si</strong></p>
          <p class="d-inline text-danger margin_LR">|</p>
          <p class="d-inline">Té/Tenen experiència en l'activitat? <strong>si</strong></p>
          <p class="d-inline text-danger margin_LR">|</p>
          <p class="d-inline">Porta/en menjar? <strong>no</strong></p>
          <p class="d-inline text-danger margin_LR">|</p>
          <p class="d-inline">Aigua? <strong>no</strong></p>
          <p class="d-inline text-danger margin_LR">|</p>
          <p class="d-inline">Llum o senyalització? <strong>no</strong></p>
          <p class="d-inline text-danger margin_LR">|</p>
          <p class="d-inline">Roba d'abric? <strong>no</strong></p>
          <p class="d-inline text-danger margin_LR">|</p>
          <p class="d-inline">Roba impermeable? <strong>no</strong></p>
          <p class="d-inline text-danger margin_LR">|</p>
      </div>
    </div>
  </div>

  <!-- informació sobre la zona de la perdua -->

  <div class="container border border-danger rounded margin_BT">
    <div class="row">
      <div class="col-md-3 bg-danger abs-center">
          <h5 class="text-light">Zona de la pèrdua</h5>
      </div>
      <div class="col-md-9">
          <p class="d-inline">Data desaparició: <strong>24/04/2019</strong></p>
          <p class="d-inline text-danger margin_LR">|</p>
          <p class="d-inline">Hora desaparició: <strong>07:45</strong></p>
          <p class="d-inline text-danger margin_LR">|</p>
          <p class="d-inline">Zona topònim: <strong>Urbanització La Cometa</strong></p>
          <p class="d-inline text-danger margin_LR">|</p>
          <p class="d-inline">Població propera: <strong>Montagut</strong></p>
          <p class="d-inline text-danger margin_LR">|</p>
          <p class="d-inline">UTM/SOC: <strong>45AW23</strong></p>
          <p class="d-inline text-danger margin_LR">|</p>
          <p class="d-inline">Possible direcció o ruta: <strong>Normalment seguien la pista que porta al Cos</strong></p>
          <p class="d-inline text-danger margin_LR">|</p>
          <p class="d-inline">UPA (Localització): <strong>Davant casa seva</strong></p>
          <p class="d-inline text-danger margin_LR">|</p>
          <p class="d-inline">UPA (Data i hora): <strong>24/04/2019 - 09:00</strong></p>
          <p class="d-inline text-danger margin_LR">|</p>
          <p class="d-inline">UPA (Direcció): <strong>no</strong></p>
          <p class="d-inline text-danger margin_LR">|</p>
          <p class="d-inline">Vehicle (model): <strong>no</strong></p>
          <p class="d-inline text-danger margin_LR">|</p>
          <p class="d-inline">Vehicle (color): <strong>no</strong></p>
          <p class="d-inline text-danger margin_LR">|</p>
          <p class="d-inline">Vehicle (matrícula): <strong></strong></p>
          <p class="d-inline text-danger margin_LR">|</p>
          <p class="d-inline">Mapa (Tall): <strong>333-4</strong></p>
          <p class="d-inline text-danger margin_LR">|</p>
          <p class="d-inline">Mapa (Coordenades SOC): <strong>45AW23</strong></p>
          <p class="d-inline text-danger margin_LR">|</p>
       </div>
    </div>
  </div>

  <!-- Informació sobre la persona de contacte -->

  <div class="container border border-danger rounded margin_BT">
    <div class="row">
      <div class="col-md-3 bg-danger abs-center">
           <h5 class="text-light">Persona de contacte</h5>
      </div>
      <div class="col-md-9">
          <p class="d-inline">Nom: <strong>Josep Torrent Vilaplana</strong></p>
          <p class="d-inline text-danger margin_LR">|</p>
          <p class="d-inline"><strong>No</strong> és l'alertant</p>
          <p class="d-inline text-danger margin_LR">|</p>
          <p class="d-inline">Telèfon: <strong>677 257 227</strong></p>
          <p class="d-inline text-danger margin_LR">|</p>
          <p class="d-inline">Parentesc/Relació amb el desaparegut <strong>Fill</strong></p>
          <p class="d-inline text-danger margin_LR">|</p>
          <p class="d-inline">Ha proporcionat peça de roba? <strong>Si</strong></p>
          <p class="d-inline text-danger margin_LR">|</p>
          <p class="d-inline">Ha proporcionat fotografia? <strong>Si</strong></p>
          <p class="d-inline text-danger margin_LR">|</p>
      </div>
    </div>
  </div>

   <!-- Informació sobre l'alertant -->

  <div class="container border border-danger rounded margin_BT">
    <div class="row">
      <div class="col-md-3 bg-danger abs-center">
          <h5 class="text-light">Alertant</h5>
      </div>
      <div class="col-md-9">
          <p class="d-inline">Nom: <strong>Lluisa Torrent Vilallonga</strong></p>
          <p class="d-inline text-danger margin_LR">|</p>
          <p class="d-inline">Edat: <strong>65</strong></p>
          <p class="d-inline text-danger margin_LR">|</p>
          <p class="d-inline">Telèfon: <strong>687 444 521</strong></p>
          <p class="d-inline text-danger margin_LR">|</p>
          <p class="d-inline">Whatsapp/GPS <strong>si</strong></p>
          <p class="d-inline text-danger margin_LR">|</p>
          <p class="d-inline">Adreça: <strong>C/ Major,15  Montagut</strong></p>
          <p class="d-inline text-danger margin_LR">|</p>
      </div>
    </div>
  </div>


</body>
</html>
