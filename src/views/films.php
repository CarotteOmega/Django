<?php
$data = [];

//utiliser  $GLOBALS['data'] pour passer de la data
?>



<?php

/** @var Film $film */
?>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-4 mt-12 mb-12">
    <article>
        <section class="mt-6 grid md:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-8">
            <?
foreach ($GLOBALS['films'] as $film){
 ?>
    
            <article class="w-4/5 bg-white group relative rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transform duration-200">
                <div class="relative  w-full h-80 md:h-64 lg:h-44">
                    <img src="<?echo $film->getImgSrc();?>"
                        alt="lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quia."
                        class="w-11/12 rounded-lg m-4 h-full object-center object-cover">
                </div>
                <div class="px-3 py-4">
                    <h3 class="text-sm text-gray-500 pb-2">
                        <h5 class="text-gray-900 font-bold text-xl tracking-tight mb-2 dark:text-white"><?echo $film->getNom();?></h5>
                    </h3>
                    <p class="font-normal text-gray-700 mb-3 dark:text-gray-400">Note : <?echo $film->getScore();?></p>
                    <a href="/film?id=<?echo $film->getId();?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Description
                        <svg class="-mr-1 ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
            </article>

<?php  
}
?>
        </section>
    </article>
</section>

<?php

?>