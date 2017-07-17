<h4>Редактирование записи № <?= $r['id'] ?></h4>
<form method="post">
    <input type="hidden" name="action" value="edit" />
    <table>
        <? foreach ($fields as $f): ?>
            <tr style="vertical-align: top;">
                <td><?= $fields_rus[$f->name] ?></td>
                <td>
                    <? if (isset($new_type[$f->name]) && $new_type[$f->name]['type'] == 'date'): ?>
                        <input type="text" name="<?= $f->name ?>" class="input-small" value="<?= date('d.m.Y', $r[$f->name]) ?>" />
                    <? elseif (isset($new_type[$f->name]) && $new_type[$f->name]['type'] == 'select'): ?>
                        <?= form_dropdown($f->name, $lists[$new_type[$f->name]['lists']], $r[$f->name]) ?>
                    <? elseif (isset($new_type[$f->name]) && $new_type[$f->name]['type'] == 'image'): ?>
                        <?= $this->load->view('/admin/upload_image.tpl.php', array('id' => $r['id'], 'table' => $table, 'field' => $f->name, 'value' => ($r[$f->name] != NULL ? $r[$f->name] : NULL))) ?>
                    <? elseif ($f->type == 'int'): ?>
                        <input type="text" name="<?= $f->name ?>" class="input-small" value="<?= $r[$f->name] ?>" />
                    <? elseif ($f->type == 'string'): ?>
                        <input type="text" name="<?= $f->name ?>" value="<?= $r[$f->name] ?>" />
                    <? elseif ($f->type == 'blob'): ?>
                        <textarea name="<?= $f->name ?>" <?= (in_array($f->name, $ckeditor) ? 'id="' . $f->name . $r['id'] . '_edit" class="ckeditor_edit" style="width: 500px; height: 250px;"' : '') ?>><?= $r[$f->name] ?></textarea>                    
                    <? endif; ?>
                </td>
            </tr>
        <? endforeach; ?>
    </table>
    <?= $this->load->view('/admin/seo.tpl.php', array('id' => $r['id'], 'table' => $table)) ?>
    <input type="submit" class="btn" value="Сохранить" />
</form>

<script type="text/javascript">
    $('input[name=id]').focus();
//    $('.ckeditor_edit').each(function(){
//        CKEDITOR.replace($(this).attr('id'));
//    });

    tinymce.init({
        selector: ".ckeditor_edit",
        plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste moxiecut"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        autosave_ask_before_unload: false,
        relative_urls: false,
        remove_script_host: true
    });
</script>