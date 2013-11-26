      <!-- // <script type="text/javascript" src="../../js/bootstrap.min.js"></script><!-- Bootstrap Framework --> -->
      <script type="text/javascript" src="../../js/plugins.js"></script><!-- jQuery Plugins -->
      <script type="text/javascript" src="../../addons/superfish_responsive/superfish_menu.js"></script>
      <!-- Superfish Menu -->
      <!-- <script type="text/javascript" src="../../js/kalypso_script.js"></script> --><!-- custom scripts file -->
      <!-- prettyphoto scripts & styles -->
      <link rel="stylesheet" href="../../addons/prettyphoto/prettyPhoto.css" type="text/css" />
      <script type="text/javascript" src="../../addons/prettyphoto/jquery.prettyPhoto.js"></script>
      <script type="text/javascript">
        function ppOpen(panel, width){
          jQuery.prettyPhoto.close();
          setTimeout(function() {
            jQuery.fn.prettyPhoto({social_tools: false, deeplinking: false, show_title: false, default_width: width, theme:'pp_kalypso'});
            jQuery.prettyPhoto.open(panel);
          }, 300);
        } // function to open different panel within the panel
        
        jQuery(document).ready(function($) {
          jQuery("a[data-rel^='prettyPhoto'], .prettyphoto_link").prettyPhoto({theme:'pp_kalypso',social_tools:false, deeplinking:false});
          jQuery("a[rel^='prettyPhoto']").prettyPhoto({theme:'pp_kalypso'});
          jQuery("a[data-rel^='prettyPhoto[login_panel]']").prettyPhoto({theme:'pp_kalypso', default_width:800, social_tools:false, deeplinking:false});
          
          jQuery(".prettyPhoto_transparent").click(function(e){
            e.preventDefault();
            jQuery.fn.prettyPhoto({social_tools: false, deeplinking: false, show_title: false, default_width: 980, theme:'pp_kalypso transparent', opacity: 0.95});
            jQuery.prettyPhoto.open($(this).attr('href'),'','');
          });

          jQuery("#calendario").hide();

         });

      </script>

    

        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>-->

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <!-- <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
         </script> -->