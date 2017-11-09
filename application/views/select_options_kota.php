<select id="id_kota" name="id_kota" class="form-control">
    <option value="">-- Select Kota --</option>
    <?php
    foreach ($kota_lists as $row)
    {
        echo '<option id="'.$row->id_kota.'" value="'.$row->id_kota.'">'.$row->nama.'</option>';
    }
    ?>
</select>