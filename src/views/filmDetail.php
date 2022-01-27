<?php
/** @var Film $film */
$film = $GLOBALS['film'];

?>
    <div class=" bg-indigo-100 flex justify-center w-screen items-center">
        <div class="lg:w-3/5 md:w-4/5 w-2/3 mb-5">
            <div class="bg-white p-10 rounded-lg shadow-lg min-w-full">
                <img src="<?echo $film->getImgSrc();?>"
                            alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug."
                            class="w-3/5 rounded-lg m-4  object-center object-cover m-auto mb-10">
                <h1 class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans"><?echo $film->getNom();?></h1>
                <p class="text-center text-2xl text-gray-600 font-sans">Années : <?echo $film->getAnnee();?></p>
                <p class="text-center text-2xl text-gray-600 font-sans">Score : <?echo $film->getScore();?></p>
                <p class="text-center text-2xl text-gray-600 font-sans">Nombre de votes : <?echo $film->getNbVote();?></p>
                <p class="text-center text-2xl text-gray-600 font-sans">Acteurs : </p>

                <?php
                foreach ($GLOBALS['casting']['actors'] as $actor){
                    ?>
                    <a href="/actor?id=<? echo $actor->getId();?>"> <p class="text-center text-1xl text-blue-600 font-sans"><? echo $actor->getPrenom(). " " . $actor->getNom();?></p></a>
                    <?php
                }
                ?>
                                <br> 
                <? if ($_SESSION['vote'][$film->getId()] != true) {?>
   
                <p class="text-center text-2xl text-gray-600 font-sans">Noter le film : </p>
                <form class="text-center" method="post" >
                    <input class="w-s bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="number" step="0.5" min="0" max="10" name="vote" id="vote"   />
                    <br>
                    <button type="submit"  class="w-s mt-6 bg-indigo-600 rounded-lg px-4 py-2 text-lg text-white tracking-wide font-semibold font-sans">Ajouter le vote</button>
                </form>
                <?}else{?>
                <p class="text-center text-2xl text-gray-400 font-sans">Vous avez déjà noté ce film</p> <?}?>



                <?
                if(isset($_SESSION['user'])){
                    //check if user is admin
                    if($_SESSION['user']->getIsAdmin() == true){
                        ?>
                        <div class="text-center mt-6 ">
                        <a href="filmEdit?id=<?echo $film->getId();?>" class="p-2 lg:px-4 md:mx-2 text-white rounded bg-green-400">Modifier</a>
                        <a href="castingAdd?id=<?echo $film->getId();?>" class="p-2 lg:px-4 md:mx-2 text-white rounded bg-yellow-400">Ajouter un acteur</a>
                        <a href="filmRemove?id=<?echo $film->getId();?>" class="p-2 lg:px-4 md:mx-2 text-white rounded bg-red-600">Supprimer</a>
                        </div>
                        <?
                    }
                }?>
            </div>
        </div>
    </div>

