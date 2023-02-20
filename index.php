<?php

// If there is a question, ask the API with the python program
if($_SERVER["REQUEST_METHOD"] == "POST"){
$question = trim($_POST["question"]);
$command = 'python3 main.py "' .$question . '"' ;
$command = escapeshellcmd($command);
$output = shell_exec($command);

}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
  </head>
  <body>




    <section class="bg-gray-50 dark:bg-gray-900">
      <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0" style="width : 1000px;">
        <br>
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Question <mark class="px-2 text-white bg-blue-600 rounded dark:bg-blue-500">Awnser</mark></h1>
        <h2 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">Using OpenAI API</h2>
        <br>
          <div class="w-full  bg-gray-200 rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">

              <div class="p-6 space-y-4 md:space-y-6 sm:p-8">

                  <form class="space-y-4 md:space-y-6" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <?php
                    // If there is an awnser, display it
                    if ($output != NULL){
                      echo('<div class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700" style="width : 800px;">');
                      echo ('<h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Awnser :</h5>');
                      echo('<p class="font-normal text-gray-700 dark:text-gray-400">');
                      echo $output;
                      echo("</p></div><br>");
                    }

                    ?>


                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Question :</h5>
                    <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                               <textarea id="comment" name="question" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="..." required></textarea>
                           </div>
                           <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                      <!-- Bouton connexion -->
                      <button type="summit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Send</button>


                  </form>
              </div>
          </div>
      </div>
    </section>





  </body>
</html>
