<?if ($admin_flag && ! $error_output){?>

<table width="930px" style="margin-top:10px;margin-bottom:-22px;" class="marg30">
    <tr>
        <td width="160px">
            <input id="edit_button" type="submit" value="Change" onclick="open_textarea()" />
            <input id="save_button" type="submit" value="Save" onclick="update_text()" />
        </td>
        <td width="80px" style="font-size:14px;">
            <input id="public_flag" type="checkbox" onchange="update_public_flag()" <? if(!$page_public) {echo("checked");}?>/>
            Private
        </td>
        <td width="90px">
            <select id="template" onchange="update_template()">
            <?
            $list_tmpl = $pdo->prepare("SELECT `templates`.`id`,`templates`.`name` FROM `templates`;");
            $list_tmpl->execute();

            while ( $root_item = $list_tmpl->FETCH(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT) ) {
                if ($root_item['id'] == $page_template) {
                    echo("<option value=\"".$root_item['id']."\" selected>".$root_item['name']."</option>");
                } else {
                    echo("<option value=\"".$root_item['id']."\">".$root_item['name']."</option>");
                }
            }
            ?>
            </select>
        </td>
        <td width="160px" style="font-size:14px;">
        <input value="<? echo($page_link);?>" type="text" id="page_link_field" onchange="update_link()"/>
        </td>
        <td width="120px">
            <input id="delete_button" type="submit" value="Delete" onclick="delete_page()" />
        </td>
        <td width="350px">
            <div id="editor_status" style="font-size:14px;"></div>
        </td>
    </tr>
</table>
<?}?>
<article>
<section class="text-content" id="fullpage">
    <h1 id="page_title"><?=$page_title?></h1>
    <div id="main_cont"><?=$page_content?></div>
</section>
</article>

<?if ($admin_flag && ! $error_output){?>

<script>
window.addEvent('domready', function() {

// Раскоментируйте, чтобы включить MooEditable
// document.getElementById('textarea1').mooEditable({
// 	actions: 'bold italic underline strikethrough | formatBlock justifyleft justifycenter justifyright justifyfull | insertunorderedlist insertorderedlist indent outdent | undo redo removeformat | createlink unlink | urlimage | toggleview'
// });

document.getElementById("editor_area").setAttribute("style", "display:none;");
document.getElementById("save_button").setAttribute('disabled', '');

$('#page_title').dblclick(function() {
    if( $(this).attr('contenteditable') !== undefined ) {
        $(this).removeAttr('contenteditable');
        update_name();
    } else {
        $(this).attr('contenteditable', '');
    };
});

// если нажать enter все равно запишется <br>
$('#page_title').keydown(function(e) {
    if (e.keyCode === 13 || e.keyCode === 27) {
        if( $(this).attr('contenteditable') !== undefined ) {
            $(this).removeAttr('contenteditable');
            update_name();
        } else {
            // $(this).attr('contenteditable', '');
        };
    }
});

elasticArea();

});
</script>

<div id="editor_area">
    <textarea id="textarea1" class="marg30 js-elasticArea"><?=$page_content;?></textarea>
</div>

<?}?>