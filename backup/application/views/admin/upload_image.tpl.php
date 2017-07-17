<input id="<?= $field ?>_btn_<?= $id ?>" type="button" class="btn" value="Выбрать" />
<input type="hidden" id="<?= $field ?>_img_<?= $id ?>_hidden" name="<?= $field ?>" value="<?= $value ?>" />
<div class="upload-image-preview">
    <span class="place_image"><img id="<?= $field ?>_img_<?= $id ?>" src="/views/content/<?= ($value != NULL ? $value : 'no_preview.png') ?>" /></span>
    <span class="place_load_image"><img src="/views/admin/i/loading.gif" /></span>
</div>
<script> 
    var param = {};
    param['id'] = '<?= $id ?>';
    param['field'] = '<?= $field ?>';
    $.ajax_upload('#<?= $field ?>_btn_<?= $id ?>', 
    {
        action: '/admin/<?= $table ?>/upload_image/',
        name: 'imgfile',
        data: param,
        onSubmit: function(file, ext) {
            if (!((ext.toLowerCase() == 'png') || (ext.toLowerCase() == 'gif') || (ext.toLowerCase() == 'jpeg') || (ext.toLowerCase() == 'jpg'))) {
                alert('Вы можете загружать только изображения');
                return false;
            }
            $('.place_image').hide();
            $('.place_load_image').show();
        },
        onComplete: function(file, resp) {
            if (resp.length > 1) {
                $('#<?= $field ?>_img_<?= $id ?>').attr('src','/views/content/'+resp);
                $('#<?= $field ?>_img_<?= $id ?>_hidden').val(resp);
            }
            $('.place_load_image').hide();
            $('.place_image').show();
        }
    });
</script>