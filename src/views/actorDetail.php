<?php
$actor = $GLOBALS['actor'];

?>
    <div class=" bg-indigo-100 flex justify-center w-screen items-center">
        <div class="lg:w-3/5 md:w-4/5 w-2/3 mb-5">
            <div class="bg-white p-10 rounded-lg shadow-lg min-w-full">
                <img src="<?echo $actor->getImgSrc();?>"
                            alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug."
                            class="w-3/5 rounded-lg m-4  object-center object-cover m-auto mb-10">
                <h1 class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans"><?echo $actor->getNom();?> <?echo $actor->getPrenom();?></h1>
                <p class="text-center text-2xl text-gray-600 font-sans">Films : </p>
                <?php
                foreach ($GLOBALS['casting']['films'] as $film){
                    ?>
                    <a href="/film?id=<? echo $film->getId();?>"> <p class="text-center text-1xl text-blue-600 font-sans"><? echo $film->getNom(). ", " . $film->getAnnee();?></p></a>
                    <?php
                }
                ?>
                <?
                if(isset($_SESSION['user'])){
                    //check if user is admin
                    if($_SESSION['user']->getIsAdmin() == true){
                        ?>
                        <div class="text-center mt-6 ">
                        <a href="actorEdit?id=<?echo $actor->getId();?>" class="p-2 lg:px-4 md:mx-2 text-white rounded bg-green-400">Modifier</a>
                        <a href="actorRemove?id=<?echo $actor->getId();?>" class="p-2 lg:px-4 md:mx-2 text-white rounded bg-red-600">Supprimer</a>
                        </div>
                        <?
                    }
                }?>
            </div>

        </div>
    </div>

    <?php

?>
