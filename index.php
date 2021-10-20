
<?php
    $base = "https://pokeapi.co/api/v2/pokemon/";
    $id = 6;


    $data = file_get_contents($base.$id."/");
    $pokemon = json_decode($data);
    $name = $pokemon->name;
    $id = $pokemon->id;
    
   
    $img_front = $pokemon->sprites->front_default;
    $img_back = $pokemon->sprites->back_default;
    $move1 = $pokemon->moves[0]->move->name;
    $move2 = $pokemon->moves[1]->move->name;
    $move3 = $pokemon->moves[2]->move->name;
    $move4 = $pokemon->moves[3]->move->name;
?>

<?php
 
if(isset($_POST['previous'])){
    pre($id);
}
else if(isset($_POST['next'])){
    echo nex($id);
}
function pre($id){
    echo $id--;
}
function nex($id){
    echo $id++;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Pokedex-php</title>
</head>
<body>
    <div class="pokedex">
        <div class="left-container">
            <div class="left-container_top-section">
                <div class="top-section_blue"></div>
                <div class="top-section_small-buttons">
                    <div class="top-section_red"></div>
                    <div class="top-section_yellow"></div>
                    <div class="top-section_green"></div>
                </div>
            </div>
            <div class="left-container_main-section-container">
                <div class="left-container_main-section">
                    <div class="main-section_white">
                        <div class="main-section_black">
                            <div class="main-screen">
                                <div class="screen_header">
                                    <span class="poke-name"><?php echo $name?></span>
                                    <span class="poke-id"><?php echo $id?></span>
                                </div>
                                <div class="screen_image">
                                    <img src="<?php echo $img_front?>" class="poke-front-image" alt="front">
                                    <img src="<?php echo $img_back?>" class="poke-back-image" alt="back">
                                </div>
                                <form action="index.php" method="post" class="screen_buttons">
                                    <input type="submit" class="button" id="prev-button" name="previous" value="Previous" />
                                    <input type="submit" class="button" id="next-button" name="next" value="Next" />
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="left-container_bottom-section">
                            <input class="searchBar" type="text" name="pokemon" placeholder=" Pokemon Name or ID "/>
                            <img class="button" id="run" src="img/search.png" alt="magnifying glass">
                    </div>
                </div>
                <div class="left-container_right">
                    <div class="left-container_hinge"></div>
                    <div class="left-container_hinge"></div>
                </div>
            </div>
        </div>
        <div class="right-container">
            <div class="right-container_black">
                <div class="move1" id="move1"><?php echo $move1 ?></div>
                <div class="move2" id="move2"><?php echo $move2 ?></div>
                <div class="move3" id="move3"><?php echo $move3 ?></div>
                <div class="move4" id="move4"><?php echo $move4 ?></div>
            </div>
        </div>
    </div>
</body>
</html>







