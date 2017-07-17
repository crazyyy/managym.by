<div class="search-item">
    <h4>Фильтр</h4>    
    <form method="post">
        <input type="hidden" name="action" value="search" />
        <table class="table">
            <tr>
                <? foreach ($fields as $f): ?>
                    <th><?= $fields_rus[$f->name] ?></th>
                <? endforeach; ?>
                <th></th>
            </tr>
            <tr>
                <? foreach ($fields as $f): ?>
                    <td>
                        <? if (isset($new_type[$f->name]) && $new_type[$f->name]['type'] == 'select'): ?>
                            <?= form_dropdown($f->name, array('-1' => '') + $lists[$new_type[$f->name]['lists']], (isset($search[$f->name]) ? $search[$f->name] : -1)) ?>
                        <? elseif (isset($new_type[$f->name]) && $new_type[$f->name]['type'] == 'date'): ?>
                            с <input type="text" name="<?= $f->name ?>_from" class="input-small" value="<?= (isset($search[$f->name . '_from']) ? $search[$f->name . '_from'] : '') ?>" /> 
                            по <input type="text" name="<?= $f->name ?>_to" class="input-small" value="<?= (isset($search[$f->name . '_to']) ? $search[$f->name . '_to'] : '') ?>" />
                        <? elseif ($f->type == 'int'): ?>
                            <input type="text" name="<?= $f->name ?>" class="input-small" value="<?= (isset($search[$f->name]) ? $search[$f->name] : '') ?>" />
                        <? elseif ($f->type == 'string'): ?>
                            <input type="text" name="<?= $f->name ?>" value="<?= (isset($search[$f->name]) ? $search[$f->name] : '') ?>" />
                        <? elseif ($f->type == 'blob'): ?>
                            <textarea name="<?= $f->name ?>" ><?= (isset($search[$f->name]) ? $search[$f->name] : '') ?></textarea>                    
                        <? endif; ?>
                    </td>
                <? endforeach; ?>
                <td><input type="submit" class="btn" value="Найти" /></td>
            </tr>
        </table>
    </form>
    <form method="post" name="clear">
        <input type="hidden" name="action" value="clear" />
    </form>
</div>