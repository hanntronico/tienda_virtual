        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
         <script>window.jQuery || document.write('<script src="../../js/jquery-1.8.2.min.js">\x3C/script>')</script> 
        <script src="../../js/jquery.noconflict.js" type="text/javascript"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.1/modernizr.min.js" type="text/javascript"></script> 

<!-- CSS -->
<style type="text/css">

</style>

<!-- Javascript -->
<script type="text/javascript">
jQuery(document).ready(function (){
    jQuery("#version").change(function(){
        var s = "hann [aaa]"; 
        var versionSelected = jQuery(this).val();                
        
        jQuery("#cdn").html(htmlEncode(s.replace("[aaa]", versionSelected)));
    });
});

function htmlEncode(value) {
    return $('<div/>').text(value).html();
}
</script>

<!-- HTML -->



<br>Select jQuery version you want
<select id="version">
    <option>1.8.3</option>
    <option>1.8.1</option>
    <option>1.7.2</option>
    <option>1.7.1</option>
    <option>1.7.0</option>
    <option>1.6.4</option>
    <option>1.6.3</option>
    <option>1.6.2</option>
    <option>1.6.1</option>
    <option>1.6.0</option>
</select>

<div id="cdn"></div>