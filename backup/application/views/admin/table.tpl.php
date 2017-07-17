<h3><?= $table_rus ?></h3>
<? if ($error === FALSE): ?>
    <p><button class="btn btn-primary" type="button" id="new-item">Добавить</button></p>
<? endif; ?>
<div class="new-item" <?= ($error === TRUE ? 'style="display: block;"' : '') ?>>
    <h4><?= ($edit === FALSE ? 'Добавление новой записи' : 'Редактирование записи № ' . set_value('id')) ?></h4>
    <form method="post">
        <input type="hidden" name="action" value="<?= ($edit === FALSE ? 'add' : 'edit') ?>" />
        <table class="table">
            <? foreach ($fields as $f): ?>
                <tr>
                    <td><?= $fields_rus[$f->name] ?></td>
                    <td>
                        <div class="control-group <?= (form_error($f->name) ? 'error' : '') ?>">
                            <? if (isset($new_type[$f->name]) && $new_type[$f->name]['type'] == 'select'): ?>
                                <?= form_dropdown($f->name, $lists[$new_type[$f->name]['lists']], set_value($f->name)) ?>
                            <? elseif (isset($new_type[$f->name]) && $new_type[$f->name]['type'] == 'image'): ?>
                                <?= $this->load->view('/admin/upload_image.tpl.php', array('id' => set_value('id'), 'table' => $table, 'field' => $f->name, 'value' => (set_value($f->name) != NULL ? set_value($f->name) : NULL))) ?>
                            <? elseif ($f->type == 'int'): ?>
                                <input type="text" name="<?= $f->name ?>" class="input-small" value="<?= set_value($f->name) ?>" />
                            <? elseif ($f->type == 'string'): ?>
                                <input type="text" name="<?= $f->name ?>" value="<?= set_value($f->name) ?>" />
                            <? elseif ($f->type == 'blob'): ?>
                                <textarea name="<?= $f->name ?>" <?= (in_array($f->name, $ckeditor) ? 'id="' . $f->name . '_add" class="ckeditor_add" style="width: 500px; height: 250px;"' : '') ?>><?= set_value($f->name) ?></textarea>                    
                            <? endif; ?>
                            <?= form_error($f->name) ?>
                        </div>
                    </td>
                </tr>
            <? endforeach; ?>
        </table>
        <input type="submit" value="<?= ($edit === FALSE ? 'Добавить' : 'Сохранить') ?>" class="btn" />
    </form>
</div>

<p>
    <button class="btn btn-success" type="button" id="search-item">Фильтр</button>
    <? if (isset($_SESSION[$table]['filter_where'])): ?>
        <button class="btn btn-danger" type="button" id="search-item" onclick="javascript: document.clear.submit();">Сбросить фильтр</button>
    <? endif; ?>
</p>

<?= $this->load->view('/admin/filter.tpl.php') ?>

<form method="post" name="actions" action="/<?= $this->uri->segment(1) . '/' . $this->uri->segment(2) . '/actions' ?>">
    <table class="table table-striped">
        <tr>
            <th><a id="checkall" href="#">все</a></th>
            <? foreach ($fields as $f): ?>
                <th><a href="/<?= $this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . $f->name . '/' . ($sort == $f->name ? ($order == 'asc' ? 'desc' : 'asc') : '') ?>"><?= $fields_rus[$f->name] ?> <?= ($sort == $f->name ? ($order == 'asc' ? '<i class="icon-arrow-up"></i>' : '<i class="icon-arrow-down"></i>') : '') ?></a></th>
            <? endforeach; ?>
            <th>Действие</th>
        </tr>
        <? foreach ($rows as $r): ?>
            <tr id="row<?= $r['id'] ?>">
                <td class="center checkboxone"><input type="checkbox" name="id[]" value="<?= $r['id'] ?>" /></td>
                <? foreach ($fields as $f): ?>
                    <td>
                        <? if (isset($new_type[$f->name]) && $new_type[$f->name]['type'] == 'date'): ?>
                            <?= date('d.m.Y', $r[$f->name]) ?>
                        <? elseif (isset($new_type[$f->name]) && $new_type[$f->name]['type'] == 'select'): ?>
                            <? if (!isset($filter[$f->name])): ?>
                                <?= $lists[$new_type[$f->name]['lists']][$r[$f->name]] ?>
                            <? else: ?>
                                <a href="/admin/<?= $filter[$f->name]['table'] ?>/filter/<?= $filter[$f->name]['field'] ?>/<?= urlencode($r[$filter[$f->name]['value']]) ?>"><?= $lists[$new_type[$f->name]['lists']][$r[$f->name]] ?></a>
                            <? endif; ?>
                        <? elseif (isset($new_type[$f->name]) && $new_type[$f->name]['type'] == 'image'): ?>
                            <a class="fancybox" href="/views/content/<?= ($r[$f->name] != NULL ? $r[$f->name] : 'no_preview.png') ?>"><img src="/views/content/<?= ($r[$f->name] != NULL ? $new_type[$f->name]['size'][1]['prefix'] . $r[$f->name] : 'no_preview.png') ?>" /></a>
                        <? else: ?>
                            <? if ($f->type == 'blob' && strlen($r[$f->name]) > 1400): ?>
                                <div class="div-overflow">
                                    <a class="text-more"></a>
                                    <?= $r[$f->name] ?>
                                </div>
                            <? else: ?>
                                <? if (!isset($filter[$f->name])): ?>
                                    <?= $r[$f->name] ?>
                                <? else: ?>
                                    <a href="/admin/<?= $filter[$f->name]['table'] ?>/filter/<?= $filter[$f->name]['field'] ?>/<?= urlencode($r[$filter[$f->name]['value']]) ?>"><?= $r[$f->name] ?></a>
                                <? endif; ?>
                            <? endif; ?>
                        <? endif; ?>
                    </td>
                <? endforeach; ?>
                <td class="center">
                    <a onclick="javascript: contUpt('#edit_block','/admin/<?= $table ?>/edit/<?= $r['id'] ?>'); return false;"><i class="icon-edit"></i></a>
                    <a onclick="javascript: if (confirm('Вы действительно хотите удалить запись № <?= $r['id'] ?>?')) contUpt('#row<?= $r['id'] ?>','/admin/<?= $table ?>/delete/<?= $r['id'] ?>'); return false;"><i class="icon-remove"></i></a>
                </td>
            </tr>
        <? endforeach; ?>
        <? if (count($field_sum) > 0): ?>
            <td></td>
            <? foreach ($fields as $f): ?>
                <? if (!isset($field_sum[$f->name])): ?>
                    <td></td>
                <? else: ?>
                    <td><b>Итого:</b> <?= $field_sum[$f->name] ?></td>
                <? endif; ?>
            <? endforeach; ?>
            <td></td>
        <? endif; ?>
    </table>
    <div class="select-action"><?= form_dropdown('actions', $lists['actions'], 0, 'id="actions"') ?> <input id="btn-action" type="submit" value="Выполнить" class="btn" onclick="document.actions.submit(); return false;" /></div>
    <div class="pagination pagination-centered" style="position: relative; top: -60px;"><?= $page_links ?></div>
</form>

<div id="edit_block"></div>