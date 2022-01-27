<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<div class="h-screen bg-indigo-100 flex justify-center items-center">
        <div class="lg:w-2/5 md:w-1/2 w-2/3">
            <form class="bg-white p-10 rounded-lg shadow-lg min-w-full" method="post">
                <h1 class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans">Ajouter un acteur film</h1>


                <div>
                    <label class="text-gray-800 font-semibold block my-3 text-md" for="nb_vote">Nom du film</label>
                    <input required class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" value="<?php echo $GLOBALS['film']->getNom(); ?>" disabled="disabled" type="text" name="nom" id="nom"/>
                </div>
                <label class="text-gray-800 font-semibold block my-3 text-md" for="nb_vote">Acteurs</label>
                <div class="relative inline-flex w-full">
                    <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
<!--                    <select id="acteur" name="acteur[]" multiple="multiple" class="multiple js-states form-control border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">-->
                    <select id="multiple" name="acteur[]" class="js-states form-control orm-control w-full border border-gray-300 rounded-full text-gray-600 h-10 pl-5 bg-white hover:border-gray-400 focus:outline-none appearance-none" multiple>
                    <option disabled <!--selected-->  >Choisissez l'acteur</option>
                      <? foreach ($GLOBALS['actors'] as $actor){
                        ?> <option required value="<?echo $actor->getId()?>"><? echo $actor->getPrenom(). " " . $actor->getNom();?></option> <? }?>
                    </select>
                  </div>
                <button type="submit"  class="w-full mt-6 bg-indigo-600 rounded-lg px-4 py-2 text-lg text-white tracking-wide font-semibold font-sans">Ajouter le film</button>
            </form>
        </div>
    </div>
