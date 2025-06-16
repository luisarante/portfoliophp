<section>
    <div class="w-full flex gap-20 px-18 justify-center py-6 flex-wrap">
        <?php
            $mysqli = new mysqli("localhost", "root", "", "portfolio_db");
            $consulta = $mysqli->query("SELECT * FROM skills");
            while ($skills = $consulta->fetch_object()) {
                echo '<img class="skills" src="images/skills/' . $skills->imagem .'" title="'. $skills->skill .'"></img>';
            }
        ?>
    </div>
</section>