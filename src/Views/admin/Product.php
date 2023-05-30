<?php

use MVC\Models\Product;

$product = new Product();
$products = $product->getAllProducts();

?>

<style>
    /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }

    /* Style the buttons that are used to open the tab content */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }

    #edit-product {
        background-color: white;
    }

    
</style>


<div id="edit-product-div">
    <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'EditProduct')">Edit Product</button>
        <button class="tablinks" onclick="openTab(event, 'AddProduct')">Add Product</button>
    </div>

    <!-- Tab content -->
    <div id="EditProduct" class="tabcontent">


        <section class="pt-5 pb-5" id='edit-product'>
            <div class="container">
                <div class="row w-100">
                    <div class="col-lg-12 col-md-12 col-12">
                        <p class="mb-5 text-center">
                            There are <i class="text-info font-weight-bold">
                                <?php echo count($products); ?>
                            </i> products in your database
                        </p>
                        <table id="shoppingCart" class="table table-condensed table-responsive">
                            <thead>
                                <tr>
                                    <th style="width:60%">Product</th>
                                    <th style="width:12%">Price</th>
                                    <th style="width:10%">Quantity</th>
                                    <th style="width:16%"></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $sum = 0;
                                foreach ($products as $item) {
                                    echo "<tr id=product". $item->getId() .">";
                                    echo '<td data-th="' . $item->getName() . '">';
                                    echo '<div class="row">';
                                    echo '<div class="col-md-3 text-left">';
                                    echo '<img src="' . $item->getImage_path() . '" alt=""';
                                    echo 'class="img-fluid d-none d-md-block rounded mb-2 shadow ">';
                                    echo '</div>';
                                    echo '<div class="col-md-9 text-left mt-sm-2">';
                                    echo '<h4>' . $item->getName() . '</h4>';
                                    echo '<p class="font-weight-light">Brand &amp; Name</p>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</td>';
                                    echo '<td data-th="Price">' . $item->getPrice() . '</td>';
                                    echo '</td>';
                                    echo '<td class="actions" data-th="">';
                                    echo '<div class="text-right">';
                                    echo '<button class="btn btn-white border-secondary bg-white btn-md mb-2" onclick="edit(' . $item->getId() . ')">';
                                    echo ' <i class="fas fa-sync"></i>';
                                    echo '</button>';
                                    echo '<button class="btn btn-white border-secondary bg-white btn-md mb-2" onclick="deleteProduct('. $item->getId() .')">';
                                    echo ' <i class="fas fa-trash"></i>';
                                    echo '</button>';
                                    echo '</div>';
                                    echo '</td>';
                                    echo '</tr>';
                                    $sum += $item->getPrice();
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </section>


    </div>

    <div id="AddProduct" class="tabcontent">
        <div id="padtop">
            <form action='/Admin/fillFromForm' method="POST" class='form' enctype="multipart/form-data">
                <p class='field required'>
                    <label class='label required' for='name'>TÊN SẢN PHẨM</label>
                    <input class='text-input' id='name' name='name' required type='text' placeholder='Ô Long'>
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
                    <textarea class='textarea' cols='50' id='about' name='description' rows='4'></textarea>
                </p>
                <p class='field'>
                    <label class='label' for='price'>Giá</label>
                    <input class='number' id='price' name='price' type='phone'>
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





    </div>

    
</div>
<script>
    function openTab(evt, cityName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
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

    function edit(id) {
        location.href = "/Admin/ShowProductById/" + id;
    }

    function deleteProduct(id) {
        let base = "/Admin/ShowF/Product";
        
        window.open("/Admin/DeleteProductById/" + id);
        
        location.href = base;
    }


</script>