$(document).ready(function(){
    load('wall/base','#center');
    load_no_loading('wall/newest/','#newest_status');
    $('.search_box').css("color","#777777");
    $('.search_box').focus(function(){
        if($('.search_box').val() == def_search)
        {
            $('.search_box').val("");
        }
        $('.search_box').css("color","#000000");
    });
    $('.search_box').blur(function() {
        if ($('.search_box').val() == '')
        {
            $('.search_box').val(def_search);
            $('.search_box').css("color","#777777");
        }
    });
    routines();
});

function routines()
{
    // profile
    load_no_loading("app/profile",".myprofile");
    // agenda hari ini
    load_no_loading("agenda/agendahariini",".agendahariini");
    // video
    load_no_loading("app/videos",".videolist");
    // pict
    load_no_loading("app/pictures",".picturelist");
    // links
    load_no_loading("app/links",".linklist");
}

function show_old_post()
{
    var showed = $('#num_showed_post').val();
    $('#num_showed_post').val(parseFloat(visible_post)+parseFloat(showed));
    load_small("wall/index/"+showed,"#status_list",".loading_more","append");
}
function show_old_post2(str)
{
    var showed = $('#num_showed_post').val();
    $('#num_showed_post').val(parseFloat(visible_post)+parseFloat(showed));
    load_small("wall/index/"+str+"/"+showed,"#status_list",".loading_more","append");
}
function add_number_visible()
{
    var showed = $('#num_showed_post').val();
    $('#num_showed_post').val(parseFloat('1')+parseFloat(showed));
}
function min_number_visible()
{
    var showed = $('#num_showed_post').val();
    $('#num_showed_post').val(parseFloat(showed)-parseFloat('1'));
}
function post_to_wall()
{
    var message = $('#status_textarea').val();
    $('#status_textarea').css("background-color","#f8f8f8");
    $('#status_textarea').attr('disabled','disabled');
    $('.barea .button').attr('disabled','disabled');
    $('.barea .button').addClass('disabled');
    if(message=='' || message==def_value) return false;
    $.ajax({
        type: "POST",
        url: site+"/wall/do_post/",
        data:"message="+ message,
        success: function(response){
            $("#status_list").prepend(response);
            $(".li").fadeIn();
            $('#status_textarea').val(def_value);
            $('#status_textarea').css("height","17px");
            $('#status_textarea').css("color","#777777");
            $('#status_textarea').attr('disabled','');
            $('.barea .button').attr('disabled','');
            $('.barea .button').removeClass('disabled');
            $('#status_textarea').css("background-color","#FFFFFF");
            $('.hidden_content').hide();
            add_number_visible();
            load_no_loading('wall/newest/','#newest_status');
            routines();
        }
    });
    return false;
}
function confirm_boolean(yes,no,title,contents)
{
    var data = "yes="+yes+"&no="+no+"&title="+title+"&content="+contents;
    load_into_box("app/confirm_boolean",data);
}
function delete_post(id)
{
    load_no_loading("app/restrict_ajax","#dummy");
    confirm_boolean("dummyload('wall/delete_post/"+id+"');$('.status_"+id+"').fadeOut();$('.status_"+id+"').remove();load_no_loading('wall/newest/','#newest_status');jQuery.facebox.close();min_number_visible();","jQuery.facebox.close()","Konfirmasi Penghapusan","Apakah Anda yakin menghapus?");
}
function delete_comment(id)
{
    load_no_loading("app/restrict_ajax","#dummy");
    confirm_boolean("dummyload('wall/delete_comment/"+id+"');$('.comment_id_"+id+"').fadeOut();jQuery.facebox.close()","jQuery.facebox.close()","Konfirmasi Penghapusan","Apakah Anda yakin menghapus?");
}
function launch_info(contents)
{
    var data = "content="+contents;
    load_into_box("app/information",data);
}
function switch_tab(obj)
{
    $(".tabs > a:not(.dummy_tab)").attr("class", "tab");
    $(obj).attr("class", "current_tab");
    $('#search_option').slideUp();
    $('.dummy_tab').hide();
}
function switch_search(obj)
{
    $("#search_option ul > li").removeClass("search_focus");
    $(obj).addClass("search_focus");
}
function search()
{
    send_form(document.form_search,"search/wall/","#center");
    $('#search_option').slideDown();
    $('.dummy_tab').show();
    $(".tabs > a:not(.dummy_tab)").attr("class", "tab");
    $('.dummy_tab').addClass("current_tab");
    $('.dummy_tab').removeClass("tab");
    $("#search_option ul > li").removeClass("search_focus");
    $('.s_wall').addClass("search_focus");
}


/* COMMON FUNCTIONS */
function load(page,div){
    var image_load = "<div class='ajax_loading'><img src='"+loading_image_large+"' /></div>";
    $.ajax({
        url: site+"/"+page,
        beforeSend: function(){
            $(div).html(image_load);
        },
        success: function(response){
            $(div).html(response);
        },
        dataType:"html"  		
    });
    return false;
}
function load_no_loading(page,div){
    $.ajax({
        url: site+"/"+page,
        success: function(response){
            $(div).html(response);
        },
        dataType:"html"  		
    });
    return false;
}
function load_small(page,div,loadingDom,opt){
    var image_load_small = "<span class='ajax_loading_small'><img src='"+loading_image_small+"' /></span>";
    $.ajax({
        url: site+"/"+page,
        beforeSend: function(){
            $(loadingDom).html(image_load_small);
        },
        success: function(response){
            $(loadingDom).html('');
            if(opt=="append")
            {
                $(div).append(response);
            }
            else
            {
                $(div).html(response);
            }
        },
        dataType:"html"  		
    });
    return false;
}
function dummyload(page){
    $.ajax({
        url: site+"/"+page,
        dataType:"html"  		
    });
    return false;
}
function load_into_box(page,dt){
    $.ajax({
        url: site+"/"+page,
        data: dt,
        success: function(response){			
            jQuery.facebox(response);
        },
        type:"post",
        dataType:"html"  		
    });
    return false;
}
function send_form(formObj,action,responseDIV)
{
    $.ajax({
        url: site+"/"+action, 
        data: $(formObj.elements).serialize(), 
        success: function(response){
                if(!response)
                {
                    load_into_box("app/error_confirmation");
                }
                else
                {
                    $(responseDIV).html(response);
                    routines();
                }
            },
        type: "post", 
        dataType: "html"
    }); 
    return false;
}