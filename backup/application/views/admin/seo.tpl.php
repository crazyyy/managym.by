<? $meta = $this->database->get_metatags($table, $id); ?>
<table>
    <tr>
        <td>Metatag Title</td>
        <td>
            <input type="text" name="seo[title]" value="<?= $meta['title'] ?>" class="input-xxlarge" />
        </td>
    </tr>
    <tr>
        <td>Metatag Description</td>
        <td>
            <textarea name="seo[description]" style="width: 530px;"><?= $meta['description'] ?></textarea>
        </td>
    </tr>
    <tr>
        <td>Metatag Keywords</td>
        <td>
            <input type="text" name="seo[keywords]" value="<?= $meta['keywords'] ?>" class="input-xxlarge" />
        </td>
    </tr>
</table>
