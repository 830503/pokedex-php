
<?php
    
    $id = 6;

    

    function getPokemon($id){
        $base = "https://pokeapi.co/api/v2/pokemon/";
        $data = file_get_contents($base.$id."/");
        $pokemon = json_decode($data);
        return $pokemon;
    }
    
    $name = getPokemon($id)->name;
    $id = getPokemon($id)->id;
    
    
    $img_front = getPokemon($id)->sprites->front_default;
    $img_back = getPokemon($id)->sprites->back_default;
    $move1 = getPokemon($id)->moves[0]->move->name;
    $move2 = getPokemon($id)->moves[1]->move->name;
    $move3 = getPokemon($id)->moves[2]->move->name;
    $move4 = getPokemon($id)->moves[3]->move->name;
?>

<?php
if(isset($_POST['run'])){
    $id = $_POST['search'];
    getPokemon($id);
}

/*if(isset($_POST['previous'])){
    $id = $id - 1;
    
}

if(isset($_POST['next'])){
    $id++;
    getPokemon($id++);
 }*/

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
                                    <?php  
                                    
                                    ?>
                                    <input type="submit" class="button" id="next-button" name="next" value="Next" />
                                </form>
                            </div>
                        </div>
                    </div>
                    <form method="post" action="index.php" class="left-container_bottom-section">
                            <input class="searchBar" type="text" name="search" placeholder=" Pokemon Name or ID "/>
                            <input class="button" id="run" type="submit" name="run"/>
                    </form>
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