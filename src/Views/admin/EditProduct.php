<div id="padtop">
    <form action='/Admin/editFromForm/<?php echo $data['id']?>' method="POST" class='form' enctype="multipart/form-data">
        <p class='field required'>
            <label class='label required' for='name'>TÊN SẢN PHẨM</label>
            <input class='text-input' id='name' name='name' required type='text' placeholder='Ô Long'value=' <?php
            echo $data['name'];
            ?>'>
        </p>
        <div class='field'>
            <label class='label'>Phân loại</label>
            <ul class='options'>
                <li class='option'>
                    <input class='option-input' id='option-0' name='type' type='radio' value='tea'>
                    <label class='option-label' for='option-0'>Trà</label>
                </li>
                <li class='option'>
                    <input class='option-input' id='option-1' name='type' type='radio' value='Coffee'>
                    <label class='option-label' for='option-1'>Cafe</label>
                </li>
                <li class='option'>
                    <input class='option-input' id='option-2' name='type' type='radio' value='Other'>
                    <label class='option-label' for='option-2'>Khác</label>
                </li>
            </ul>
        </div>
        <p class='field'>
            <label class='label' for='about'>Mô tả</label>
            <textarea class='textarea' cols='50' id='about' name='description' rows='4'><?php
            echo $data['des'];
            ?></textarea>
        </p>
        <p class='field'>
            <label class='label' for='price'>Giá</label>
            <input class='number' id='price' name='price' type='phone' value=' <?php
            echo $data['price'];
            ?>'>
        </p>
        <p class='field half'>
            <label class='label' for='image_path'>Image</label>
            <input class='text-input' id='image' name='image' type='file' onchange="previewImage()">
        </p>
        <p class='field half'>
            <img id="my-image" src="#" alt="Image" width="100px">
        </p>
        <p class='field half'>
            <input class='button' type='submit' value='Send'>
        </p>
    </form>
</div>



<script>
    function previewImage() {
        var preview = document.querySelector('#my-image');
        var file = document.querySelector('#image').files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }
</script>