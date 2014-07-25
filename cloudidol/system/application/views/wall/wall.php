<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<script type='text/javascript'>
    $(function(){
        load('wall','#status_list');
        $('textarea').elastic();
        $('#status_textarea').val(def_value);
        $('#status_textarea').css("color","#777777");
        $('#status_textarea').css("height","17px");
        $('#status_textarea').focus(function(){
            if($('#status_textarea').val() == def_value)
            {
                $('#status_textarea').val("");
            }
            $('#status_textarea').css("color","#000");
        });
        $('#status_textarea').blur(function() {
            if ($('#status_textarea').val() == '')
            {
                $('#status_textarea').val(def_value);
                $('#status_textarea').css("height","17px");
                $('#status_textarea').css("color","#777777");
            }
        });
    });
</script>
<?php //if(is_logged_in()):?>
<div id='form_status'>
    <form name='my_status_form'>
        <div class='tarea'><textarea spellcheck=false id='status_textarea' name='status' ></textarea></div>
        <div class='barea'><a href='javascript:void(0)' onclick='post_to_wall()' class='button buttonblue mediumbtn'>Bagikan</a></div>
    </form>
</div>
<?php //endif;?>

<!-- displaying status -->
<div id='status_list'></div>
<input type='hidden' id='num_showed_post' value='<?php echo $this->config->item('number_post_visible');?>' />
<div id='status_more_link'><a class='link1 blue98' href='javascript:void(0)' onclick='show_old_post()' >Kiriman Terdahulu</a> 
<span class='special2 arrowdown'>&nbsp;</span> <span class='loading_more'></span></div>