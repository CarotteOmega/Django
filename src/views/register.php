<div class="h-screen bg-indigo-100 flex justify-center items-center">
    <div class="lg:w-2/5 md:w-1/2 w-2/3">
        <form class="bg-white p-10 rounded-lg shadow-lg min-w-full" action="" method="post">
            <?
            if($GLOBALS['error']){

                ?>
                <div class="flex bg-red-100 rounded-lg p-4 mb-4">
                    <svg class="w-5 h-5 text-red-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <p class="ml-3 text-sm text-red-700">
                        <span class="font-medium">Une erreur est survenue:</span> <?  echo $GLOBALS['error'];  ?>.
                    </p>
                </div>
                <?
                $GLOBALS['error'] = null;
            }
            ?>

            <h1 class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans">S'enregistrer</h1>
            <div>
                <label class="text-gray-800 font-semibold block my-3 text-md" for="username">Identifiant</label>
                <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="username" id="username" placeholder="Identifiant" required/>
            </div>
            <div>
                <label class="text-gray-800 font-semibold block my-3 text-md" for="email">Email</label>
                <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="email" name="email" id="email" placeholder="exemple@email.fr" required/>
            </div>
            <div>
                <label class="text-gray-800 font-semibold block my-3 text-md" for="password">Mot de passe</label>
                <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="password" name="password" id="password" placeholder="Mot de passe" required/>
            </div>
            <div>
             <!--   <label class="text-gray-800 font-semibold block my-3 text-md" for="confirm">Confirmation du mot de passe</label>
                <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="confirm" id="confirm" placeholder="Confirmation du mot de passe" />-->
            </div>
            <button type="submit" name="reg_user" class="w-full mt-6 bg-indigo-600 rounded-lg px-4 py-2 text-lg text-white tracking-wide font-semibold font-sans">S'enregistrer</button>
        </form>
        <p>
            Vous avez déja un compte? <a href="login">Connectez-vous !</a>
        </p>
    </div>
</div>
