<?php 
    $image = get_term_meta($tag->term_id,'image',true);
?>
<tr class="form-field">
    <th scope="row">
        <label for="image">Hinh ảnh</label>
    </th>
    <td>
        <input type="text" name="image" id="image" size="40" value="<?= $image ?>">
    </td>
</tr>
