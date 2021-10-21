
<?php
        
     if(isset($_POST['run'])){
        $id = $_POST['search'];
        getPokemon($id);
    } 
    function getPokemon($id){
        $base = "https://pokeapi.co/api/v2/pokemon/";
        $data = file_get_contents($base.$id."/");
        $pokemon = json_decode($data);
        return $pokemon;
    }
     if(isset($_POST['previous'])){
        $id--;
        getPokemon($id);
    }

    if(isset($_POST['next'])){
        $id++;
        getPokemon($id);
    }

    
    $name = getPokemon($id)->name;
    $id = getPokemon($id)->id;
    $img_front = getPokemon($id)->sprites->front_default;
    $img_back = getPokemon($id)->sprites->back_default;    
    
    $getMoves = getPokemon($id)->moves;
    $moves = array_splice($getMoves,0,4);
    
    
    
    

   
    
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
                    <form method="post" action="index.php" class="left-container_bottom-section">
                            <input class="searchBar" type="text" name="search" placeholder=" Pokemon Name or ID "/>
                            <input class="button" id="run" type="submit" name="run" value=" GO "/>
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
                <div class="move1" id="move1">
                    <?php 
                    if(array_key_exists(0, $moves)){
                        $move1 = $moves[0]->move->name;
                        echo $move1;
                    }else {
                        echo "NA";
                    }
                    ?>
                 </div>
                <div class="move2" id="move2">
                    <?php 
                    if(array_key_exists(1, $moves)){
                        $move2 = $moves[1]->move->name;
                        echo $move2;
                    }else {
                        echo "NA";
                    }
                     ?>
                </div>
                <div class="move3" id="move3">
                    <?php
                     if(array_key_exists(2, $moves)){
                        $move3 = $moves[2]->move->name;
                        echo $move3;
                    }else {
                        echo "NA";
                    }
                     ?>
                </div>
                <div class="move4" id="move4">
                    <?php
                    
                    if(array_key_exists(3, $moves)){
                        $move4 = $moves[3]->move->name;
                        echo $move4;
                    }else {
                        echo "NA";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>