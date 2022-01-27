<?php


$replStr ="title";

$title = "title";
/**
 * @param string $content
 * @param string $title
 */
return function(string $content){
?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <!-- tailwind CSS -->
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <!-- select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?echo $GLOBALS['title']?></title>

</head>

<body>
  <div class="header-2">
    <nav class="bg-white py-2 md:py-4">
      <div class="container px-4 mx-auto md:flex md:items-center">

        <div class="flex justify-between items-center">
          <a href="/" class="font-bold text-xl text-indigo-600">MetaCriticDeux</a>
          <button
            class="border border-solid border-gray-600 px-3 py-1 rounded text-gray-600 opacity-50 hover:opacity-75 md:hidden"
            id="navbar-toggle">
            <i class="fas fa-bars"></i>
          </button>
        </div>

        <div class="hidden md:flex flex-col md:flex-row md:ml-auto mt-3 md:mt-0" id="navbar-collapse">
         <!-- <a href="#" class="p-2 lg:px-4 md:mx-2 text-white rounded bg-indigo-600">Home</a>-->
             <?php
             if($GLOBALS['path'] == "/actors"){
             ?>
                 <a href="../actors" class="p-2 lg:px-4 md:mx-2 text-white rounded bg-indigo-600">Acteurs</a>
                  <?php
                }else{
                  ?>
                  <a href="../actors" class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300">Acteurs</a>
                  <?php
                }
             ?>

            <?php
            if($GLOBALS['path'] == "/films"){
                ?>
                <a href="../films" class="p-2 lg:px-4 md:mx-2 text-white rounded bg-indigo-600">Films</a>
                <?php
            }else{
                ?>
                <a href="../films" class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300">Films</a>
                <?php
            }
            ?>


			<?php if( $_SESSION['user'] != null){
				if( $_SESSION['user']->getIsAdmin() == true){
            if($GLOBALS['path'] == "/filmAdd"){
                ?>
                <a href="../filmAdd" class="p-2 lg:px-4 md:mx-2 text-white rounded bg-indigo-600">Ajouter un Film</a>
                <?php
            }else{
                ?>
                <a href="../filmAdd" class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300">Ajouter un Film</a>
                <?php
            }
            ?>

			<?php
            if($GLOBALS['path'] == "/actorAdd"){
                ?>
                <a href="../ActorAdd" class="p-2 lg:px-4 md:mx-2 text-white rounded bg-indigo-600">Ajouter un acteur</a>
                <?php
            }else{
                ?>
                <a href="../actorAdd" class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300">Ajouter un acteur</a>
                <?php
            }}}
            ?>

          <?php


              if( $_SESSION['user'] == null){ ?>
                    <?php
                if($GLOBALS['path'] == "/login"){
                    ?>
                    <a href="../login" class="p-2 lg:px-4 md:mx-2 text-white rounded bg-indigo-600">Connexion</a>
                    <?php
                }else{
                    ?>
                    <a href="../login" class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300">Connexion</a>

                    <?php
                }
                if($GLOBALS['path'] == "/register"){
                  ?>
                  <a href="../register" class="p-2 lg:px-4 md:mx-2 text-white rounded bg-indigo-600">S'enregistrer</a>
                  <?php
              }else{
                  ?>
                  <a href="../register" class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300">S'enregistrer</a>

                  <?php
              }

              }else {?>
                <a href="/logout"
                  class="p-2 lg:px-4 md:mx-2 text-indigo-600 text-center border border-solid border-indigo-600 rounded hover:bg-indigo-600 hover:text-white transition-colors duration-300 mt-1 md:mt-0 md:ml-1"><? echo $_SESSION['user']->getUsername(); ?></a> <?
              }?>

        </div>
      </div>
    </nav>

  <div class="bg-indigo-100 py-6 md:py-12">
    <?
    include($content);

    ?>
  </div>
  <footer class="footer bg-white relative pt-1 border-b-2 border-blue-700">

    <div class="container mx-auto px-6">
      <div class="mt-16 border-t-2 border-gray-300 flex flex-col items-center">
        <div class="sm:w-2/3 text-center py-6">
          <p class="text-sm text-blue-700 font-bold mb-2">
            © 2020 by LazareC & BNN
          </p>
        </div>
      </div>
    </div>
  </footer>

      <?php

      if($GLOBALS['succes'])
      {?>
      <div class="fixed inset-x-0 top-0 flex items-end justify-right px-4 py-6 sm:p-6 justify-end z-30 pointer-events-none">
          <div data-controller="alert" class="max-w-sm w-full shadow-lg rounded px-4 py-3 rounded relative bg-green-400 border-l-4 border-green-700 text-white pointer-events-auto">
              <div class="p-2">
                  <div class="flex items-start">
                      <div class="ml-3 w-0 flex-1 pt-0.5">
                          <p class="text-sm leading-5 font-medium">
                             Succès: <? echo $GLOBALS['succes']; ?>
                          </p>
                      </div>
                      <div class="ml-4 flex-shrink-0 flex">
                          <button data-action="alert#close" class="inline-flex text-white focus:outline-none focus:text-gray-300 transition ease-in-out duration-150">
                              <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                  <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                              </svg>
                          </button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
<?php
      $GLOBALS['succes'] = null;

      }
       ?>

      <?php
      if($GLOBALS['error']){
          ?>
          <div class="fixed inset-x-0 top-0 flex items-end justify-right px-4 py-6 sm:p-6 justify-end z-30 pointer-events-none">
              <div data-controller="alert" class="max-w-sm w-full shadow-lg rounded px-4 py-3 rounded relative bg-red-400 border-l-4 border-red-700 text-white pointer-events-auto">
                  <div class="p-2">
                      <div class="flex items-start">
                          <div class="ml-3 w-0 flex-1 pt-0.5">
                              <p class="text-sm leading-5 font-medium">
                                  Erreur: <?php echo $GLOBALS['error']; ?>
                              </p>
                          </div>
                          <div class="ml-4 flex-shrink-0 flex">
                              <button data-action="alert#close" class="inline-flex text-white focus:outline-none focus:text-gray-300 transition ease-in-out duration-150">
                                  <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                      <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                  </svg>
                              </button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <?php
          $GLOBALS['error'] = null;
      } ?>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $("#multiple").select2({
        placeholder: "Choissiez les acteurs",
        allowClear: true
    });
</script>
</body>

</html>
<?php
};

