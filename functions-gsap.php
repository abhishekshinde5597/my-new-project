<?php

add_shortcode('gsap_animation','gsap_animation');
function gsap_animation(){
    ob_start(); 
     ?>
        <div class="image-text">
            <div class="image">
                <img src="/wp-content/uploads/2023/10/Group-145.svg" alt="">
            </div>

    <div class="text">
             <div class="expertises-main nos-expertises-slider-home">
           <div class="Nos-expertises-slider slider-for">
        
            <?php
            // Check if the repeater field has rows.
            if (have_rows('expertise')) :
                while (have_rows('expertise')) : the_row();
                    $title   = get_sub_field('title');
                    $content = get_sub_field('content');
                    $image   = get_sub_field('image');
                    ?>
                  
                    <div class="nos-wrap">
                        <div class="nos-main">
                        <?php if($image){ ?>
                            <div class="column-50">
                                <img class="slide-main-img" src="<?php echo esc_url($image); ?>" alt="">
                            </div>
                            <?php } ?>
                            <div class="content-col">
                              <?php if($title) { ?>
                                <h5 class="slide-titles"><?php echo esc_html($title); ?></h5>
                                <?php } ?>

                                <?php if($content){ ?>
                                <div class="slide-content"><?php echo $content; ?></div>
                                <?php } ?>
                                
                                <div class="aq-morelink">
                                <a href="javascript:void()" class="morelink"><?php echo apply_filters( 'wpml_translate_single_string', 'Learn more', 'customstaring', 'En-savoir-plus-btn' );?></a>
                                </div>
                                
                            <ul class="aq-icon">
                              <?php  if( have_rows('company_icon') ): 
                              while ( have_rows('company_icon') ) : the_row(); 
                              $icon = get_sub_field('icon');
                              $url = get_sub_field('company_icon');
                              
                               ?>
  
                              <?php if($icon && $url ) { ?>
                              <li><img class="aq-company-icon" src="<?php echo esc_url($icon); ?>" alt="Nav Image"></li>
                              <?php } ?>
                              <?php
                              endwhile; endif;
                               ?>  
                            </ul>       

                            </div>
                        </div>
                    </div>

                <?php

                endwhile;      
              endif;
            ?>

        </div>

        <div class="Nos-expertises-nav slider-nav">
            <?php
           
            if (have_rows('expertise')) :
                while (have_rows('expertise')) : the_row();
                    $nav_image = get_sub_field('nav_image');
                    $title   = get_sub_field('title');   
                    ?>
                    <div>
                      <?php if($nav_image) {?>
                      <div class="nav-tab">
                        <img class="nav-img" src="<?php echo esc_url($nav_image); ?>" alt="Nav Image">
                        </div>
                        <?php } ?>

                        <?php if($title) { ?>
                        <h5 class="slide-title"><?php echo esc_html($title); ?></h5>
                        <?php } ?>

                    </div>
                    <?php
                   
                endwhile;
            endif;

            ?>
        </div>

    </div>
    </div> 

  </div>
    
    <?php
    return ob_get_clean();
}



//expertise shortcode
add_shortcode('expertises','expertises');
function expertises(){
ob_start();
?>
<!-- <div class="expertises-main">
  <div class="Nos-expertises-slider slider-for">
    <div class="nos-wrap">
      <div class="nos-main">

        <div class="column-50">
          <img class="slide-main-img" src="http://nicolasd121.sg-host.com/wp-content/uploads/2023/11/process.png">
        </div>

        <div class="content-col">
          <h5 class="slide-title">Chaudières</h5>
          <p class="slide-content">Mise à disposition des solutions (équipements, produits et/ou services) permettant de
            produire l’eau nécessaire à vos procédés industriels en garantissant un niveau de qualité élevé et constant, une
            optimisation de votre besoin en eau pour minimiser votre impact environnemental.</p>
          <a href="" class="morelink">En savoir plus</a> 
        </div> 

      </div>
    </div>

    <div class="nos-wrap">
      <div class="nos-main">
        <div class="column-50">
          <img class="slide-main-img" src="http://nicolasd121.sg-host.com/wp-content/uploads/2023/11/Tertiaire-1.png">
        </div>
        <div class="content-col">
          <h5 class="slide-title">Chaudières</h5>
          <p class="slide-content">Mise à disposition des solutions (équipements, produits et/ou services) permettant de
            produire l’eau nécessaire à vos procédés industriels en garantissant un niveau de qualité élevé et constant, une
            optimisation de votre besoin en eau pour minimiser votre impact environnemental.</p>
          <a href="" class="morelink">En savoir plus</a> 
        </div>
      </div> 
    </div>
    <div class="nos-wrap">
      <div class="nos-main">
        <div class="column-50">
          <img class="slide-main-img" src="http://nicolasd121.sg-host.com/wp-content/uploads/2023/11/Refroidissement-1.png">
        </div>
        <div class="content-col">
          <h5 class="slide-title">Chaudières</h5>
          <p class="slide-content">Mise à disposition des solutions (équipements, produits et/ou services) permettant de
            produire l’eau nécessaire à vos procédés industriels en garantissant un niveau de qualité élevé et constant, une
            optimisation de votre besoin en eau pour minimiser votre impact environnemental.</p>
          <a href="" class="morelink">En savoir plus</a> 
        </div>
      </div>
    </div>
    <div class="nos-wrap">
      <div class="nos-main">
        <div class="column-50">
          <img class="slide-main-img" src="http://nicolasd121.sg-host.com/wp-content/uploads/2023/11/process-3.png">
        </div>
        <div class="content-col">
          <h5 class="slide-title">Chaudières</h5>
          <p class="slide-content">Mise à disposition des solutions (équipements, produits et/ou services) permettant de
            produire l’eau nécessaire à vos procédés industriels en garantissant un niveau de qualité élevé et constant, une
            optimisation de votre besoin en eau pour minimiser votre impact environnemental.</p>
          <a href="" class="morelink">En savoir plus</a> 
        </div>
      </div>
    </div>
    <div class="nos-wrap">
      <div class="nos-main">
        <div class="column-50">
          <img class="slide-main-img" src="http://nicolasd121.sg-host.com/wp-content/uploads/2023/11/epuration-1.png">
        </div>
        <div class="content-col">
          <h5 class="slide-title">Chaudières</h5>
          <p class="slide-content">Mise à disposition des solutions (équipements, produits et/ou services) permettant de
            produire l’eau nécessaire à vos procédés industriels en garantissant un niveau de qualité élevé et constant, une
            optimisation de votre besoin en eau pour minimiser votre impact environnemental.</p>
          <a href="" class="morelink">En savoir plus</a> 
        </div> 
      </div>
    </div>
    <div class="nos-wrap">
      <div class="nos-main">
        <div class="column-50">
          <img class="slide-main-img" src="http://nicolasd121.sg-host.com/wp-content/uploads/2023/11/reuse-1.png">
        </div>
        <div class="content-col">
          <h5 class="slide-title">Chaudières</h5>
          <p class="slide-content">Mise à disposition des solutions (équipements, produits et/ou services) permettant de
            produire l’eau nécessaire à vos procédés industriels en garantissant un niveau de qualité élevé et constant, une
            optimisation de votre besoin en eau pour minimiser votre impact environnemental.</p>
          <a href="" class="morelink">En savoir plus</a> 
        </div> 
      </div>
    </div>
  </div>
  <div class="Nos-expertises-nav slider-nav">
    <div>
      <img class="nav-img" src="http://nicolasd121.sg-host.com/wp-content/uploads/2023/11/process-1.png">
    </div>
    <div>
      <img class="nav-img" src="http://nicolasd121.sg-host.com/wp-content/uploads/2023/11/Tertiaire.png">
    </div>
    <div>
      <img class="nav-img" src="http://nicolasd121.sg-host.com/wp-content/uploads/2023/11/Refroidissement.png">
    </div>
    <div>
      <img class="nav-img" src="http://nicolasd121.sg-host.com/wp-content/uploads/2023/11/process-2.png">
    </div>
    <div>
      <img class="nav-img" src="http://nicolasd121.sg-host.com/wp-content/uploads/2023/11/epuration.png">
    </div>
    <div>
      <img class="nav-img" src="http://nicolasd121.sg-host.com/wp-content/uploads/2023/11/reuse.png">
    </div>
  </div>
  
</div> -->
<?php
return ob_get_clean();
}



add_shortcode('expertises_shortcode', 'expertises_shortcode');

function expertises_shortcode()
{
    ob_start();
    ?>
    <div class="expertises-main expertise_page_slider">
        <div class="Nos-expertises-slider slider-for">
        
            <?php
            // Check if the repeater field has rows.
            if (have_rows('expertise')) :
                while (have_rows('expertise')) : the_row();
                    $title   = get_sub_field('title');
                    $content = get_sub_field('content');
                    $image   = get_sub_field('image');
                    ?>
            
                    <div class="nos-wrap">
                        <div class="nos-main">
                        <?php if($image){ ?>
                            <div class="column-50">
                                <img class="slide-main-img" src="<?php echo esc_url($image); ?>" alt="">
                            </div>
                            <?php } ?>
                            <div class="content-col">
                              <?php if($title) { ?>
                                <h5 class="slide-titles"><?php echo esc_html($title); ?></h5>
                                <?php } ?>

                                <?php if($content){ ?>
                                <div class="slide-content"><?php echo $content; ?></div>
                                <?php } ?>
                                
                                <div class="aq-morelink">
                                <a href="javascript:void(0)" class="afficher" id><?php echo apply_filters( 'wpml_translate_single_string', 'Show more', 'customstaring', 'Afficher-plus-btn' );?></a>
                                </div>
                                
                            <ul class="aq-icon">
                              <?php  if( have_rows('company_icon') ): 
                              while ( have_rows('company_icon') ) : the_row(); 
                              $icon = get_sub_field('icon');
                              $company_url = get_sub_field('company_url');
                               ?>
  
                              <?php if($icon) { ?>
                              <li><a href="<?php echo ($company_url); ?>"><img class="aq-company-icon" src="<?php echo esc_url($icon); ?>" alt="Nav Image"></a></li>
                              <?php } ?>
                              <?php
                              endwhile; endif;
                               ?>  
                            </ul>       

                            </div>
                        </div>
                    </div>

                <?php

                endwhile;      
              endif;
            ?>

        </div>

        <div class="Nos-expertises-nav slider-nav">
            <?php
           
            if (have_rows('expertise')) :
                while (have_rows('expertise')) : the_row();
                    $nav_image = get_sub_field('nav_image');
                    $title   = get_sub_field('title');   
                    ?>
                    <div>
                      <?php if($nav_image) {?>
                      <div class="nav-tab">
                        <img class="nav-img" src="<?php echo esc_url($nav_image); ?>" alt="Nav Image">
                        </div>
                        <?php } ?>

                        <?php if($title) { ?>
                        <h5 class="slide-title"><?php echo esc_html($title); ?></h5>
                        <?php } ?>

                    </div>
                    <?php
                   
                endwhile;
            endif;

            ?>
        </div>

    </div>

    <?php
    return ob_get_clean();
}



?>