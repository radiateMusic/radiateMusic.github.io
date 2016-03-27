<?php /* Template Name: Map Page Template Test */ get_header();
                                                                                 
    if(!ffbh_IsMobile())
    {
        ?>
	        <main role="main">
		        <!-- section -->
		        <section>

                    <div class="row" id="row-map">

                        <div class="col-lg-12">
                    
                            <div id="map-wrapper">
                                <div id="loader">
                                    <i class="fa fa-spinner fa-spin"></i>
                                </div>
                                <div id="image-wrapper">

                                    <?php
                                        $args = array(
                                            'post_type' => 'destination',
                                            'post_status' => 'publish',
                                            'posts_per_page' => -1,
                                            'caller_get_posts'=> 1);
                                        $my_query = new WP_Query($args);
                                        $speciesArray = array();
                                
                                        $count = 0;
                                        while ($my_query->have_posts())
                                        {
                                            $my_query -> the_post();
                                            $destinationTitle = get_the_title();
                                            
                                            if(get_field( 'species' ))
                                            {
                                                $speciesItemArray = array();
                                                
                                                foreach(get_field( 'species' ) as $speciesItem)
                                                {
                                                    array_push($speciesItemArray, get_the_title($speciesItem));
                                                }
                                                
                                                $speciesArray[ffbh_Slug($destinationTitle)] = implode(",", $speciesItemArray);
                                            }
                                        }
                                        
                                        function getSpeciesList($slug)
                                        {
                                            global $speciesArray;
                                            
                                            return ' data-specieslist="' . $speciesArray[$slug] . '" ';
                                        }
                                    ?>

                                    <!--West Coast-->

                                    <a class="i-link-destination i-link-destination-2 i-link-left" href="#" data-zoom="6|19|40|43|wc" style="left: 19.2%; top: 45%;">
                                        <div><b>ZOOM</b><br />West Coast</div><div class="magnifier"><?= ffbh_Icon('ffbhsiteicons-38') ?></div></a>
                                    
                                    <a class="i-link-destination i-link-destination-5 i-link-left" href="/map/california" data-destination="wc" style="left: 25.5%; top: 47%;" <?= getSpeciesList('california'); ?>>
                                        <div>California</div><span></span></a>

                                    <!--Gulf of Mexico-->

                                    <a class="i-link-destination i-link-destination-2 i-link-left" href="#" data-zoom="10|31|50|37|gc" style="left: 27.5%; top: 51%;">
                                        <div><b>ZOOM</b><br />Gulf Coast</div><div class="magnifier"><?= ffbh_Icon('ffbhsiteicons-38') ?></div></a>

                                    <a class="i-link-destination i-link-destination-4" href="/map/texas" data-destination="gc" style="left: 33.5%; top: 52.9%;" <?= getSpeciesList('texas'); ?>>
                                        <span></span><div>Texas</div></a>

                                    <a class="i-link-destination i-link-destination-2 i-link-left" href="/map/louisiana" data-destination="gc" style="left: 34.4%; top: 52.3%;" <?= getSpeciesList('louisiana'); ?>>
                                        <div>Louisiana</div><span></span></a>

                                    <a class="i-link-destination i-link-destination-2 i-link-left" href="/map/mississippi" data-destination="gc" style="left: 34.7%; top: 51.6%;" <?= getSpeciesList('mississippi'); ?>>
                                        <div>Mississippi</div><span></span></a>

                                    <a class="i-link-destination i-link-destination-2" href="/map/alabama" data-destination="gc" style="left: 35.78%; top: 51.6%;" <?= getSpeciesList('alabama'); ?>>
                                        <span></span><div>Alabama</div></a>

                                    <a class="i-link-destination i-link-destination-2" href="/map/florida-panhandle" data-destination="gc" style="left: 36.45%; top: 52%;" <?= getSpeciesList('florida-panhandle'); ?>>
                                        <span></span><div>Florida Panhandle</div></a>

                                    <!--South Pacific-->

                                    <a class="i-link-destination i-link-destination-2" href="#" data-zoom="3|0|48|20|sp" style="left: 18.7%; top: 60%;">
                                        <div class="magnifier"><?= ffbh_Icon('ffbhsiteicons-38') ?></div><div><b>ZOOM</b><br />South Pacific</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/hawaii" data-destination="sp" style="left: 19%; top: 52%;" <?= getSpeciesList('hawaii'); ?>>
                                        <span></span><div>Hawaii</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/french-polynesia" data-destination="sp" style="left: 25.2%; top: 72%;" <?= getSpeciesList('french-polynesia'); ?>>
                                        <span></span><div>French Polynesia</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/cook" data-destination="sp" style="left: 16.3%; top: 69%;" <?= getSpeciesList('cook'); ?>>
                                        <span></span><div>Cook Islands</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/christmas" data-destination="sp" style="left: 18.9%; top: 62%;" <?= getSpeciesList('christmas'); ?>>
                                        <span></span><div>Kiribati (Christmas Island)</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/fiji" data-destination="sp" style="left: 14%; top: 73%;" <?= getSpeciesList('fiji'); ?>>
                                        <span></span><div>Fiji</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/marshall" data-destination="sp" style="left: 10.5%; top: 60%;" <?= getSpeciesList('marshall'); ?>>
                                        <span></span><div>Marshall Islands</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/soloman" data-destination="sp" style="left: 8%; top: 67.5%;" <?= getSpeciesList('soloman'); ?>>
                                        <span></span><div>Soloman Islands</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/vanuatu" data-destination="sp" style="left: 10.8%; top: 70.1%;" <?= getSpeciesList('vanuatu'); ?>>
                                        <span></span><div>Vanuatu</div></a>

                                    <!--East Coast-->

                                    <a class="i-link-destination i-link-destination-2" href="#" data-zoom="9|35|43|42|ec" style="left: 38.2%; top: 46%;">
                                        <div class="magnifier"><?= ffbh_Icon('ffbhsiteicons-38') ?></div><div><b>ZOOM</b><br />East Coast</div></a>

                                    <a class="i-link-destination i-link-destination-2" href="/map/carolinas" data-destination="ec" style="left: 37.99%; top: 50.23%;" <?= getSpeciesList('carolinas'); ?>>
                                        <span></span><div>Carolinas</div></a>

                                    <a class="i-link-destination i-link-destination-2" href="/map/maryland" data-destination="ec" style="left: 38.5%; top: 48.1%;" <?= getSpeciesList('maryland'); ?>>
                                        <span></span><div>Maryland</div></a>

                                    <a class="i-link-destination i-link-destination-2 i-link-left" href="/map/new-york" data-destination="ec" style="left: 38.32%; top: 46.7%;" <?= getSpeciesList('new-york'); ?>>
                                        <div>New York</div><span></span></a>

                                    <a class="i-link-destination i-link-destination-2" href="/map/maine" data-destination="ec" style="left: 40.4%; top: 45.1%;" <?= getSpeciesList('maine'); ?>>
                                        <span></span><div>Maine</div></a>

                                    <a class="i-link-destination i-link-destination-2" href="/map/massachusetts" data-destination="ec" style="left: 39.9%; top: 46.35%;" <?= getSpeciesList('massachusetts'); ?>>
                                        <span></span><div>Massachusetts</div></a>

                                    <a class="i-link-destination i-link-destination-2" href="/map/new-hampshire" data-destination="ec" style="left: 39.85%; top: 45.85%;" <?= getSpeciesList('new-hampshire'); ?>>
                                        <span></span><div>New Hampshire</div></a>

                                    <a class="i-link-destination i-link-destination-2" href="/map/new-jersey" data-destination="ec" style="left: 39.05%; top: 47.25%;" <?= getSpeciesList('new-jersey'); ?>>
                                        <span></span><div>New Jersey</div></a>

                                    <a class="i-link-destination i-link-destination-2" href="/map/connecticut" data-destination="ec" style="left: 39.4%; top: 46.69%;" <?= getSpeciesList('connecticut'); ?>>
                                        <span></span><div>Connecticut</div></a>

                                    <a class="i-link-destination i-link-destination-2" href="/map/delaware" data-destination="ec" style="left: 38.75%; top: 47.7%;" <?= getSpeciesList('deleware'); ?>>
                                        <span></span><div>Delaware</div></a>

                                    <a class="i-link-destination i-link-destination-2" href="/map/virginia" data-destination="ec" style="left: 38.55%; top: 48.6%;" <?= getSpeciesList('virginia'); ?>>
                                        <span></span><div>Virginia</div></a>

                                    <a class="i-link-destination i-link-destination-2" href="/map/georgia" data-destination="ec" style="left: 37.5%; top: 51%;" <?= getSpeciesList('georgia'); ?>>
                                        <span></span><div>Georgia</div></a>

                                    <!--Florida-->

                                    <a class="i-link-destination i-link-destination-2" href="#" data-zoom="9|33|50|40|fl" style="left: 36.5%; top: 50%;">
                                        <div class="magnifier"><?= ffbh_Icon('ffbhsiteicons-38') ?></div><div><b>ZOOM</b><br />Florida</div></a>

<!--                                    <a class="i-link-destination i-link-destination-2" href="/map/florida-usa" data-destination="fl" style="left: 37.45%; top: 52.5%;" <?= getSpeciesList('florida-usa'); ?>>
                                        <span></span><div>Florida</div></a>-->

                                    <a class="i-link-destination i-link-destination-2" href="/map/florida-panhandle" data-destination="fl" style="left: 36.45%; top: 52%;" <?= getSpeciesList('florida-panhandle'); ?>>
                                        <span></span><div>Florida Panhandle</div></a>

                                    <a class="i-link-destination i-link-destination-2" href="/map/florida-keys" data-destination="fl" style="left: 37.45%; top: 54.3%;" <?= getSpeciesList('florida-keys'); ?>>
                                        <span></span><div>Florida Keys</div></a>

                                    <a class="i-link-destination i-link-destination-2" href="/map/southwest-florida" data-destination="fl" style="left: 37.2%; top: 53.57%;" <?= getSpeciesList('southwest-florida'); ?>>
                                        <span></span><div>Southwest Florida</div></a>

                                    <a class="i-link-destination i-link-destination-2" href="/map/southeast-florida" data-destination="fl" style="left: 37.61%; top: 53.9%;" <?= getSpeciesList('southeast-florida'); ?>>
                                        <span></span><div>Southeast Florida</div></a>


                                    <!--South America-->

                                    <a class="i-link-destination i-link-destination-2" href="#" data-zoom="2|19|55|5|sam" style="left: 41%; top: 69.5%;">
                                        <div class="magnifier"><?= ffbh_Icon('ffbhsiteicons-38') ?></div><div><b>ZOOM</b><br />South America</div></a>

                                    <a class="i-link-destination i-link-destination-2 i-link-left" href="/map/columbia" data-destination="sam" style="left: 34.8%; top: 60.7%;" <?= getSpeciesList('columbia'); ?>>
                                        <div>Columbia</div><span></span></a>

                                    <a class="i-link-destination i-link-destination-2" href="/map/french-guiana" data-destination="sam" style="left: 44.1%; top: 62.3%;" <?= getSpeciesList('french-guiana'); ?>>
                                        <span></span><div>French Guiana</div></a>

                                    <a class="i-link-destination i-link-destination-2" href="/map/guyana" data-destination="sam" style="left: 42.3%; top: 61%;" <?= getSpeciesList('guyana'); ?>>
                                        <span></span><div>Guyana</div></a>

                                    <a class="i-link-destination i-link-destination-2 i-link-left" href="/map/suriname" data-destination="sam" style="left: 39.9%; top: 62.9%;" <?= getSpeciesList('suriname'); ?>>
                                        <div>Suriname</div><span></span></a>

                                    <a class="i-link-destination i-link-destination-4" href="/map/brazil" data-destination="sam" style="left: 47.3%; top: 66%;" <?= getSpeciesList('brazil'); ?>>
                                        <span></span><div>Brazil</div></a>

                                    <a class="i-link-destination i-link-destination-2" href="/map/chile" data-destination="sam" style="left: 39.4%; top: 76.7%;" <?= getSpeciesList('chile'); ?>>
                                        <span></span><div>Chile</div></a>

                                    <a class="i-link-destination i-link-destination-2" href="/map/ecuador" data-destination="sam" style="left: 37.3%; top: 64.7%;" <?= getSpeciesList('ecuador'); ?>>
                                        <span></span><div>Ecuador</div></a>

                                    <a class="i-link-destination i-link-destination-2" href="/map/peru" data-destination="sam" style="left: 38.2%; top: 69.7%;" <?= getSpeciesList('peru'); ?>>
                                        <span></span><div>Peru</div></a>

                                    <a class="i-link-destination i-link-destination-2" href="/map/venezuela" data-destination="sam" style="left: 40.8%; top: 59.2%;" <?= getSpeciesList('venezuela'); ?>>
                                        <span></span><div>Venezuela</div></a>

                                    <!--Carribean-->

                                    <a class="i-link-destination i-link-destination-2" href="#" data-zoom="10|35|51|37|cr" style="left: 39.2%; top: 54%;">
                                        <div class="magnifier"><?= ffbh_Icon('ffbhsiteicons-38') ?></div><div><b>ZOOM</b><br />Carribean</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/bahamas" data-destination="cr" style="left: 38.1%; top: 54.3%;" <?= getSpeciesList('bahamas'); ?>>
                                        <span></span><div>Bahamas</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/british-virgin-islands" data-destination="cr" style="left: 41.3%; top: 57.05%;" <?= getSpeciesList('british-virgin-islands'); ?>>
                                        <span></span><div>British Virgin Islands</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/cuba" data-destination="cr" style="left: 38%; top: 55.4%;" <?= getSpeciesList('cuba'); ?>>
                                        <span></span><div>Cuba</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/dominican" data-destination="cr" style="left: 40.1%; top: 56.7%;" <?= getSpeciesList('dominican'); ?>>
                                        <span></span><div>Dominican</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2 i-link-left" href="/map/puerto-rico" data-destination="cr" style="left: 40.02%; top: 57.2%;" <?= getSpeciesList('puerto-rico'); ?>>
                                        <div>Puerto Rico</div><span></span></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/turks" data-destination="cr" style="left: 39.6%; top: 55.6%;" <?= getSpeciesList('turks'); ?>>
                                        <span></span><div>Turks</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2 i-link-left" href="/map/west-indies" data-destination="cr" style="left: 40.83%; top: 58.42%;" <?= getSpeciesList('west-indies'); ?>>
                                        <div>West Indies</div><span></span></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/cayman-islands" data-destination="cr" style="left: 37.6%; top: 56.62%;" <?= getSpeciesList('cayman-islands'); ?>>
                                        <span></span><div>Cayman Islands</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/jamaica" data-destination="cr" style="left: 38.3%; top: 57.23%;" <?= getSpeciesList('jamaica'); ?>>
                                        <span></span><div>Jamaica</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/us-virgin-islands" data-destination="cr" style="left: 41.25%; top: 57.45%;" <?= getSpeciesList('us-virgin-islands'); ?>>
                                        <span></span><div>U.S. Virgin Islands</div></a>

                                    <!--Central America-->

                                    <a class="i-link-destination i-link-destination-2" href="#" data-zoom="8|28.5|52|35|ca" style="left: 35.4%; top: 58%;">
                                        <div class="magnifier"><?= ffbh_Icon('ffbhsiteicons-38') ?></div><div><b>ZOOM</b><br />Central America</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/belize" data-destination="ca" style="left: 35.7%; top: 57.5%;" <?= getSpeciesList('belize'); ?>>
                                        <span></span><div>Belize</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/costa-rica" data-destination="ca" style="left: 36.9%; top: 60.6%;" <?= getSpeciesList('costa-rica'); ?>>
                                        <span></span><div>Costa Rica</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-4" href="/map/mexico" data-destination="ca" style="left: 33.4%; top: 55.5%;" <?= getSpeciesList('mexico'); ?>>
                                        <span></span><div>Mexico</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/panama" data-destination="ca" style="left: 37.75%; top: 61.1%;" <?= getSpeciesList('panama'); ?>>
                                        <span></span><div>Panama</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/guatamala" data-destination="ca" style="left: 35%; top: 59%;" <?= getSpeciesList('guatamala'); ?>>
                                        <span></span><div>Guatamala</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/honduras" data-destination="ca" style="left: 36.5%; top: 58.2%;" <?= getSpeciesList('honduras'); ?>>
                                        <span></span><div>Honduras</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/nicaragua" data-destination="ca" style="left: 36.8%; top: 59.9%;" <?= getSpeciesList('nicaragua'); ?>>
                                        <span></span><div>Nicaragua</div></a>

                                    <!--Africa-->

                                    <a class="i-link-destination i-link-destination-2" href="#" data-zoom="5|47|45|30|af" style="left: 51.8%; top: 55%;">
                                        <div class="magnifier"><?= ffbh_Icon('ffbhsiteicons-38') ?></div><div><b>ZOOM</b><br />West Africa</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-3" href="/map/algeria" data-destination="af" style="left: 56.7%; top: 48.5%;" <?= getSpeciesList('algeria'); ?>>
                                        <span></span><div>Algeria</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/gambia" data-destination="af" style="left: 52.4%; top: 59%;" <?= getSpeciesList('gambia'); ?>>
                                        <span></span><div>Gambia</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/guinea" data-destination="af" style="left: 53.1%; top: 60.5%;" <?= getSpeciesList('guinea'); ?>>
                                        <span></span><div>Guinea</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/guinea-bissau" data-destination="af" style="left: 52.7%; top: 59.75%;" <?= getSpeciesList('guinea-bissau'); ?>>
                                        <span></span><div>Guinea-Bissau</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/mauritania" data-destination="af" style="left: 52.6%; top: 56.75%;" <?= getSpeciesList('mauritania'); ?>>
                                        <span></span><div>Mauritania</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/morocco" data-destination="af" style="left: 54.1%; top: 50.75%;" <?= getSpeciesList('morocco'); ?>>
                                        <span></span><div>Morocco</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/senegal" data-destination="af" style="left: 52.4%; top: 58.1%;" <?= getSpeciesList('senegal'); ?>>
                                        <span></span><div>Senegal</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/western-sahara" data-destination="af" style="left: 52.8%; top: 54%;" <?= getSpeciesList('western-sahara'); ?>>
                                        <span></span><div>Western Sahara</div></a>

                                    <!--Europe-->

                                    <a class="i-link-destination i-link-destination-2 i-link-left" href="#" data-zoom="5|49|35|45|eur" style="left: 51.2%; top: 43.5%;">
                                        <div><b>ZOOM</b><br />Europe</div><div class="magnifier"><?= ffbh_Icon('ffbhsiteicons-38') ?></div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/portugal" data-destination="eur" style="left: 54.2%; top: 47%;" <?= getSpeciesList('portugal'); ?>>
                                        <span></span><div>Portugal</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/spain" data-destination="eur" style="left: 55.1%; top: 45.3%;" <?= getSpeciesList('spain'); ?>>
                                        <span></span><div>Spain & the Canary Islands</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/france" data-destination="eur" style="left: 55.8%; top: 42.4%;" <?= getSpeciesList('france'); ?>>
                                        <span></span><div>France</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/italy" data-destination="eur" style="left: 60.4%; top: 47.2%;" <?= getSpeciesList('italy'); ?>>
                                        <span></span><div>Italy</div></a>

                                    <!--Indian Ocean-->

                                    <a class="i-link-destination i-link-destination-2" href="#" data-zoom="7|61|65|5|io" style="left: 65.2%; top: 71%;">
                                        <div class="magnifier"><?= ffbh_Icon('ffbhsiteicons-38') ?></div><div><b>ZOOM</b><br />Indian Ocean</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2 i-link-left" href="/map/comoros" data-destination="io" style="left: 65.58%; top: 69.7%;" <?= getSpeciesList('comoros'); ?>>
                                       <div>Comoros</div> <span></span></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/glorioso" data-destination="io" style="left: 67.48%; top: 69.65%;" <?= getSpeciesList('glorioso'); ?>>
                                        <span></span><div>Glorioso</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/mayotte" data-destination="io" style="left: 66.95%; top: 70.2%;" <?= getSpeciesList('mayotte'); ?>>
                                        <span></span><div>Mayotte</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2 i-link-left" href="/map/reunion-mauritius" data-destination="io" style="left: 67.85%; top: 73.5%;" <?= getSpeciesList('reunion-mauritius'); ?>>
                                        <div>Reunion/Mauritius</div><span></span></a>
                                    
                                    <a class="i-link-destination i-link-destination-2 i-link-left" href="/map/seychelles" data-destination="io" style="left: 68.31%; top: 66.69%;" <?= getSpeciesList('seychelles'); ?>>
                                        <div>Seychelles</div><span></span></a>

                                    <!--South Africa-->

                                    <a class="i-link-destination i-link-destination-2" href="#" data-zoom="7|57|65|17|saf" style="left: 60.8%; top: 78%;">
                                        <div class="magnifier"><?= ffbh_Icon('ffbhsiteicons-38') ?></div><div><b>ZOOM</b><br />South Africa</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/tanzania" data-destination="saf" style="left: 65.65%; top: 68%;" <?= getSpeciesList('tanzania'); ?>>
                                        <span></span><div>Tanzania</div></a>
										
                                    <a class="i-link-destination i-link-destination-2" href="/map/mozambique" data-destination="saf" style="left: 64.65%; top: 73.2%;" <?= getSpeciesList('mozambique'); ?>>
                                        <span></span><div>Mozambique</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/swaziland" data-destination="saf" style="left: 63.75%; top: 76.15%;" <?= getSpeciesList('swaziland'); ?>>
                                        <span></span><div>Swaziland</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/south-africa" data-destination="saf" style="left: 63.95%; top: 77%;" <?= getSpeciesList('south-africa'); ?>>
                                        <span></span><div>South Africa</div></a>

                                    
                                    <!--Pacific Rim-->

                                    <a class="i-link-destination i-link-destination-2" href="#" data-zoom="3|66|43|25|pr" style="left: 84.7%; top: 58%;">
                                       <div class="magnifier"><?= ffbh_Icon('ffbhsiteicons-38') ?></div><div><b>ZOOM</b><br />Pacific Rim</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-3" href="/map/japan" data-destination="pr" style="left: 88.9%; top: 48%;" <?= getSpeciesList('japan'); ?>>
                                        <span></span><div>Japan</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/burma" data-destination="pr" style="left: 78.9%; top: 57.2%;" <?= getSpeciesList('burma'); ?>>
                                        <span></span><div>Burma (Myanmar)</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-3" href="/map/indonesia" data-destination="pr" style="left: 81.1%; top: 66%;" <?= getSpeciesList('indonesia'); ?>>
                                        <span></span><div>Indonesia</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/malaysia" data-destination="pr" style="left: 80.3%; top: 62.3%;" <?= getSpeciesList('malaysia'); ?>>
                                        <span></span><div>Malaysia</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/papua-new-guinea" data-destination="pr" style="left: 90.8%; top: 67.3%;" <?= getSpeciesList('papua-new-guinea'); ?>>
                                        <span></span><div>Papua New Guinea</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/singapore" data-destination="pr" style="left: 80.45%; top: 63.7%;" <?= getSpeciesList('singapore'); ?>>
                                        <span></span><div>Singapore</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/thailand" data-destination="pr" style="left: 79.5%; top: 60.1%;" <?= getSpeciesList('thailand'); ?>>
                                        <span></span><div>Thailand</div></a>

                                    <!--Australia / New Zealand-->

                                    <a class="i-link-destination i-link-destination-2" href="#" data-zoom="5|79|66|10|anz" style="left: 87.7%; top: 77%;">
                                        <div class="magnifier"><?= ffbh_Icon('ffbhsiteicons-38') ?></div><div><b>ZOOM</b><br />Australia<br />New Zealand</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/new-south-wales" data-destination="anz" style="left: 91.9%; top: 79%;" <?= getSpeciesList('new-south-wales'); ?>>
                                        <span></span><div>New South Wales</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2 i-link-left" href="/map/new-zealand" data-destination="anz" style="left: 95.2%; top: 82.2%;" <?= getSpeciesList('new-zealand'); ?>>
                                        <div>New Zealand</div><span></span></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/northern-territory" data-destination="anz" style="left: 87.7%; top: 69.5%;" <?= getSpeciesList('northern-territory'); ?>>
                                        <span></span><div>Northern Territory</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/queensland" data-destination="anz" style="left: 90.7%; top: 72.5%;" <?= getSpeciesList('queensland'); ?>>
                                        <span></span><div>Queensland</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/tasmania" data-destination="anz" style="left: 91.1%; top: 83.1%;" <?= getSpeciesList('tasmania'); ?>>
                                        <span></span><div>Tasmania</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/victoria" data-destination="anz" style="left: 90.2%; top: 81.5%;" <?= getSpeciesList('victoria'); ?>>
                                        <span></span><div>Victoria</div></a>
                                    
                                    <a class="i-link-destination i-link-destination-2" href="/map/western-austrailia" data-destination="anz" style="left: 82.9%; top: 75.5%;" <?= getSpeciesList('western-austrailia'); ?>>
                                        <span></span><div>Western Australia</div></a>

                                </div>
                                <img id="watermark" src="<?= ffbh_Image('FFBH_map_watermark.png') ?>" />
                                
                                <!--Zoom Out-->

                                <a id="zoomout" class="i-link-destination i-link-destination-2 conceal js-zoomout" href="#">
                                    <span class="has-cross"><span class="minus"></span></span><div>Zoom Out</div></a>

                                <div id="map-menu">
                                    <ul id="custom-search-wrapper">
                                        <li>
                                            <a href="#">
                                                species <?= ffbh_FontAwesome("angle-down"); ?>
                                            </a>
                                            <ul style="display: block;">
                                                <?php
                                                    $species_args = array(
                                                        'post_type' => 'species',
                                                        'post_status' => 'publish',
                                                        'posts_per_page' => -1,
                                                        'caller_get_posts'=> 1);
                                                    $species_Query = new WP_Query($species_args);
                                
                                                    while ($species_Query->have_posts())
                                                    {
                                                        $species_Query -> the_post();
                                        
                                                        ?>
                                                            <li>
                                                                <a href="#" data-species="<?= get_the_title() ?>"><span><?= ffbh_FontAwesome("circle-o"); ?></span><?= get_the_title() ?></a>
                                                            </li>
                                                        <?php
                                                    }
                                                ?>
                                            </ul>
                                        </li>
                                    </ul>
                                    <div class="m-top-25">
                                        <a href="#" id="location-list-btn" class="i-link i-link-yellow"><?= ffbh_Icon('icomoon57732-22') ?><span class="fix-middle">all locations</span></a>
                                    </div>
                                    <h4 class="text-uppercase m-top-25">How to use the map:</h4>
                                    <p>
                                    <?php if (have_posts()) : while (have_posts()) : the_post();?>
                                    <?php the_content(); ?>
                                    <?php endwhile; endif; ?>
                                    </p>
                                </div>
                                <div id="location-list">
                                    <div>
                                        <h3 class="text-yellow text-uppercase">Locations</h3>

                                        <div class="search-form m-top-25">
                                            <a><?= ffbh_FontAwesome("search") ?></a>
                                            <input id="location-list-filter" value="" />
                                        </div>

                                        <div id="location-list-items" class="m-top-25">
                                            <?php
                                                $count = 0;
                                                while ($my_query->have_posts())
                                                {
                                                    $my_query -> the_post();
                                                    
                                                    ?>
                                                        <div class="m-top-5" data-location_list_title="<?= strtolower(get_the_title()); ?>">
                                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                        </div>
                                                    <?php
                                                    
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <a href="#" id="location-list-close"><?= ffbh_Icon("cancel-circle") ?></a>
                                </div>
                            </div>

                        </div>

                    </div>

		        </section>
		        <!-- /section -->
	        </main>

            <script type="text/javascript">
                var _imageSource = '<?= ffbh_Image("worldmap_zoom.jpg") ?>';
                var _imageZoomSource = '<?= ffbh_Image("worldmap_zoom.jpg") ?>';
            </script>

            <?php
                wp_enqueue_script('imagemapster');
                wp_enqueue_script('template-map');
                wp_enqueue_script('customsearch');
            ?>
        <?php       
    }
    else
    {
        ?>
	        <main role="main">
		        <!-- section -->
		        <section>

                    <div class="row">
                        <div id="map-wrapper-header-mobile" class="col-lg-12">
                            <h1 style="margin-bottom: 0;">Destination Map</h1>

                            <p class="main-text m-top-15">To use the full functionality of the map, please visit the site on a computer or tablet. If you would like to see the full map version on your mobile device, <a href="/map?displayMode=desktop">click here</a>.</p>
                        </div> 
                    </div>
                    <div class="row m-top-25">
                        <div id="map-wrapper-content-mobile" class="col-lg-12">
                            <h3 class="text-uppercase">Locations</h3>

                            <ul>
                            <?php
                                $args = array(
                                    'post_type' => 'destination',
                                    'post_status' => 'publish',
                                    'posts_per_page' => -1,
                                    'caller_get_posts'=> 1);
                                $my_query = new WP_Query($args);
                                
                                $count = 0;
                                while ($my_query->have_posts())
                                {
                                    $my_query -> the_post();
                                    $meta = get_post_meta($my_query -> post -> ID);
                            ?>
                                    <li>
                                        <a href="<?php the_permalink(); ?>">
                                            <table>
                                                <tr>
                                                    <?php
                                                        if($meta["mobile_image"])
                                                        {
                                                            $imageUrl = wp_get_attachment_image_src( reset($meta["mobile_image"]), 'medium' );
                                                    ?>      <td>
                                                                <img src="<?= reset($imageUrl); ?>" />
                                                            </td>
                                                    <?php
                                                        }
                                                    ?>
                                                    <td>
                                                        <h4 class="bolden"><?php the_title(); ?></h4>
                                                    </td>
                                                </tr>
                                            </table>
                                        </a>
                                    </li>
                            <?php
                                    
                                    $count++;
                                    
                                    if($count > 10)
                                    {
                                        //break;
                                    }
                                }
                                wp_reset_query(); 
                            ?>
                            </ul>
                        </div>
                    </div>
		        </section>
		        <!-- /section -->
	        </main>
        <?php
    }
    
    get_footer(); ?>
