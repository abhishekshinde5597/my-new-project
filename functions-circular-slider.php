<?php

//gsap shortcode
/*
add_shortcode('aquaprox_gsap','aquaprox_gsap');
function aquaprox_gsap(){
    ob_start(); 
     ?>
       
         <div class="container">
            <div class="wrapper">
    
                <div class="circle-details active">
                    <div class="inner-circle">
                        <span class="year-details">
                            <span class="year">1989</span>
                           <span class="details"><b>Integration:</b> Création de la Société AQUAPROX</span>
                        </span>
                   </div>
                </div> 
                
                <div class="circle-details">
                    <div class="inner-circle">
                        <span class="year-details">
                           <span class="year">2004</span>
                            <span class="details"><b>Integration:</b> AQUAPROX<br> chez Proxis Developpement</span>
                        </span>
                    </div>
                </div>

                <div class="circle-details">
                    <div class="inner-circle">
                        <span class="year-details">
                            <span class="year">2011</span>
                            <span class="details"><b>Integration:</b> AQUAPROX<br> chez Proxis Developpement</span>
                        </span>
                    </div>
                </div>

                <div class="circle-details">
                    <div class="inner-circle">
                        <span class="year-details">
                            <span class="year">2013</span>
                            <span class="details"><b>Integration:</b> AQUAPROX<br> chez Proxis Developpement</span>
                        </span>
                    </div>
                </div>

                <div class="circle-details">
                    <div class="inner-circle">
                        <span class="year-details">
                            <span class="year">2016</span>
                            <span class="details"><b>Integration:</b> AQUAPROX<br> chez Proxis Developpement</span>
                        </span>
                    </div>
                </div>

               <div class="circle-details">
                   <div class="inner-circle">
                       <span class="year-details">
                           <span class="year">2017</span>
                           <span class="details"><b>Integration:</b> AQUAPROX<br> chez Proxis Developpement</span>
                       </span>
                   </div>
               </div>

                <div class="circle-details">
                    <div class="inner-circle">
                        <span class="year-details">
                            <span class="year">2018</span>
                            <span class="details"><b>Integration:</b> AQUAPROX<br> chez Proxis Developpement</span>
                        </span>
                    </div>
                </div>

                <div class="circle-details">
                    <div class="inner-circle">
                        <span class="year-details">
                            <span class="year">2020</span>
                            <span class="details"><b>Integration:</b> AQUAPROX<br> chez Proxis Developpement</span>
                        </span>
                    </div>
                </div>

                <div class="circle-details">
                    <div class="inner-circle">
                        <span class="year-details">
                            <span class="year">2021</span>
                            <span class="details"><b>Integration:</b> AQUAPROX<br> chez Proxis Developpement</span>
                        </span>
                    </div>
                </div>

                <div class="circle-details">
                    <div class="inner-circle">
                        <span class="year-details">
                            <span class="year">2022</span>
                            <span class="details"><b>Integration:</b> AQUAPROX<br> chez Proxis Developpement</span>
                        </span>
                    </div>
                </div>

                <div class="circle-details">
                    <div class="inner-circle">
                        <span class="year-details">
                            <span class="year">2023</span>
                            <span class="details"><b>Integration:</b> AQUAPROX<br> chez Proxis Developpement</span>
                        </span>
                    </div>
                </div>

             <svg width="596" height="596" viewBox="0 0 596 596" fill="none" class="svg-image" xmlns="http://www.w3.org/2000/svg">
                 <circle id="holder" cx="298" cy="298" r="297" stroke="#EEF2F4" stroke-width="2"/>
             </svg>

             </div> 
       </div>

        <div class="slider-buttons">
            <svg xmlns="http://www.w3.org/2000/svg" width="37" height="35" viewBox="0 0 37 35" fill="none" id="prev">
                <rect x="36" y="1" width="33" height="35" rx="16.5" transform="rotate(90 36 1)" stroke="#2C3F89" stroke-width="2"/>
                <path d="M26 19C26.5523 19 27 18.5523 27 18C27 17.4477 26.5523 17 26 17L26 19ZM9.29289 17.2929C8.90237 17.6834 8.90237 18.3166 9.29289 18.7071L15.6569 25.0711C16.0474 25.4616 16.6805 25.4616 17.0711 25.0711C17.4616 24.6805 17.4616 24.0474 17.0711 23.6569L11.4142 18L17.0711 12.3431C17.4616 11.9526 17.4616 11.3195 17.0711 10.9289C16.6805 10.5384 16.0474 10.5384 15.6569 10.9289L9.29289 17.2929ZM26 17L10 17L10 19L26 19L26 17Z" fill="#2C3F89"/>
            </svg>

        <svg xmlns="http://www.w3.org/2000/svg" width="37" height="35" viewBox="0 0 37 35" fill="none" id="next">
            <rect x="1" y="34" width="33" height="35" rx="16.5" transform="rotate(-90 1 34)" stroke="#2C3F89" stroke-width="2"/>
            <path d="M11 17C10.4477 17 10 17.4477 10 18C10 18.5523 10.4477 19 11 19L11 17ZM27.7071 18.7071C28.0976 18.3166 28.0976 17.6834 27.7071 17.2929L21.3431 10.9289C20.9526 10.5384 20.3195 10.5384 19.9289 10.9289C19.5384 11.3195 19.5384 11.9526 19.9289 12.3431L25.5858 18L19.9289 23.6569C19.5384 24.0474 19.5384 24.6805 19.9289 25.0711C20.3195 25.4616 20.9526 25.4616 21.3431 25.0711L27.7071 18.7071ZM11 19L27 19L27 17L11 17L11 19Z" fill="#2C3F89"/>
        </svg>
        </div>
 
    </div>

    <?php
    return ob_get_clean();
}
*/
add_shortcode('aquaprox_gsap_shortcode','aquaprox_gsap_shortcode');
function aquaprox_gsap_shortcode(){
    ob_start(); 
     ?>
     <div class="circular-slider">
         <div class="container">
            <div class="wrapper">
         <?php   if( have_rows('gsap') ): ?>
        <div class="reviews-list-wrap">
        <?php
        // Loop through rows.
        while( have_rows('gsap') ) : the_row();

           $year = get_sub_field('year');
           $description = get_sub_field('description');
           $text = get_sub_field('text');
           ?>
         <?php if($year != '' || $year != null || $description != '' || $description != null || $text != '' || $text != null  ){ ?>
           <div class="circle-details year-<?php echo $year;?>">
                <div class="inner-circle">
                </div>
                
                <span class="year-details ">
                    <span class="year"><?php echo $year;?> </span>
                    <span class="details"><b><?php echo $description;?></b>
                    <span><?php echo $text; ?></span></span>
                </span>
            </div>
        <?php } ?>
           <?php

        endwhile;
         ?>
       
        <?php
    endif;
           ?>
             <svg width="596" height="596" viewBox="0 0 596 596" fill="none" class="svg-image" xmlns="http://www.w3.org/2000/svg">
                 <circle id="holder" cx="298" cy="298" r="297" stroke="#EEF2F4" stroke-width="2"/>
             </svg>

             </div> 
       </div>

        <div class="slider-buttons">
            <svg xmlns="http://www.w3.org/2000/svg" width="37" height="35" viewBox="0 0 37 35" fill="none" id="prev">
                <rect x="36" y="1" width="33" height="35" rx="16.5" transform="rotate(90 36 1)" stroke="#2C3F89" stroke-width="2"/>
                <path d="M26 19C26.5523 19 27 18.5523 27 18C27 17.4477 26.5523 17 26 17L26 19ZM9.29289 17.2929C8.90237 17.6834 8.90237 18.3166 9.29289 18.7071L15.6569 25.0711C16.0474 25.4616 16.6805 25.4616 17.0711 25.0711C17.4616 24.6805 17.4616 24.0474 17.0711 23.6569L11.4142 18L17.0711 12.3431C17.4616 11.9526 17.4616 11.3195 17.0711 10.9289C16.6805 10.5384 16.0474 10.5384 15.6569 10.9289L9.29289 17.2929ZM26 17L10 17L10 19L26 19L26 17Z" fill="#2C3F89"/>
            </svg>

            <svg xmlns="http://www.w3.org/2000/svg" width="37" height="35" viewBox="0 0 37 35" fill="none" id="next">
                <rect x="1" y="34" width="33" height="35" rx="16.5" transform="rotate(-90 1 34)" stroke="#2C3F89" stroke-width="2"/>
                <path d="M11 17C10.4477 17 10 17.4477 10 18C10 18.5523 10.4477 19 11 19L11 17ZM27.7071 18.7071C28.0976 18.3166 28.0976 17.6834 27.7071 17.2929L21.3431 10.9289C20.9526 10.5384 20.3195 10.5384 19.9289 10.9289C19.5384 11.3195 19.5384 11.9526 19.9289 12.3431L25.5858 18L19.9289 23.6569C19.5384 24.0474 19.5384 24.6805 19.9289 25.0711C20.3195 25.4616 20.9526 25.4616 21.3431 25.0711L27.7071 18.7071ZM11 19L27 19L27 17L11 17L11 19Z" fill="#2C3F89"/>
            </svg>
        </div>
    </div>

    </div>
    
    <div class="custom_sliderblock">
         <div class="container">

            <div class="custom_slider_inner_main"> 
                
                <div class="custom_slider_inner">
    
                    <div class="custom_slide custom_slide1 gap0 started"> 
                        <span class="item_dot">
                            <span class="custom_yeardetails">
                                <span class="c_year">1989</span>
                            <span class="c_details"><b>Création de la Société AQUAPROX</b></span>
                            </span>
                        </span>
                    </div> 
                    
                    <div class="custom_slide custom_slide2 gap15 active"> 
                        <span class="item_dot">
                            <span class="custom_yeardetails">
                            <span class="c_year">2004</span>
                                <span class="c_details"><b>Integration:</b> AQUAPROX<br> chez Proxis Developpement</span>
                            </span> 
                        </span>
                    </div>

                    <div class="custom_slide custom_slide3 gap7"> 
                        <span class="item_dot">
                            <span class="custom_yeardetails">
                                <span class="c_year">2011</span>
                                <span class="c_details"><b>Integration:</b> AQUAPROX<br> chez Proxis Developpement</span>
                            </span>
                        </span>
                    </div> 

                    <div class="custom_slide custom_slide4 gap2"> 
                        <span class="item_dot">
                            <span class="custom_yeardetails">
                                <span class="c_year">2013</span>
                                <span class="c_details"><b>Integration:</b> AQUAPROX<br> chez Proxis Developpement</span>
                            </span>
                        </span>
                    </div>

                    <div class="custom_slide custom_slide5 gap3">
                        
                        <span class="item_dot">
                            <span class="custom_yeardetails">
                                <span class="c_year">2016</span>
                                <span class="c_details"><b>Integration:</b> AQUAPROX<br> chez Proxis Developpement</span>
                            </span>
                        </span>
                    </div>

                    <div class="custom_slide custom_slide6 gap1"> 
                        <span class="item_dot">
                            <span class="custom_yeardetails">
                                <span class="c_year">2017</span>
                                <span class="c_details"><b>Integration:</b> AQUAPROX<br> chez Proxis Developpement</span>
                            </span>
                        </span>
                    </div>

                    <div class="custom_slide custom_slide7 gap1"> 
                        <span class="item_dot">
                            <span class="custom_yeardetails">
                                <span class="c_year">2018</span>
                                <span class="c_details"><b>Integration:</b> AQUAPROX<br> chez Proxis Developpement</span>
                            </span>
                        </span>
                    </div>

                    <div class="custom_slide custom_slide8 gap2">
                        <span class="item_dot">
                            <span class="custom_yeardetails">
                                <span class="c_year">2020</span>
                                <span class="c_details"><b>Integration:</b> AQUAPROX<br> chez Proxis Developpement</span>
                            </span>
                        </span>
                    </div>

                    <div class="custom_slide custom_slide9 gap1">
                        <span class="item_dot">
                            <span class="custom_yeardetails">
                                <span class="c_year">2021</span>
                                <span class="c_details"><b>Integration:</b> AQUAPROX<br> chez Proxis Developpement</span>
                            </span>
                        </span>
                    </div>

                    <div class="custom_slide custom_slide10 gap1"> 
                        <span class="item_dot">
                            <span class="custom_yeardetails">
                                <span class="c_year">2022</span>
                                <span class="c_details"><b>Integration:</b> AQUAPROX<br> chez Proxis Developpement</span>
                            </span>
                        </span>
                    </div>

                    <div class="custom_slide custom_slide11 gap1">
                        <span class="item_dot">
                            <span class="custom_yeardetails">
                                <span class="c_year">2023</span>
                                <span class="c_details"><b>Integration:</b> AQUAPROX<br> chez Proxis Developpement</span>
                            </span>
                        </span>
                    </div>

                </div> 

                <div class="middle_image">
                    <img src="/wp-content/uploads/2023/11/slider-inner-img.png" alt="">
                </div> 

            </div>

        </div>
        
    </div>
    

    <?php
    return ob_get_clean();
}






