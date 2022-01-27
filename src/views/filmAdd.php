<?php

?>

<div class="h-screen bg-indigo-100 flex justify-center items-center">
            <div class="lg:w-2/5 md:w-1/2 w-2/3">
                <form class="bg-white p-10 rounded-lg shadow-lg min-w-full" method="post"  enctype="multipart/form-data">
                    <h1 class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans">Ajouter un film</h1>
                    <div>
                        <label class="text-gray-800 font-semibold block my-3 text-md" for="nom">Nom du film</label>
                        <input required class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="nom" id="nom" placeholder="Nom du film" />
                    </div>
                    <div>
                        <label class="text-gray-800 font-semibold block my-3 text-md" for="annee">Année</label>
                        <input required class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="number" min="1800" name="annee" id="annee" placeholder="Année"  />
                    </div>
                    <div>
                        <label class="text-gray-800 font-semibold block my-3 text-md" for="score">Score</label>
                        <input required class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" min="0" max="10" type="number" step="0.01" name="score" id="score" placeholder="Score"  />
                    </div>
                    <div>
                        <label class="text-gray-800 font-semibold block my-3 text-md" for="nb_vote">Nombre de Votes</label>
                        <input required class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="number" name="nb_vote" id="nb_vote" placeholder="Nombre de Votes"  />
                    </div>
                    <div>
                        <label class="text-gray-800 font-semibold block my-3 text-md" for="imgsrc">Affiche</label>
                        <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="file" name="imgsrc" id="imgsrc"/>
                    </div>
                    <button type="submit"  class="w-full mt-6 bg-indigo-600 rounded-lg px-4 py-2 text-lg text-white tracking-wide font-semibold font-sans">Ajouter le film</button>
                </form>
            </div>
        </div>
