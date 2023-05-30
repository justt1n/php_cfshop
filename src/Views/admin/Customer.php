<?php

use MVC\Models\User;


$User = new User();
$users = $User->getAllUser();

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
   


        <section class="pt-5 pb-5" id='edit-product'>
            <div class="container">
                <div class="row w-100">
                    <div class="col-lg-12 col-md-12 col-12">
                        <p class="mb-5 text-center">
                            There are <i class="text-info font-weight-bold">
                                <?php echo count($users); ?>
                            </i> customers in your database
                        </p>
                        <table id="shoppingCart" class="table table-condensed table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col" style="width:20%">ID</th>
                                    <th scope="col" style="width:20%">USERNAME</th>
                                    <th scope="col" style="width:20%">NAME</th>
                                    <th scope="col" style="width:20%">PHONE</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($users as $user) {
                                    echo "<tr>";
                                    echo '<td scope="col" style="width:40%">' . $user->getId() . '</td>';
                                    echo '<td scope="col" style="width:40%">' . $user->getUserName() . '</td>';
                                    echo '<td scope="col" style="width:20%">' . $user->getFullName() . '</td>';
                                    echo '<td scope="col" style="width:20%">' . $user->getPhone() . '</td>';
                                    echo '</tr>';
                                }
                                ?>

                            
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </section>
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
        location.href = "/Admin/ShowCheckOrder/" + id;
    }

    // function deleteProduct(id) {
    //     let base = "/Admin/ShowF/Product";
        
    //     window.open("/Admin/DeleteProductById/" + id);
        
    //     location.href = base;
    // }


</script>



