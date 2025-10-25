<div class="item">
    <div class="title">Logo</div>
    {if $edit.img_thumb_vn neq ""}
    <img src="../{$edit.img_thumb_vn}" height="100"><br>
    {/if}
    <input type="file" name="img_thumb_vn" id="img_thumb_vn" onchange="check_file('img_thumb_vn');">
    <span class="SizeImgDel">Xóa hình <input type="checkbox" name="del_thumb_vn" value="del_thumb_vn"></span>
</div>