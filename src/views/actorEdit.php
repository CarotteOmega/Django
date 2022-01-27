<?php

?>

<div class="h-screen bg-indigo-100 flex justify-center items-center">
            <div class="lg:w-2/5 md:w-1/2 w-2/3">
                <form class="bg-white p-10 rounded-lg shadow-lg min-w-full" method="post" enctype="multipart/form-data">
                    <h1 class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans">Editer le profil de <?php echo $GLOBALS['actor']->getNom(); ?></h1>
                    <div>
                        <label class="text-gray-800 font-semibold block my-3 text-md" for="nom">Prenom</label>
                        <input required class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" value="<?php echo $GLOBALS['actor']->getPrenom(); ?>" type="text" name="prenom" id="prenom" placeholder="Prenom" />
                    </div>
                    <div>
                        <label class="text-gray-800 font-semibold block my-3 text-md" for="annee">Nom</label>
                        <input required class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" value="<?php echo $GLOBALS['actor']->getNom(); ?>" type="text"  name="nom" id="nom" placeholder="Nom"  />
                    </div>
                    <div>
                        <label class="text-gray-800 font-semibold block my-3 text-md" for="imgsrc">Photo</label>
                        <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="file" name="imgsrc" id="imgsrc"/>
                    </div>
                    <button type="submit"  class="w-full mt-6 bg-indigo-600 rounded-lg px-4 py-2 text-lg text-white tracking-wide font-semibold font-sans">Modifier l'acteur</button>
                </form>
            </div>
        </div>
